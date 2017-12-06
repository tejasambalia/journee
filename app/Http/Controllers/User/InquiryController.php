<?php
namespace App\Http\Controllers\User;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Notification\EmailNotification;
//add models
use DB;



class InquiryController extends Controller {

    public function post_inquiry(Request $request) {
        try {
            $name=$request->get('name');
            $mobile_number=$request->get('mobile_number');
            $country=$request->get('country');            
            $state=$request->get('state');
            $city=$request->get('city');
            $description=$request->get('description');
            $email=$request->get('email');
            if(!empty($name)&&!empty($mobile_number)&&!empty($country)&&!empty($city)&&!empty($state)&&!empty($description)&&!empty($email))
            {
                $data=array(
                    'name'=>$name,
                    'contact'=>$mobile_number,
                    'email'=>$email,
                    'm_country_id'=>$country,
                    'm_state_id'=>$state,
                    'm_city_id'=>$city,
                    'description'=>$description,
                );
                DB::table('inquiry')->insert($data);
                (new EmailNotification)->inquiry_mail(1,$data);
                return redirect('/')->with("success_msg","Your inquiry details submited successfully.");
            }
            return redirect('/')->with("error_msg","Please fill require filed");
        } catch (\Exception $ex) {
            return redirect('/')->with("error_msg","Something went wrong try again.");
        }
    }
}