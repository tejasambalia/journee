<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\User;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//add models
use App\UserModels\Users;

class PackageController extends Controller {

    public function index() {
        try {
            
            return view('user.package.index');
        } catch (\Exception $ex) {
            return redirect('login');
        }
    }
}