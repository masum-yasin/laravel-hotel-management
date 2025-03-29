<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\MultiImage;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\roomNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class RoomController extends Controller
{
    public function EditRoom($id){
        $basic_facility =Facility::where('rooms_id',$id)->get();
        $multiImage =MultiImage::where('rooms_id',$id)->get();
        $editData =Room::find($id);
        $allRoomNumber = RoomNumber::where('rooms_id',$id)->get();
        return view('backend.allroom.room.edit_rooms',compact('editData','basic_facility','multiImage','allRoomNumber'));
    }
    // Update For Room

    public function UpdateRoom(Request $request, $id)
{
    Log::info($request->all());

    // dd($request->all(), $request->file('multi_img'));

    $room = Room::find($id);
    
    // Update room details
    $room->roomtype_id   = $room->roomtype_id; // No changes?
    $room->total_adult   = $request->total_adult;
    $room->total_child   = $request->total_child;
    $room->price         = $request->price;
    $room->size          = $request->size;
    $room->discount      = $request->discount;
    $room->room_capacity = $request->room_capacity;
    $room->view          = $request->view;
    $room->bed_style     = $request->bed_style;
    $room->short_desc    = $request->short_desc;
    $room->description   = $request->description;
    $room->status        = 1;




    
    if ($request->hasFile('image')) {
        // Get the old image path
        $oldImagePath = public_path($room->image);

        // Check if the old image exists and delete it
        if (!empty($room->image) && File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }

        // Process new image
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $image_path = 'upload/roomimg/' . $name_gen;

        // Resize and store image
        Image::make($image)->resize(550, 850)->save(public_path($image_path));

        // Update the database
        $room->image = $image_path;
    }

    // Save the room details
    $room->save();
    
    

    // Update facility table
    if ($request->facility_name == NULL) {
        $notification = [
            'message'    => 'Sorry! Not Any Basic facility Item Selected',
            'alert-type' => 'error',
        ];
        return redirect()->back()->with($notification);
    } else {
        // Remove old facilities
        Facility::where('rooms_id', $id)->delete();
        foreach ($request->facility_name as $facilityName) {
            $facility = new Facility();
            $facility->rooms_id = $room->id;
            $facility->facility_name = $facilityName;
            $facility->save();
        }
    }

    // Update Multi Image
    if ($request->hasFile('multi_img')) {
        MultiImage::where('rooms_id', $id)->delete();
    
        foreach ($request->file('multi_img') as $file) {
            $imgName = date('YmdHi') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/roomimg/multi_img/'), $imgName);
            
            $multiImage = new MultiImage();
            $multiImage->rooms_id = $room->id;
            $multiImage->multi_img = 'upload/roomimg/multi_img/' . $imgName;
            $multiImage->save();
        }
    }
    

    
    $notification = [
        'message'    => 'Room Updated Successfully',
        'alert-type' => 'success',
    ];
    
    return redirect()->back()->with($notification);
}






    public function multiImageDelete(Request $request, $id){

        // dd($request->id);
        $deleteData = MultiImage::where('id',$id)->first();
        if($deleteData){
            $imagePath =$deleteData->multi_img;
            // check if the file exists before unlinking//
            if(file_exists($imagePath)){
                unlink($imagePath);
                echo "Image Unlink Successfully";
            }
            else{
                echo "Image Does not exits";
            }
            // Delete the record from database

            MultiImage::where('id',$id)->delete();

    }
    $notification = array(
        'message' => 'multiImage Delete Successfully',
        'alert-type' => 'success', 
    );
    return redirect()->back()->with($notification);

}


// Room Number Function//

function StoreRoomNumber(Request $request, $id){
    $data = new roomNumber();
    $data->rooms_id = $id;
    $data->room_type_id = $request->room_type_id;
    $data->room_no = $request->room_no;
    $data->status = $request->status;
    $data->save();

    $notification = array(
        'message' => 'RoomNumber Data Store Successfully',
        'alert-type' => 'success', 
    );
    return redirect()->back()->with($notification);
}


public function EditRoomNumber($id){
    $roomNumber = roomNumber::find($id);
    return view('backend.allroom.room.edit_room_no',compact('roomNumber'));
}


public function UpdateRoomNumber(Request $request, $id){
    $data = roomNumber::find($id);
    $data->room_no = $request->room_no;
    $data->status = $request->status;
    $data->save();

    $notification = array(
        'message' => 'Room Number Updated Successfully',
        'alert-type' => 'success',
    );

    return redirect()->route('room.type.list')->with($notification);

}

public function DeleteRoomNumber($id){
    roomNumber::find($id)->delete();
     $notification = array(
        'message' => 'Room Number Delete Successfully',
        'alert-type' => 'success',
    );

    return redirect()->route('room.type.list')->with($notification);
}


public function DeleteRoom($id){
    $room = Room::find($id);
    if(file_exists('upload/roomimg/',$room->image) AND !empty($room->image)){
        @unlink('upload/roomimg/',$room->image);
    }
    $subImage= MultiImage::where('rooms_id', $room->id)->get()->toArray();
        if(!empty($subImage)){
            foreach($subImage as $value){
                @unlink('upload/roomimg/multi_img/'.$value['multi_images']);
            }
        
        }
        RoomType::where('id',$room->roomtype_id)->delete();
        // MultiImage::where('rooms_id',$room->id)->delete();
        Facility::where('rooms_id',$room->id)->delete();   
        roomNumber::where('rooms_id',$room->id)->delete();
        $room->delete();

        $notification = array(
            'message' => 'Room Delete Successfully',
            'alert-type' => 'success',
        );
    
        return redirect()->back()->with($notification);
    
}
}

