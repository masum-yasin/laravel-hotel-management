<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    
        public function Alltestimonial(){
    $testimonial =  Testimonial::latest()->get();
    return view('backend.testimonial.all_testimonial', compact('testimonial'));
        }
    
    public function TestimonialAdd(){
            return view('backend.testimonial.add_testimonial');
        }
    
     public function TestimonialStore(Request $request){
    
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()). '.'. $image->getClientOriginalName();
        Image::make($image)->resize(50,50)->save('upload/testimonial/'. $name_gen);
        $save_url = 'upload/testimonial/'.$name_gen;
        Testimonial::insert([
            'name' => $request->name,
            'city' => $request->city,
            'message' => $request->message,
            'image' => $save_url
    
        ]);
    
    $notification = array(
                    'message'=> 'Testimonial Data Insert  Successfully',
                    'alert-type'=> 'success',
                );
       return redirect('alltestimonial')->with($notification);
     }
    
     public function TestimonialEdit(Request $request, $id){
        $testimonial = Testimonial::find($id);
        return view('backend.testimonial.edit_testimonial', compact('testimonial'));
     }
    
     public function TestimonialUpdate(Request $request){
        $testimonial_id = $request->id;
    
        if($request->file('image')){
            $image  = $request->file('image');
            $name_gen = hexdec(uniqid()). '.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(50,50)->save('upload/testimonial/'.$name_gen);
            $save_url = 'upload/testimonial/'.$name_gen;
            Testimonial::findOrFail($testimonial_id)->update([
                'name' => $request->name,
                'city' => $request->city,
                'message' => $request->message,
                'image' => $save_url
            ]);
    
            $notification = array(
                'message'=> 'Testimonial Data Update With Image Successfully',
                'alert-type'=> 'success',
            );
            return redirect()->route('alltestimonial')->with($notification);
            
        }
        else{
            Testimonial::findOrFail($testimonial_id)->update([
                'name' => $request->name,
                'city' => $request->city,
                'message' => $request->message,
            ]);
        }
        $notification = array(
            'message'=> 'Testimonial Data Update With Out Image Successfully',
            'alert-type'=> 'success',
        );
    
        return redirect()->route('alltestimonial')->with($notification);
       
     }
    
    
    public function TestimonialDelete(Request $request, $id){
        $testimonial_delete = Testimonial::findOrFail($id);
        $img = $testimonial_delete->image;
        unlink($img);
        Testimonial::findOrFail($id)->delete();
        $notification = array(
            'message'=> 'Testimonial Data Delete Successfully',
            'alert-type'=> 'success',
        );
        return redirect()->back()->with($notification);
    
    }
}
