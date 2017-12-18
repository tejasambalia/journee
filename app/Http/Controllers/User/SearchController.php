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
use DB;
//add models
use App\UserModels\Users;
use App\AdminModels\Hotel;
use App\AdminModels\State;
use App\AdminModels\City;
use App\AdminModels\Package;
class SearchController extends Controller {

    public function index(Request $request) {
        
        try {            
            
            //$search_result=State::("name like '".$request->get('search_text')."'");
            $where='1';// defailt display all package
            $search_text=$request->get('search_text');
            $from_date=$request->get('from_date');
            $to_date=$request->get('to_date');                        
            if($search_text!='')
            {
                $search_result=City::where("name",'like',$request->get('search_text'))->select('id')->first();            
                if(count($search_result)>0)
                {
                    $where='(city='.$search_result->id.")";
                }
            }
            if($from_date!='' && $to_date!='')
            {
                $from_date=date('Y-m-d',strtotime($from_date));      
                $to_date=date('Y-m-d',strtotime($to_date));      
                if($where=='1')
                {
                    $where='';
                }
                else
                {
                    $where.=' and ';
                }
                $where.=" (DATE_FORMAT(available_start_date,'%Y-%m-%d')<='$from_date' and DATE_FORMAT(available_end_date,'%Y-%m-%d')>='$to_date')";
                
            }
            $package_details=DB::connection('mysql')->select("select * from package where $where");            
            if(count($package_details)>0)
            {
                return view('user.package.index')->with(['package_details'=>$package_details]);
            }
            return redirect('/')->with("error_msg","No any result found for : ".$request->get('search_text').".");
        } catch (\Exception $ex) {
            return redirect('/')->with("error_msg","Something went wrong.".$ex->getMessage());
        }
    }    
    public function hotel_details()
    {
        
    }
}