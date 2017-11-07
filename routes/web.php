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
//User
Route::get('/', function (){    return view('user.homepage');});
Route::get('/login', 'User\LoginController@index');
Route::post('/post_login', 'User\LoginController@post_login');
Route::get('/signup', 'User\LoginController@signup');
Route::post('/post_signup', 'User\LoginController@post_signup');

Route::group(['middleware' => 'User'], function () {        
    
});

//cron route
Route::get('cron/processmail','Notification\CronRoute@processmail');
