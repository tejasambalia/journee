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
use App\AdminModels\Users;
class LoginController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {
        return view('admin.login');
    }
    function post_login(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $count=Users::where(array('username'=>"$username",'password'=>"$password"))->count();   
        if($count>0)
        {
            echo "success";
        }   
    }
}