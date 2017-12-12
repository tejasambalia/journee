<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Admin Models
use App\AdminModels\Users;

class UsersController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function user()
    {
        return view('admin.users.user');
    }

    public function addUser(){
        return view('admin.users.addUser');
    }

    public function editUser($id){
        return view('admin.users.editUser')->with(array('id' => $id));
    }

    public function handleAddUser(Request $request){
        $data = $request->all();
        $data['role'] = '1';
        Users::add($data);

        return redirect('/admin/users');
    }

    public function handleEditUser(Request $request){
        $data = $request->all();
        $data['role'] = '1';
        Users::edit($data);

        return redirect('/admin/users');
    }

    public function deleteUser($id){
        Users::inactivate($id);

        return redirect('/admin/users');
    }
}