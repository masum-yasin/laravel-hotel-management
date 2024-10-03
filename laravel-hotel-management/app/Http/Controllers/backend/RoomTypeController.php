<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function RoomTypeList()
    {
    $allData =RoomType::orderBy('id','desc')->get();
            return view('backend.allroom.roomtype.view_roomtype',compact('allData'));
           }
    

    /**
     * Show the form for creating a new resource.
     */
    public function AddRoomType()
    {
        return view('backend.allroom.roomtype.add_room_type');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function RoomTypeStore(Request $request)
    {
        $roomtype_id = RoomType::insertGetId([
            'name'=>$request->name,
        ]);
        Room::insert([
            'roomtype_id'=>$roomtype_id,
        ]);
        $notification = array(
            'message' => 'Room Type Insert Successfully',
            'alert type' => 'success',
            );
            return redirect()->route('room.type.list')->with($notification);
    }
}
