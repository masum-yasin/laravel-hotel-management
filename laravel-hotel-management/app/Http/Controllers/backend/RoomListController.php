<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\roomNumber;

class RoomListController extends Controller
{
  public function ViewRoomList(){

$room_number_list = roomNumber::with([
  'room_type', 
  'last_booking.booking:id,check_in,check_out,status,code,name,phone'
])
->leftJoin('room_types', 'room_types.id', '=', 'room_numbers.room_type_id')
->leftJoin('booking_room_lists', 'booking_room_lists.room_number_id', '=', 'room_numbers.id')
->leftJoin('bookings', 'bookings.id', '=', 'booking_room_lists.booking_id')
->select(
  'room_numbers.*',
  'room_numbers.id as id', 
  'room_types.name',
  'bookings.id as booking_id', 
  'bookings.name as customer_name',
  'bookings.check_in',
  'bookings.check_out',
  'bookings.phone as customer_phone',
  'bookings.code as booking_no',
  'bookings.status as booking_status'
)
->orderBy('room_types.id', 'asc')
->orderBy('bookings.id', 'desc')
->get();

return view('backend.allroom.roomlist.view_roomlist', compact('room_number_list'));


  }
}
