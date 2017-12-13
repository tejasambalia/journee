<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Admin Models
use App\AdminModels\PackageCategory;
use App\AdminModels\Package;
use App\Classes\ArrayClass;
use App\AdminModels\PackageHotel;
use App\AdminModels\PackageRoom;
use App\Classes\General;
use Image;

class PackageController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function category()
    {
        return view('admin.package.category');
    }

    public function addCategory(){
        return view('admin.package.addCategory');
    }

    public function editCategory($id){
        return view('admin.package.editCategory')->with(array('id' => $id));
    }

    public function handleAddCategory(Request $request){
        $data = $request->all();
        PackageCategory::add($data);

        return redirect('/admin/packageCategory');
    }

    public function handleEditCategory(Request $request){
        $data = $request->all();
        PackageCategory::edit($data);

        return redirect('/admin/packageCategory');
    }

    public function deleteCategory($id){
        PackageCategory::remove($id);

        return redirect('/admin/packageCategory');
    }

    public function package(){
        return view('admin.package.package');
    }

    public function addPackage(){
        return view('admin.package.addPackage');
    }

    public function handleAddPackage(Request $request){
        $data = $request->all();

        //upload package image
        $package_image = $request->file('upload_image');
        $imagename = time().'_package.'.$package_image->getClientOriginalExtension();
        $request->upload_image->move(public_path('img'), $imagename);

        //generate package image path
        $obj = new General;
        $data['upload_image'] = $obj->getUserImagePath($imagename);

        //add package details
        $package_data = array();
        $package_data['name'] = $data['name'];
        $package_data['price'] = $data['price'];
        $package_data['category'] = $data['category'];
        $package_data['days'] = $data['days'];
        $package_data['nights'] = $data['nights'];
        $package_data['city'] = $data['city'];
        $package_data['coupon_id'] = $data['coupon_id'];
        $package_data['discount_type'] = $data['discount_type'];
        $package_data['discount_amount'] = $data['discount_amount'];
        $package_data['description'] = $data['description'];
        $package_data['available_start_date'] = $data['available_start_date'];
        $package_data['available_end_date'] = $data['available_end_date'];
        $package_data['zone'] = $data['zone'];
        $package_data['upload_image'] = $data['upload_image'];

        $package_id = Package::add($package_data);

        //add hotel details
        $hotel_data['package_id'] = $package_id;
        $hotel_data['hotel_id'] = $data['package_hotel'];

        $package_hotel_id = PackageHotel::add($hotel_data);

        //add room details
        $room_data['package_hotel_id'] = $package_hotel_id;
        $room_data['room_id'] = $data['package_room'];

        PackageRoom::add($room_data);

        return redirect('/admin/package');
    }

    public function handleEditPackage(Request $request){
        $data = $request->all();

        //edit package details
        $package_data = array();
        $package_data['id'] = $data['id'];
        $package_data['name'] = $data['name'];
        $package_data['price'] = $data['price'];
        $package_data['category'] = $data['category'];
        $package_data['days'] = $data['days'];
        $package_data['nights'] = $data['nights'];
        $package_data['city'] = $data['city'];
        $package_data['coupon_id'] = $data['coupon_id'];
        $package_data['discount_type'] = $data['discount_type'];
        $package_data['discount_amount'] = $data['discount_amount'];
        $package_data['description'] = $data['description'];
        $package_data['available_start_date'] = $data['available_start_date'];
        $package_data['available_end_date'] = $data['available_end_date'];
        $package_data['zone'] = $data['zone'];

        Package::edit($package_data);

        //edit hotel details
        $hotel_data['id'] = $data['hotel_id'];
        $hotel_data['hotel_id'] = $data['package_hotel'];

        PackageHotel::edit($hotel_data);

        //edit room details
        $room_data['id'] = $data['room_id'];
        $room_data['room_id'] = $data['package_room'];

        PackageRoom::edit($room_data);

        return redirect('/admin/package');
    }

    public function viewPackage($id){
        return view('admin.package.viewPackage')->with(array('id' => $id));
    }

    public function editPackage($id){
        return view('admin.package.editPackage')->with(array('id' => $id));
    }

    public function deletePackage($id){
        Package::remove($id);
        return redirect('/admin/package');
    }
}