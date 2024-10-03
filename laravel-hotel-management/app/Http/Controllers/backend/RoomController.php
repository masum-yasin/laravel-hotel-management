<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\MultiImage;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\roomNumber;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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

    public function UpdateRoom(Request $request,$id){
        $room =Room::find($id);
        $room->roomtype_id = $room->roomtype_id;
        $room->total_adult = $request->total_adult;
        $room->total_child = $request->total_child;
        $room->price = $request->price;
        $room->size = $request->size;
        $room->discount = $request->discount;
        $room->room_capacity= $request->room_capacity;
        $room->view = $request->view;
        $room->bed_style = $request->bed_style;
        $room->short_desc = $request->short_desc;
        $room->description = $request->description;
        $room->short_desc = $request->short_desc;
        $room->status = 1;

        // Update Single Image//
        if($request->file('image')){
            $image = $request->file('image');
        
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(550,850)->save('upload/roomimg/'.$name_gen);
          $room['image'] = $name_gen;
     
        }
        $room->save();
       
 

        // Update for facility table//
    if($request->facility_name == NULL){
        $notification = array(
            'message' => 'Sorry! Not Any Basic facility Item Select',
            'alert-type' => 'error', 
        );
        return redirect()->back()->with($notification);
    }
    else {
      Facility::where('rooms_id',$id)->delete();
      $facilities = count($request->facility_name);
      for($i = 0; $i<$facilities; $i++ ){
        $fcount = new Facility();
        $fcount->rooms_id = $room->id;
        $fcount->facility_name = $request->facility_name[$i];
        $fcount->save();
      } 
    //   end for
     
    }
    // end else
  

    // Update Multi Image//

        if ($room->save()) {
        $files = $request->file('multi_img'); // Use file() instead of multi_img directly
        if (!empty($files)) {
            $subimage = MultiImage::where('rooms_id', $id)->get()->toArray();
            MultiImage::where('rooms_id', $id)->delete();
            foreach ($files as $file) {
                $imgName =date('YmdHi') . $file->getClientOriginalName();
                $file->move('upload/roomimg/multi_img/', $imgName);
                $subimage = new MultiImage();
                $subimage->rooms_id = $room->id;
                $subimage->multi_img = $imgName;
                $subimage->save();
            }
        }
    }
        


// end if

   
        $notification = array(
            'message' => 'Room Updated Successfully',
            'alert-type' => 'success', 
        );
        return redirect()->back()->with($notification);

    }






    public function multiImageDelete($id){
        $deleteData = MultiImage::where('íd',$id)->first();
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
    // if(file_exists('upload/roomimg/',$room->image) AND !empty($room->image)){
    //     @unlink('upload/roomimg/',$room->image);
    // }
    // $subImage= MultiImage::where('rooms_id', $room->id)->get()->toArray();
    //     if(!empty($subImage)){
    //         foreach($subImage as $value){
    //             @unlink('upload/roomimg/multi_img/'.$value['multi_images']);
    //         }
        
    //     }
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

