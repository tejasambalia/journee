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
use App\AdminModels\Package;
use App\AdminModels\Hotel;
class PackageController extends Controller {

    public function index() {
        try {
            $package_details= Package::get();    
            $Hotel_types= Hotel::select('type')->distinct('id')->get();            
            return view('user.package.index')->with(['package_details'=>$package_details,'Hotel_types'=>$Hotel_types]);
        } catch (\Exception $ex) {
            return redirect('/')->with("error_msg","Something went wrong.");
        }
    }
    public function packagedetails($package_id)
    {
        try
        {
            $package_details= Package::where('id',$package_id)->first();    
            $Hotel_types= Hotel::select('type')->distinct('id')->get();            
            return view('user.package.packagedetails')->with(['package_details'=>$package_details,'Hotel_types'=>$Hotel_types]);;
        } catch (\Exception $ex) {
            return redirect('/package')->with("error_msg","Something went wrong.");
        }
    }
}