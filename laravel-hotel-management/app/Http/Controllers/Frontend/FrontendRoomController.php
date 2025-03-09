<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Facility;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomBookDate;
// use App\Models\RoomType;
use App\Models\roomNumber;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\Foreach_;

// use Intervention\Image\Facades\Image;

class FrontendRoomController extends Controller{
public function AllFrontendRoomList(){
$rooms = Room::latest()->get();

return view('frontend.room.room_all',compact('rooms'));
}
public function RoomDetailsPage($id){
    $RoomDetails = Room::find($id);
    $Facility = Facility::where('rooms_id',$id)->get();
    $otherRoom = Room::where('id','!=',$id)->orderBy('id','DESC')->limit(2)->get();
    return view('frontend.room.room_details',compact('RoomDetails', 'Facility', 'otherRoom'));
}

public function BookingSearch(Request $request){
    $request->flash();
    if($request->check_in==$request->check_out){
    $notification = array(
    'message' => 'Something Want to Wrong',
    'alert-type' => 'error'
    );
  
    return redirect()->back()->with($notification);
  }
    $sDate = date('Y-m-d', strtotime($request->check_in));
    $eDate = date('Y-m-d',strtotime($request->check_out));
    $allDate = Carbon::create($eDate)->subDay();
    $d_period = CarbonPeriod::create($allDate,$sDate);
    $d_array = [];
    foreach ($d_period as  $period) {
      array_push($d_array, date('Y-m-d' , strtotime($period)));
    }
    $check_date_booking_ids = RoomBookDate::whereIn('book_date', $d_array)->distinct()->pluck('booking_id')->toArray();
    $rooms =Room::withCount('room_numbers')->where('status',1)->get();
     
    return view('frontend.room.room_search',compact('check_date_booking_ids','rooms'));

    }

    public function SearchRoomDetails(Request $request, $id){
      $request->flash();
      $RoomDetails = Room::find($id);
      $multiImage = MultiImage::where('rooms_id',$id)->get();
      $Facility = Facility::where('rooms_id',$id)->get();
      $otherRoom = Room::where('id', '!=', $id)->orderby('id','DESC')->limit(2)->get();
      $room_id = $id;

return view('frontend.room.search_room_details',compact('RoomDetails','multiImage','Facility','otherRoom','room_id'));
    }

    public function CheckRoomAvailability(Request $request) {
      // Log::info($request->all());
  
      // Convert date inputs correctly
      $sdate = Carbon::parse($request->check_in)->format('Y-m-d');
      $edate = Carbon::parse($request->check_out)->format('Y-m-d');
  
      // Get previous day of check-out date
      $allEdate = Carbon::parse($edate)->subDay()->format('Y-m-d');
  
      // Create date period
      $d_period = CarbonPeriod::create($sdate, $allEdate); 
  
      $d_array_empty = [];
      foreach($d_period as $period) {
          array_push($d_array_empty, $period->format('Y-m-d'));
      }
  
      // Find bookings that fall within selected dates
      $check_date_booking_id = RoomBookDate::whereIn('book_date', $d_array_empty)
          ->distinct()
          ->pluck('booking_id')
          ->toArray();
  
      // Get room details
      $room = Room::withCount('room_numbers')->find($request->room_id);
  
      // Get bookings that match the room ID
      $booking = Booking::withCount('assign_rooms')
          ->whereIn('id', $check_date_booking_id)
          ->where('rooms_id', $room->id)
          ->get()
          ->toArray();
  
      // Calculate available rooms
      $total_book_room = array_sum(array_column($booking, 'assign_rooms_count'));
      $available_room = @$room->room_numbers_count - $total_book_room;
  
      // Calculate total nights
      $toDate = Carbon::parse($request->check_in);
      $fromDate = Carbon::parse($request->check_out);
      $nights = $toDate->diffInDays($fromDate);
  
      return response()->json(['available_room' => $available_room, 'total_nights' => $nights]);
  }
  
  
      }
      

    







    

