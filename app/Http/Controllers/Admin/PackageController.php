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
}