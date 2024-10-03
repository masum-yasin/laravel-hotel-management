<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\RoomController;
use App\Http\Controllers\backend\TeamController;
use App\Http\Controllers\backend\RoomTypeController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Frontend\FrontendRoomController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.main_master');
// });
Route::get('/',[UserController::class, 'index']);

Route::get('/dashboard', function () {
    return view('frontend.Dashboard.user_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::post('profile/store',[UserController::class,'ProfileStore'])->name('profile.store');
    Route::get('user/logout',[UserController::class,'UserLogout'])->name('user.logout');
    Route::get('user/change/password',[UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('user/password/update',[UserController::class, 'UserPasswordUpdate'])->name('user.password.update');
  
});

require __DIR__.'/auth.php';

// Admin Group MiddleWare
Route::middleware(['auth','roles:admin'])->group(function(){
    Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');
    Route::get('admin/logout',[AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('admin/profile',[AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('admin/profile/store',[AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('admin/change/password',[AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('admin.password.updated',[AdminController::class, 'AdminPasswordUpdated'])->name('admin.password.updated');
});
// End Admin Middleware//

// Admin Login//
Route::get('/admin/login',[AdminController::class,'AdminLogin'])->name('admin.login');

// Team Group MiddleWare
Route::middleware(['auth','roles:admin'])->group(function(){

Route::controller(TeamController::class)->group(function(){
Route::get('all/team','AllTeam')->name('all.team');
Route::get('team/create','TeamCreate')->name('create.team');
Route::post('team/store','TeamStore')->name('team.store');
Route::get('team/edit/{id}',"TeamEdit")->name('team.edit');
Route::post('team/update/{id}',"TeamUpdate")->name('team.update');
Route::get('team/delete/{id}',"TeamDelete")->name('team.delete');
});
// Book Area All Route//
    Route::controller(TeamController::class)->group(function(){
    Route::get('book/area','BookArea')->name('book.area');
    Route::post('book/area/update','BookAreaUpdate')->name('book.area.update');
    
    }); 

    Route::controller(RoomTypeController::class)->group(function(){
    Route::get('room/type/list','RoomTypeList')->name('room.type.list');
    Route::get('add/room/type','AddRoomType')->name('add.room.type');
    Route::post('add/room/type','RoomTypeStore')->name('store.room.type');
    
}); 
Route::controller(RoomController::class)->group(function(){
    Route::get('edit/room/{id}','EditRoom')->name('edit.room');
    Route::get('update/room/{id}','UpdateRoom')->name('update.room');
    Route::get('multi/image/delete/{id}','multiImageDelete')->name('multi.image.delete');
    Route::post('store/room/no/{id}','StoreRoomNumber')->name('store.room.no');
    Route::get('edit/room/no/{id}','EditRoomNumber')->name('edit.roomno');
    Route::post('update/room/no/{id}','UpdateRoomNumber')->name('update.roomno');
    Route::get('delete/room/no/{id}','DeleteRoomNumber')->name('delete.roomno');
 
    Route::get('delete/room/{id}','DeleteRoom')->name('room.delete');
   
    
}); 

Route::controller(BookingController::class)->group(function(){
Route::get('booking/list','BookingList')->name('booking.list');
Route::get('edit_booking/{id}', 'EditBooking')->name('edit_booking');
});
});

Route::controller(FrontendRoomController::class)->group(function(){
    Route::get('/rooms/','AllFrontendRoomList')->name('frontendall.rooms');
    Route::get('room/details/{id}','RoomDetailsPage');
    Route::get('/booking/','BookingSearch')->name('booking.search');
    Route::get('search/room/details/{id}', 'SearchRoomDetails')->name('search.room.details');
    Route::post('/check_room_availability','CheckRoomAvailability')->name('check_room_availability');
});



Route::middleware(['auth'])->group(function(){
Route::controller(BookingController::class)->group(function(){
Route::get('/checkout/','CheckOut')->name('checkout');
Route::post('/booking/store','BookingStore')->name('user_booking_store');
Route::post('/checkout/store', 'CheckoutStore')->name('checkout.store');

});
});
