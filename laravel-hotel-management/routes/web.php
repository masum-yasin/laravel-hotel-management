<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\CommentController;
use App\Http\Controllers\backend\GalleryController;
use App\Http\Controllers\backend\ReportController;
use App\Http\Controllers\backend\RoomController;
use App\Http\Controllers\backend\TeamController;
use App\Http\Controllers\backend\RoomTypeController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Frontend\FrontendRoomController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backend\RoomListController;
use App\Http\Controllers\backend\SettingController;
use App\Http\Controllers\backend\TestimonialController;

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

    // Testimonial Rotue
    
    Route::controller(TestimonialController::class)->group(function(){
        Route::get('alltestimonial', 'Alltestimonial')->name('alltestimonial');
        Route::get('testimonial.add', 'TestimonialAdd')->name('testimonial.add');
        Route::post('testimonialStore', 'TestimonialStore')->name('testimonialStore');
        Route::get('testimonialEdit/{id}', 'TestimonialEdit')->name('testimonialEdit');
        Route::post('testimonialUpdate', 'TestimonialUpdate')->name('testimonialUpdate');
        Route::get('testimonialDelete/{id}', 'TestimonialDelete')->name('testimonialDelete');
    });

    // Room Type Controller Route

    Route::controller(RoomTypeController::class)->group(function(){
    Route::get('room/type/list','RoomTypeList')->name('room.type.list');
    Route::get('add/room/type','AddRoomType')->name('add.room.type');
    Route::post('add/room/type','RoomTypeStore')->name('store.room.type');
    
}); 

// Room Controller Route
Route::controller(RoomController::class)->group(function(){
    Route::get('edit/room/{id}','EditRoom')->name('edit.room');
    Route::post('update/room/{id}','UpdateRoom')->name('update.room');
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
Route::get('download/invice/{id}','DownloadInvoice')->name('download.invoice');


});

// Blog Controller here
Route::controller(BlogController::class)->group(function(){
Route::get('blog/category', 'BlogCategory')->name('blog.category');
Route::post('blog/category/store', 'BlogCategoryStore')->name('blog.category.store');
Route::get('edit/blog/category/{id}', 'EditBlogCategory');
Route::post('update/blog/category', 'UpdateBlogCategory')->name('update.blog.category');
Route::get('delete/blog/category/{id}','DeleteBlogCategory')->name('delete.blog.category');
});

// Blog Post Route Here

Route::controller(BlogController::class)->group(function(){
Route::get('all/blog/post', 'AllBlogPost')->name('all.blog.post');

Route::any('add/blog/post', "AddBlogPost")->name('add.blog.post');

Route::post('store.blog.post', 'StoreBlogPost')->name('store.blog.post');
Route::get('blogpost.edit/{id}', 'EditBlogPost')->name('blogpost.edit');
Route::post('blogpost.update/', 'UpdatePostBlog')->name('blogpost.update');
Route::get('blogpost.delete/{id}', 'DeletePostBlog')->name('blogpost.delete');

});
// Here Are All comment Route
Route::controller(CommentController::class)->group(function(){
Route::get('all/comment/', 'AllComment')->name('all.comment');
Route::post('update/comment/status/', 'UpdateCommentStatus')->name('update.comment.status');

});
// Here Are Report Controller
 Route::controller(ReportController::class)->group(function(){
    Route::get('booking/report/', 'BookingReport')->name('booking.report');
    Route::post('search/by/date', 'SearchByDate')->name('search-by-date');
});

Route::controller(GalleryController::class)->group(function(){
    Route::get('contact/message', 'AdminContactMessage')->name('contact.message');
    Route::get('all/gallery', 'AllGallery')->name('all.gallery');
    Route::get('add.gallery', 'AddGallery')->name('add.gallery');
    Route::post('gallery/store', 'GalleryStore')->name('gallery.store');
    Route::get('edit/gallery/{id}', 'EditGallery')->name('edit.gallery');
    Route::post('update/gallery', 'UpdateGallery')->name('update.gallery');
    Route::get('delete/gallery/{id}', 'DeleteGallery')->name('delete.gallery');
    Route::post('delete/gallery/multiple', 'DeleteMultipleGallery')->name('delete.gallery.multiple');

});

// Here Are Setting Controller

Route::controller(SettingController::class)->group(function(){
    Route::get('site/setting', 'SiteSetting')->name('site.setting');
    Route::post('site/setting/update', 'SiteSettingUpdate')->name('site.setting.update');
});

});

// Middleware User must access for user login here

Route::middleware(['auth'])->group(function(){
Route::controller(BookingController::class)->group(function(){
Route::get('/checkout/','CheckOut')->name('checkout');
Route::post('/booking/store','BookingStore')->name('user_booking_store');
Route::post('/checkout/store', 'CheckoutStore')->name('checkout.store');
Route::post('update/booking/status/{id}', 'UpdateBookingStatus')->name('update.booking.status');
Route::post('update/booking/{id}', 'UpdateBooking')->name('update.booking');
Route::get('assign_room/{id}', 'AssignRoom')->name('assign_room');
Route::get('assign_room/store/{booking_id}/{room_number_id}', 'AssignRoomStore')->name('assign_room_store');
Route::get('assign_room_delete/{id}', 'AssignRoomDelete')->name('assign_room_delete');


Route::get('user.bookinglist', 'UserBookingList')->name('user.bookinglist');
Route::get('userpdf/invoice/{id}','UserPdfInvoice')->name('userpdf.invoice');
});


Route::controller(RoomListController::class)->group(function(){
    Route::get('view/room/list', 'ViewRoomList')->name('view.room.list');
    Route::get('add/roomlist', 'AddRoomList')->name('add.room.list');
    Route::post('store/room/list', 'StoreRoomList')->name('store.roomlist');

});
});
// Frontend Route Here Are
Route::controller(FrontendRoomController::class)->group(function(){
    Route::get('/rooms/','AllFrontendRoomList')->name('frontendall.rooms');
    Route::get('room/details/{id}','RoomDetailsPage');
    Route::get('/booking/','BookingSearch')->name('booking.search');
    Route::get('search/room/details/{id}', 'SearchRoomDetails')->name('search.room.details');

    Route::post('/check_room_availability', 'CheckRoomAvailability')->name('check_room_availability');
});


Route::controller(BlogController::class)->group(function(){
    Route::get('blog/details/{slug}', 'BlogDetails');
    Route::get('blog/cat/list/{id}', 'BlogCatList');
    Route::get('blog/menu', 'blogMenu');
});

// Frontend Comment Controller
Route::controller(CommentController::class)->group(function(){
    Route::post('comment/store/', 'CommentStore')->name('comment.store');
});

// Frontend Gallery Controller 
Route::controller(GalleryController::class)->group(function(){
    Route::get('contact.us', 'ContactUs')->name('contact.us');
    Route::post('contact/store', 'ContactStore')->name('contact.store');
    Route::get('show/gallery', 'ShowGallery')->name('show.gallery');
   

});
