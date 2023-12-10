<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


//login routes
Route::get('login', [HomeController::class, 'login'])->name('login');
Route::get('about', [HomeController::class, 'about'])->name('about');

Route::post('login_user', [HomeController::class, 'login_user'])->name('login_user');

//signup routes
Route::get('signup', [HomeController::class, 'signup'])->name('signup');
Route::post('register', [HomeController::class, 'register_user'])->name('register_user');




Route::get('addtocart', [HomeController::class, 'checkout'])->name('checkout');

Route::get('/delete_cart_item', [HomeController::class,'delete_cart_item'])->name('delete_cart_item');




Route::get('livestock', [HomeController::class, 'livestock'])->name('livestock');



Route::get('trackorder', [HomeController::class, 'trackorder'])->name('trackorder');



// Route::get('detail', [HomeController::class, 'detail'])->name('detail');
Route::post('/detail', [HomeController::class , 'detail'])->name('detail');
Route::post('add_to_cart', [HomeController::class, 'add_to_cart'])->name('add_to_cart');
Route::post('send_an_offer', [HomeController::class, 'send_an_offer'])->name('send_an_offer');
Route::post('send_an_offer_from_addtocart', [HomeController::class, 'send_an_offer_from_addtocart'])->name('send_an_offer_from_addtocart');




Route::post('logout', [HomeController::class, 'logout'])->name('logout_user');





//dashboard routess

Route::get('dashboard' , [AdminController::class , 'dashboard'])->name('dashboard');
Route::get('add_user' , [AdminController::class , 'add_user'])->name('add_user');
Route::get('show_user' , [AdminController::class , 'show_user'])->name('show_user');

Route::get('add_truck' , [AdminController::class , 'add_truck'])->name('add_truck');
Route::get('show_truck' , [AdminController::class , 'show_truck'])->name('show_truck');

Route::post('store_truck', [AdminController::class, 'store_truck'])->name('store_truck');


Route::get('add_product' , [AdminController::class , 'add_product'])->name('add_product');
Route::get('show_product' , [AdminController::class , 'show_product'])->name('show_product');


Route::post('store_product', [AdminController::class, 'store_product'])->name('store_product');
Route::get('login_admin' , [AdminController::class , 'login_admin'])->name('login_admin');
Route::post('login_admin_dashboard', [AdminController::class, 'login_admin_dashboard'])->name('login_admin_dashboard');
Route::get('view_orders' , [AdminController::class , 'view_orders'])->name('view_orders');
Route::post('offers', [AdminController::class, 'offers'])->name('offers');
Route::get('view_request' , [AdminController::class , 'view_request'])->name('view_request');
Route::post('acceptAction', [AdminController::class, 'acceptAction'])->name('acceptAction');
Route::post('rejectAction', [AdminController::class, 'rejectAction'])->name('rejectAction');
Route::get('location' , [AdminController::class , 'location'])->name('location');


Route::post('location_update', [AdminController::class, 'location_update'])->name('location_update');
Route::get('track_order' , [AdminController::class , 'track_order'])->name('track_order');

Route::get('Profile_Page' , [AdminController::class , 'Profile_Page'])->name('Profile_Page');

Route::post('password_change', [AdminController::class, 'password_change'])->name('password.change');
Route::post('profile_update', [AdminController::class, 'profile_update'])->name('profile_update');

Route::get('view_about' , [AdminController::class , 'view_about'])->name('view_about');

Route::post('about_content', [AdminController::class, 'about_content'])->name('about_content');

Route::get('contact_us' , [HomeController::class , 'contact_us'])->name('contact_us');

Route::post('Contact_store', [HomeController::class, 'Contact_store'])->name('Contact_store');

Route::post('/filter-animal',[HomeController::class , 'filterAnimal' ])->name('filter_animal');

Route::get('contact' , [HomeController::class , 'contact'])->name('contact');

//payment routes------------------------------------------------------------

Route::get('payment' , [HomeController::class , 'payment'])->name('payment');
Route::post('/insert_payment_info_in_db',[AdminController::class , 'insert_payment_info_in_db' ])->name('insert_payment_info_in_db');
Route::post('/update_delivery_status',[AdminController::class , 'update_delivery_status' ])->name('update_delivery_status');




//ratings----------------------------------------------------------------------
Route::get('ratings' , [AdminController::class , 'ratings'])->name('ratings');
Route::post('/rate_offer',[AdminController::class , 'rate_offer' ])->name('rate_offer');

Route::get('View_Ratings' , [AdminController::class , 'View_Ratings'])->name('View_Ratings');


