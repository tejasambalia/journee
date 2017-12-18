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
use DB;
use App\Classes\DiscountType;
use App\AdminModels\Room;
use App\AdminModels\PackageHotel;
use App\AdminModels\PackageRoom;
use App\AdminModels\RoomType;
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
    function package_filter(Request $request)
    {
        //ajax call
        $zonein=$request->get('zones');      
        $min_amount=$request->get('min_amount');      
        $max_amount=$request->get('max_amount'); 
        //duration filter
        $min_days=$request->get('min_days');      
        $max_days=$request->get('max_days'); 
        $where='1';
        if($zonein!=''){   
            $where=" zone in($zonein)";
        }
        if($min_amount!='' && $max_amount!='')
        {
            if($zonein!='')
            {
                $where.=" and ";
            }
            else
            {
                $where='';
            }
            $where.="(price>=$min_amount and price<=$max_amount)";
        }
        if($min_days!='' && $max_days!='')
        {
            if($where!='1'||$where!='')
            {
             $where.=" and ";   
            }
            $where.="(days>=$min_days and days<=$max_days)";   
        }
                $package_details=DB::connection('mysql')->select("select * from package where $where");
                 if(count($package_details)>0){                     
                     echo "<div id='filter_package_details'><p class='packages_found' div='result_found'>".count($package_details)." Results Found</p>";
                     echo "<div class='row'>";
                    foreach($package_details as $row){                                        
                        $hotel_id = PackageHotel::getPackageFirstHotel($row->id);
                        $hotel_type = Hotel::getSingleColumnData($hotel_id->hotel_id, 'type');
                        $room_id = PackageRoom::getPackageFirstRoom($hotel_id->id);
                        $room_type_id = Room::getSingleColumnData($room_id->room_id, 'm_room_type_id');
                        $room_type = RoomType::getSingleColumnData($room_type_id, 'name');
                        $obj = new DiscountType;                                                    
                        $days=($row->days==1)?'Day':'Days';
                        $nights=($row->nights==1)?'Night':'Nights';                                    
                        
                         echo   "<div class='col-md-6 package_box'>".
                                "<div class='package_main_box'>".
                                    "<div class='package_img'>".
                                        "<a href='".url('/packagedetails/'.$row->id)."'> ".
                                     "<img src='".url($row->upload_image)."' height='200' width='200' class='img-responsive wid100'></a>".
                                    "</div>".
                                    "<div class='package_details'>".
                                        "<a href='".url('/packagedetails/'.$row->id)."'><h3 class='package_name'>".$row->name."</h3></a>".
                                        "<ul class='list-inline package_features'>".
                                            "<li><p class='package_duration'>".$row->days.$days." and ".$row->nights.$nights."</p></li>".
                                            "<li><p class='package_sharing'>".$room_type."</p></li>".
                                        "</ul>".
                                        "<ul class='package_pricing list-inline'>".
                                            "<li><p class='package_price'>Starting From: <span>Rs. ".$row->price."</span></p></li>".
                                            "<li><p class='package_discount'>".$row->discount_amount.' '.$obj->name($row->discount_type)." off</p></li>".
                                        "</ul>".
                                        "<ul class='list-inline package_hotel_include'>".
                                            "<li><p class='package_hotel'>Hotel Included:</p></li>".
                                            "<li><i class='ion-checkmark-circled active'></i> ".$hotel_type."</li>".
                                        "</ul>".
                                        "<div class='package_btn text-center'>".
                                            "<a href='".url('/packagedetails/'.$row->id)."' class='btn btn-default'>View Details</a>".
                                        "</div>".
                                    "</div>".
                                "</div>".
                            "</div>";    
                            } 
                        }
                        else {
                            echo "Result not found";
                        }
                        echo "</div></div>";
                }
    
}