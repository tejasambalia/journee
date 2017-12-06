<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Admin
/*
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
Admin area routs start
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
*/
Route::get('/admin', 'Admin\LoginController@index');
Route::post('/admin/post_login', 'Admin\LoginController@post_login');

//package category
Route::get('/admin/packageCategory', 'Admin\PackageController@category');
Route::get('/admin/addPackageCategory', 'Admin\PackageController@addCategory');
Route::post('/admin/handleAddPackageCategory', 'Admin\PackageController@handleAddCategory');
Route::get('/admin/deletePackageCategory/{id}', 'Admin\PackageController@deleteCategory');
Route::get('/admin/editPackageCategory/{id}', 'Admin\PackageController@editCategory');
Route::post('/admin/handleEditPackageCategory', 'Admin\PackageController@handleEditCategory');
//room type
Route::get('/admin/roomType', 'Admin\RoomController@type');
Route::get('/admin/addRoomType', 'Admin\RoomController@addType');
Route::post('/admin/handleAddRoomType', 'Admin\RoomController@handleAddType');
Route::get('/admin/deleteRoomType/{id}', 'Admin\RoomController@deleteType');
Route::get('/admin/editRoomType/{id}', 'Admin\RoomController@editType');
Route::post('/admin/handleEditRoomType', 'Admin\RoomController@handleEditType');
//hotel
Route::get('/admin/hotel', 'Admin\HotelController@hotel');
Route::get('/admin/addHotel', 'Admin\HotelController@addHotel');
Route::post('/admin/handleAddHotel', 'Admin\HotelController@handleAddHotel');
Route::get('/admin/viewHotel/{id}', 'Admin\HotelController@viewHotel');
Route::get('/admin/editHotel/{id}', 'Admin\HotelController@editHotel');
Route::post('/admin/handleEditHotel', 'Admin\HotelController@handleEditHotel');
Route::get('/admin/deleteHotel/{id}', 'Admin\HotelController@deleteHotel');
//package
Route::get('/admin/package', 'Admin\PackageController@package');
Route::get('/admin/addPackage', 'Admin\PackageController@addPackage');
Route::post('/admin/handleAddPackage', 'Admin\PackageController@handleAddPackage');
Route::get('/admin/viewPackage/{id}', 'Admin\PackageController@viewPackage');
Route::get('/admin/editPackage/{id}', 'Admin\PackageController@editPackage');
Route::get('/admin/deletePackage/{id}', 'Admin\PackageController@deletePackage');
//users
Route::get('/admin/users', 'Admin\UsersController@user');
//Inquiry
Route::get('/admin/inquiry', 'Admin\InquiryControllter@inquiry');
//Orders
Route::get('/admin/order', 'Admin\OrderController@order');
//Report
Route::get('/admin/report', 'Admin\ReportController@report');

//fetch hotelwise room dropdown
Route::get('/admin/fetchroom', 'Admin\RoomController@fetchroom');

/*
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
Website routs start
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
*/
//User
Route::get('/', function (){    return view('user.homepage');});
Route::get('/login', 'User\LoginController@index');
Route::post('/post_login', 'User\LoginController@post_login');
Route::get('/signup', 'User\LoginController@signup');
Route::post('/post_signup', 'User\LoginController@post_signup');

Route::get('/forgotpassword', 'User\LoginController@forgotpassword');
Route::post('/post_forgotpassword', 'User\LoginController@post_forgotpassword');

Route::get('/passwordreset/{id}', 'User\LoginController@passwordreset');
Route::post('/post_passwordreset/{id}', 'User\LoginController@post_passwordreset');
//logout
Route::get('/logout', 'User\LogoutController@index');
//about us
Route::get('/aboutus', 'User\AboutusController@index');
Route::get('/package', 'User\PackageController@index');
Route::get('/packagedetails/{id}', 'User\PackageController@packagedetails');
//inquiry 
Route::post('/post_inquiry', 'User\InquiryController@post_inquiry'); 
Route::get('/dynamic_country_state', 'GeneralController@dynamic_country_state'); 

Route::group(['middleware' => 'User'], function () {        
    
});

/*
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
Cron JOB routs
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
*/
//cron route
Route::get('cron/processmail','Notification\CronRoute@processmail');
