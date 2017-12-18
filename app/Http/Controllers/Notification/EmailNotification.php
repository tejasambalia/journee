<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//add models
use App\UserModels\Users;
//event
//use Event;
//use App\Events\UserLoginEvent;
use Mail;
use App\Http\Controllers\Notification\Email;
use App\AdminModels\City;
use App\AdminModels\State;
use App\AdminModels\Country;
class EmailNotification extends Controller {
    /*send mail to user*/
    public function registration_success_mail($user_id) { 
        try {             
            $user_details = Users::where('id', $user_id)->first();                                     
            $vars = array('user_name' => $user_details['name'],                 
                'link'=>"testing..." 
            ); 
            (new Email)->send_email_template("rupalbapodarak@gmail.com",$user_details['email'], 1,array(),$vars); 
        } catch (\Exception $ex) { 
            echo $ex->getMessage(); 
            \Log::error('From EmailNotification(registration_success_mail):' . $ex->getMessage()); 
        } 
    }    
    public function forgot_password_mail($user_id) {
        try {            
            $user_details = Users::where('id', $user_id)->first();                                    
            $vars = array('user_name' => $user_details['name'],                
                'link'=>url("/passwordreset/".$user_id)
            );
            (new Email)->send_email_template("rupalbapodarak@gmail.com",$user_details['email'], 2,array(),$vars);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            \Log::error('From EmailNotification(forgot_password_mail):' . $ex->getMessage());
        }
    }

    public function password_reset_success_mail($user_id) {
      try {            
            $user_details = Users::where('id', $user_id)->first();                                    
            $vars = array('user_name' => $user_details['name'],                
                'link'=>url("/passwordreset/".$user_id)
            );
            (new Email)->send_email_template("rupalbapodarak@gmail.com",$user_details['email'], 3,array(),$vars);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            \Log::error('From EmailNotification(password_reset_success_mail):' . $ex->getMessage());
        }
    }

    public function inquiry_mail($admin_id,$data) {
        try {            
            $admin_details = \App\AdminModels\Users::where('id', $admin_id)->first();  
            
            $vars = array('admin_name' => $admin_details['name'],                
                'name'=>$data['name'],
                'email'=>$data['email'],
                'mobile_number'=>$data['contact'],
                'country'=> Country::getSingleColumnData($data['m_country_id'],'name'),
                'state'=>State::getSingleColumnData($data['m_state_id'],'name'),
                'city'=>City::getSingleColumnData($data['m_city_id'],'name'),
                'description'=>$data['description'],
            );            
            (new Email)->send_email_template("rupalbapodarak@gmail.com",$admin_details['email'], 4,array(),$vars);
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            \Log::error('From EmailNotification(inquiry_mail):' . $ex->getMessage());
        }
    }   

}
