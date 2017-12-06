<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Classes\DropDown;
//model
use App\AdminModels\State;
use \App\AdminModels\City;
class GeneralController extends Controller
{
    public function dynamic_country_state(Request $request)
        {
            if(!empty($request->get("country_id")))
             {
                //Get all state data
                //$query = $db->query("SELECT * FROM states WHERE country_id = ".$_POST['country_id']." AND status = 1 ORDER BY state_name ASC");
                $states= State::where('country_id',$request->get('country_id'))->get()->pluck('name','id')->toArray();                                        
                if(count($states)>0)//Display states list
                echo (new DropDown)->DropDown($states);
            }

            if(!empty($request->get("state_id"))){
                //Get all city data
                $city= City::where('state',$request->get('state_id'))->get()->pluck('name','id')->toArray();                                                      
                //Display cities list
                if(count($city)>0)//Display states list
                echo (new DropDown)->DropDown($city);
            }

        }

}