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

class EmailNotification extends Controller {
    /*send mail to user*/
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

}
