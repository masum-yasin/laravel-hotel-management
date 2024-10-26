<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Models\RoomBookDate;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\BookingRoomList;
use App\Models\roomNumber;

class BookingController extends Controller

{
    public function CheckOut(){
        if(session::has('book_date')){
            $book_data = session::get('book_date');
            $room = Room::find($book_data['room_id']);
            $toDate = Carbon::parse($book_data['check_in']);
            $fromDate = Carbon::parse($book_data['check_out']);
            $nights = $toDate->diffInDays($fromDate);
            return view('frontend.checkout.checkout', compact('book_data','room','nights'));
        }
        else{
                $notification = array(
                'message' => 'Something Want to Wrong',
                'alert-type' => 'error'
                );
              
                return redirect('/')->back()->with($notification);
        }
      
    }
    public function BookingStore(Request $request){
        $validateData = $request->validate([
            'check_in' =>'required',
            'check_out' =>'required',
            'persion' =>'required',
            'roomNumber' =>'required',
            
        ]);
        // if($request->available_room < $request->roomNumber){
        //     $notification = array(
        //         'message' => 'Something Want to Wrong',
        //         'alert-type' => 'error'
        //         );
              
        //         return redirect()->back()->with($notification);
        // }
        
        Session::forget('book_date');
        $data = array();
        $data['available_room'] = $request->available_room;
        $data['check_in'] =date('Y-m-d',strtotime($request->check_in));
        $data['check_out'] = date('Y-m-d', strtotime($request->check_out));
        $data['persion'] = $request->persion;
        $data['roomNumber'] = $request->roomNumber;
        $data['room_id'] = $request->room_id;
        Session::put('book_date',$data);
        return redirect()->route('checkout');

}

public function CheckoutStore(Request $request){
    $this->validate($request, [
        'country' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'state' => 'required',
        'zip_code' => 'required',
        'payment_method' =>'required',
    ]);

    $book_data = session::get('book_date');
   
    $toDate = Carbon::parse($book_data['check_in']);
    $fromDate = Carbon::parse($book_data['check_out']);
    $total_nights = $toDate->diffInDays($fromDate);
    $room = Room::find($book_data['room_id']);
    $subtotal = $room->price * $total_nights * $book_data['roomNumber'];
    $discount = ($room->discount /100 * $subtotal);
    $total_price = $subtotal - $discount;
    $code = rand(00000000000, 99999999999);
    $data = new Booking();
    $data->rooms_id = $room->id;
    $data->user_id = Auth::user()->id;
    $data->check_in = date('Y-m-d', strtotime($book_data['check_in']));
    $data->check_out = date('Y-m-d', strtotime($book_data['check_out']));
    $data->persion = $book_data['persion'];
    $data->number_of_rooms = $book_data['roomNumber'];
    $data->total_night = $total_nights;
    $data->actual_price = $room->price;
    $data->subtotal = $subtotal;
    $data->discount = $discount;
    $data->total_price = $total_price;
    $data->payment_method = $request->payment_method;
    $data->transation_id = '';
    $data->payment_status = 0;
    $data->name = $request->name;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->address = $request->address;
    $data->country = $request->country;
    $data->state = $request->state;
    $data->zip_code = $request->zip_code;
    $data->status = 0;
    $data->code = $code;
    $data->created_at = Carbon::now();
    $data->save();
    



    $sdate = date('Y-m-d', strtotime($book_data['check_in']));
$edate = date('Y-m-d', strtotime($book_data['check_out']));
$eldate = Carbon::create($edate)->subDay(); // Get the end date (subtract one day)

$d_period = CarbonPeriod::create($sdate, $eldate); // Create the period

foreach ($d_period as $period) {
    $booked_dates = new RoomBookDate();
    $booked_dates->booking_id = $data->id;
    $booked_dates->rooms_id = $room->id;
    
    // Use array syntax or ensure $book_data is an object
    if (is_array($book_data)) {
        $book_data['book_date'] = date('Y-m-d', strtotime($period));
    } else {
        $book_data->book_date = date('Y-m-d', strtotime($period));
    }
    
    // You might need to save or use $booked_dates object somewhere
    $booked_dates->book_date = $book_data['book_date']; // Assign the date
    $booked_dates->save();
       
    

    }
    Session::forget('book_date');
    $notification = array(
        'message' => 'Booking Added Successfully',
        'alert-type' => 'success'
        );
      
        return redirect('/')->with($notification);
}


public function BookingList(){
    $allData = Booking::orderby('id','desc')->get();
    return view('backend.booking.booking_list', compact('allData'));
}
public function EditBooking($id){
$editData = Booking::with('room')->find($id);
return view('backend.booking.edit_booking',compact('editData'));
}

public function UpdateBookingStatus(Request $request, $id){
 $booking = Booking::find($id);
 $booking->payment_status = $request->payment_status;
 $booking->status = $request->status;
 $booking->save();

 $notification = array(
    'message' => 'Booking status Successfully Update',
    'alert-type' => 'success'
    );
  
    return redirect()->back()->with($notification);
}

public function AssignRoom($booking_id){
  $booking = Booking::find($booking_id) ;
  $booking_date_array = RoomBookDate::where('booking_id',$booking_id)->pluck('book_date')->toArray();
  $check_date_booking_ids = RoomBookDate::whereIn('book_date', $booking_date_array)->where('room_id', $booking->rooms_id)->pluck('booking_id')->toArray();
  $booking_ids=  Booking::whereIn('id',$check_date_booking_ids)->pluck('id')->toArray();
  $assign_room_ids= BookingRoomList::whereIn('booking_id',  $booking_ids)->pluck('room_number_id')->toArray();
  $room_Numbers =roomNumber::where('rooms_id',$booking->rooms_id)->whereNotIn('id',  $assign_room_ids)->where('status', 'Active')->get();
  return view('backend.booking.assign_room', compact('booking', 'room_Numbers'));
}


}


