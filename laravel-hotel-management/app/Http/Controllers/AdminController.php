<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard(){

    $bookings = Booking::latest()->get();
    $pending = Booking::where('status', 0)->get();
    $complete = Booking::where('status',1)->get();
    $totalPrice =Booking::where('status', 1)->sum('total_price');
    $toDay = Carbon::now()->toDateString();
$toDayBookingPrice = Booking::whereDate('created_at', $toDay)->sum('total_price');
$recentData = Booking::orderBy('id', 'desc')->limit(10)->get();


        return view('admin.body.index', [
            'bookings' => $bookings,
            'pending' => $pending,
            'complete' => $complete,
            'totalPrice' => $totalPrice,
            'toDayBookingPrice' => $toDayBookingPrice,
            'recentData' => $recentData

        ]);
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    public function AdminLogin(){
        return view('admin.admin_login');
    }
    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view',compact('profileData'));
    }

    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }


        $data->save();
        $notification = array(
            'message'=> 'Admin Profile Updated Successfully',
            'alert-type'=> 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function AdminChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password',compact('profileData'));
    }




    public function AdminPasswordUpdated(Request $request){
        $request->validate([
            'old_password'=>'required',
            'new_password'=>'required|confirmed',
        ]);
        if(!Hash::check($request->old_password, auth::user()->password)){
            $notification = array(
                'message'=> 'Old password Does Not Match',
                'alert-type'=> 'error',
            );

            return back()->with($notification);

            // Update Password method//
           
        }
        User::whereId(auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message'=> 'Password Change Successfully',
            'alert-type'=> 'success',
        );
        

        return back()->with($notification);
}


}

