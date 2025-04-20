<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use App\Models\Contact;
use App\Models\Gallery;
use Illuminate\Support\Facades\Log;

class GalleryController extends Controller
{
    public function ContactUs(){

        return view('frontend.contact.contact_us');
    }

    public function ContactStore(Request $request){
        // dd($request->all());
        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        $notification = array(
            'message'=> 'User Contact Data Insert Successfully',
            'alert-type'=> 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function AdminContactMessage(){
        $contactMessage = Contact::latest()->get();
        return view('backend.contact.contact_message', compact('contactMessage'));
    }

    public function AllGallery(){
        $gallery = Gallery::latest()->get();
        return view('backend.gallery.all_gallery', compact('gallery'));
    }

    public function AddGallery(){
        return view('backend.gallery.add_gallery');
    }



    
    
    public function GalleryStore(Request $request)
    {
        
        $images = $request->file('photo_name');
    
        if ($images) {
            foreach ($images as $img) {
                $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                Image::make($img)->resize(550, 550)->save('upload/gallery/' . $name_gen);
                $save_url = 'upload/gallery/' . $name_gen;
    
                Gallery::insert([
                    'photo_name' => $save_url,
                    'created_at' => now(), // optional if you want to track
                ]);
            }
    
            $notification = array(
                'message'=> 'Gallery Images Inserted Successfully',
                'alert-type'=> 'success',
            );
            return redirect()->route('all.gallery')->with($notification);
        } else {
            return back()->with('error', 'No images selected!');
        }
    }

    public function EditGallery($id){
        $gallery_id = Gallery::findOrFail($id);
        
        return view('backend.gallery.edit_gallery', compact('gallery_id'));
    }
    
    public function UpdateGallery(Request $request){
$gallery  = $request->gallery_id;
        
$img  = $request->file('photo_name');
$name_gen = hexdec(uniqid()). '.'. $img->getClientOriginalExtension();
Image::make($img)->resize(550, 550)->save('upload/gallery'. $name_gen);

$save_url = 'upload/gallery'. $name_gen;

Gallery::findOrFail($gallery)->update([
    'photo_name' => $save_url
]);
$notification = array(
    'message'=> 'Gallery Images Update Successfully',
    'alert-type'=> 'success',
);
return redirect()->route('all.gallery')->with($notification);
            }

public function DeleteGallery($id){
         
$img = Gallery::findOrFail($id);
$item = $img->photo_name;
unlink($item);

Gallery::findOrFail($id)->delete();

$notification = array(
    'message'=> 'Gallery Images Delete Successfully',
    'alert-type'=> 'success',
);
return redirect()->route('all.gallery')->with($notification);

    }

    public function DeleteMultipleGallery(Request $request){
        $Selectedgalleries  = $request->input('selectedItem');
        // dd($Selectedgalleries);

        foreach($Selectedgalleries as $galleries){
            $item = Gallery::find($galleries);
            $DeleteImage = $item->photo_name;
            unlink($DeleteImage);
            $item->delete();
        }
        $notification = array(
            'message'=> 'Gallery Multiple Images Delete Successfully',
            'alert-type'=> 'success',
        );
        return redirect()->route('all.gallery')->with($notification);
        
            
    }

    public function ShowGallery(){
        $gallery = Gallery::latest()->get();
        // Log::info($gallery);
        return view('frontend.gallery.show_gallery', compact('gallery'));

    }


    }

