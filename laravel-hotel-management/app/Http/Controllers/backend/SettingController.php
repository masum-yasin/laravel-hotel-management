<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    public function SiteSetting(){
        $siteSetting = SiteSetting::findOrFail(1);
        return view('backend.site.site_setting', compact('siteSetting'));
    }

    public function SiteSettingUpdate(Request $request){
// dd($request->all());
       $site_id = $request->siteSetting_id; 
        if($request->file('logo')){
           $image = $request->file('logo') ;
           $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
         Image::make($image)->resize(110, 44)->save('upload/site/'. $name_gen);
         $save_url = 'upload/site/'.$name_gen;

         SiteSetting::findOrFail($site_id)->update([
            'phone' => $request->phone,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'address' => $request->address,
            'copywrite' => $request->copywrite,
            'logo' => $save_url,
         
        ]);
        $notification = array(
            'message'=> 'Site Setting Data Insert  Successfully',
            'alert-type'=> 'success',
        );
        return redirect()->back()->with($notification);
        }
        else{
        SiteSetting::findOrFail($site_id)->update([
           'phone' => $request->phone,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'address' => $request->address,
        ]);
        }

        $notification = array(
            'message'=> 'Site Setting Data Insert  Successfully without Image',
            'alert-type'=> 'success',
        );
        return redirect()->back()->with($notification);
    } 
}
