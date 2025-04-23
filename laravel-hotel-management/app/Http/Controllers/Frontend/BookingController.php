<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\BookmailConfirm;
use App\Models\Booking;
use App\Models\Room;
use App\Models\RoomBookDate;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\BookingRoomList;
use App\Models\roomNumber;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use App\Notifications\BookingComplete;


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
        if($request->available_room < $request->roomNumber){
            $notification = array(
                'message' => 'Something Want to Wrong',
                'alert-type' => 'error'
                );
              
                return redirect()->back()->with($notification);
        }
        
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


 $user = User::where('role', 'admin')->get();


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

      Notification::send($user, new BookingComplete($request->name));
      
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

public function UpdateBookingStatus(Request $request, $id)
{
    Log::info("Updating booking status for ID: " . $id);

    $booking = Booking::find($id);

    if (!$booking) {
        Log::error("Booking with ID {$id} not found!");
        return redirect()->back()->with([
            'message' => 'Booking not found!',
            'alert-type' => 'error'
        ]);
    }

    $booking->payment_status = $request->payment_status;
    $booking->status = $request->status;
    $booking->save();

    // Log updated booking details
    Log::info("Booking updated successfully: ", $booking->toArray());

    // Validate and prepare mail data
    $data = [
        'check_in'  => $booking->check_in ?? '',
        'check_out' => $booking->check_out ?? '',
        'name'      => $booking->name ?? '',
        'email'     => $booking->email ?? '',
        'phone'     => $booking->phone ?? '',
    ];
    Log::info($data);

    // Ensure data is properly structured before passing to Mailable
    if (empty($data['check_in']) || empty($data['check_out']) || empty($data['name']) || empty($data['email']) || empty($data['phone'])) {
        Log::error("Booking data is incomplete: " . json_encode($data));
        return redirect()->back()->with([
            'message' => 'Booking data is incomplete!',
            'alert-type' => 'error'
        ]);
    }

    // Send email only if email is available
    if (!empty($booking->email)) {
        try {
            Mail::to($booking->email)->send(new BookmailConfirm($data));
        } catch (\Exception $e) {
            Log::error("Mail sending failed: " . $e->getMessage());
        }
    } else {
        Log::warning("No email found for booking ID: " . $id);
    }

    return redirect()->back()->with([
        'message' => 'Booking status successfully updated',
        'alert-type' => 'success'
    ]);
}


public function UpdateBooking(Request $request, $id){


if($request->available_room < $request->number_of_rooms){

    $notification = array(
        'message' => 'Something Want To Wrong',
        'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
        }

$data = Booking::find($id);
$data->number_of_rooms = $request->number_of_rooms;
$data->check_in = date('Y-m-d', strtotime($request->check_in));
$data->check_out = date('Y-m-d', strtotime($request->check_out));
$data->save();

RoomBookDate::where('booking_id', $id)->delete();
RoomBookDate::where('booking_id', $id)->delete();


$sdate = date('Y-m-d', strtotime($request->check_in));
$edate = date('Y-m-d', strtotime($request->check_out));
$eldate = Carbon::create($edate)->subDay(); // Get the end date (subtract one day)

$d_period = CarbonPeriod::create($sdate, $eldate); // Create the period

foreach ($d_period as $period) {
    $booked_dates = new RoomBookDate();
    $booked_dates->booking_id = $data->id;
    $booked_dates->rooms_id = $data->id;
    $booked_dates->book_date = date('Y-m-d', strtotime($period));
    $booked_dates->save();
}
$notification = array(
    'message' => 'Booking Update Successfully',
    'alert-type' => 'success'
    );
  
    return redirect()->back()->with($notification);

}




public function AssignRoom($booking_id){
   
  $booking = Booking::find($booking_id) ;
  $booking_date_array = RoomBookDate::where('booking_id',$booking_id)->pluck('book_date')->toArray();
  $check_date_booking_ids = RoomBookDate::whereIn('book_date', $booking_date_array)->where('rooms_id', $booking->rooms_id)->pluck('booking_id')->toArray();
  $booking_ids=  Booking::whereIn('id',$check_date_booking_ids)->pluck('id')->toArray();
  $assign_room_ids= BookingRoomList::whereIn('booking_id',  $booking_ids)->pluck('room_number_id')->toArray();
  $room_Numbers =roomNumber::where('rooms_id',$booking->rooms_id)->whereNotIn('id',  $assign_room_ids)->where('status', 'Active')->get();
  return view('backend.booking.assign_room', compact('booking', 'room_Numbers'));


}

public function AssignRoomStore($booking_id, $room_number_id){

$booking = Booking::find($booking_id);
$check_data = BookingRoomList::where('booking_id', $booking_id)->count();

if($check_data < $booking->number_of_rooms){

    $assign_data = new BookingRoomList();
    $assign_data->booking_id = $booking_id;
    $assign_data->rooms_id = $booking->rooms_id;
    $assign_data->room_number_id = $room_number_id;
    $assign_data->save();

    $notification = array(
        'message' => 'Room Assign Successfully',
        'alert-type' => 'success', 
    );
    return redirect()->back()->with($notification);
}

else{
    $notification = array(
        'message' => 'Room Already Assign',
        'alert-type' => 'error', 
    );
    return redirect()->back()->with($notification);
}
}

public function AssignRoomDelete($id){
    $assign_room = BookingRoomList::find($id);
    $assign_room->delete();

    $notification = array(
        'message' => 'Room Assign Delete Successfully',
        'alert-type' => 'success', 
    );
    return redirect()->back()->with($notification);
}


public function DownloadInvoice(Request $request, $id){
$editData  = Booking::with('room')->find($id);
$pdf = Pdf::loadView('backend.booking.booking_invoice', compact('editData'))->setPaper('a4')->setOption([
    "temDir" => public_path(),
    "chroot" => public_path(),
]);
return $pdf->download('invoice.pdf');

}

public function UserBookingList(){
    $id = Auth::user()->id;
    $userBooking = Booking::where('user_id', $id)->orderBy('id', 'desc')->get();
    return view('frontend.Dashboard.userBooking',[
        'userBooking' => $userBooking,
    ]); 
}

public function UserPdfInvoice($id){
    $editData  = Booking::with('room')->find($id);
    $pdf = Pdf::loadView('backend.booking.booking_invoice', compact('editData'))->setPaper('a4')->setOption([
        "temDir" => public_path(),
        "chroot" => public_path(),
    ]);
    return $pdf->download('invoice.pdf');
}



public function ReadNotification(Request $request, $notificationIds)
{
    try {
        $user = Auth::user();
        $notification = $user->notifications()->where('id', $notificationIds)->first();

        if ($notification) {
            $notification->markAsRead();
        }

        return response()->json([
            'count' => $user->unreadNotifications()->count(),
        ]);
    } catch (\Exception $e) {
        \Log::error('Error reading notification: ' . $e->getMessage());
        return response()->json(['error' => 'Something went wrong'], 500);
    }
}


}   










