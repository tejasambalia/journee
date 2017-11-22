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

        $package_id = Package::add($package_data);

        return redirect('/admin/package');
    }
}