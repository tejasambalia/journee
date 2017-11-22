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
use App\Http\Controllers\Notification\EmailNotification;
//add models
use App\UserModels\Users;

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
        return view('user.login.login');
    }
    function post_login(Request $request)
    {   
        try
        {          
            $email=$request->get('email');
            $password=md5($request->get('password'));
            $user_details=Users::where(array('email'=>"$email",'password'=>"$password"))->select('id')->first();               
            if(count($user_details)>0)
            {
                session(['user_id' =>$user_details->id]);                
                return redirect('/')->with("success_msg","Successfully Login");
            }
            else
            {
                return redirect('/login')->with("error_msg","Invalid email or Password.");
            }
            
        
        } catch (\Exception $ex) {

        }
    }
    function signup()
    {
        return view('user.login.signup');
    }
    function post_signup(Request $request)
    {
        try
        {
            $name=trim($request->get('name'));   
            $email=trim($request->get('email'));   
            $password=trim($request->get('password'));   
            $cpassword=trim($request->get('cpassword'));              
            if(User::where(array('email'=>$email))->count()>0)
            {
               return redirect('/signup')->with("error_msg","This email already exiest.");  
            }
            else if($password!=$cpassword)
            {
               return redirect('/signup')->with("error_msg","Password & confirm password must be same."); 
            }
            else if(!empty($name) && !empty($email) && !empty($password) && !empty($cpassword))
            {
                $user_id=User::insertGetId(array('name'=>$name,'email'=>$email,'password'=>md5($password)));
                //registration success
                (new EmailNotification)->registration_success_mail($user_id);
                return redirect('/signup')->with("success_msg","Registration successfully.");
            }
            return redirect('/signup')->with("error_msg","Invalid details.");
        } catch (\Exception $ex) {

        }
        
    }
    function forgotpassword()
    {
        return view('user.login.forgotpassword');
    }
    function post_forgotpassword(Request $request)
    {
        $email=trim($request->get('email'));        
        $user_details=User::where(array('email'=>$email))->select('id')->first();        
        if(count($user_details)>0)
        {
             (new EmailNotification)->forgot_password_mail($user_details->id);
              return redirect('/forgotpassword')->with("success_msg","Please check your mail.");
        }
        return redirect('/forgotpassword')->with("error_msg","Email not found,Please provide register email.");  
    }
    function passwordreset($user_id)
    {   
        if(is_numeric($user_id))
        {
            if(User::where(array('id'=>$user_id))->count()>0)
            {                
                return view('user.login.passwordreset')->with(['user_id'=>$user_id]);
            }
        }
        return redirect('/')->with("error_msg","Something went wrong.Try again.");  
    }
    function post_passwordreset($user_id,Request $request)
    {
            $email=trim($request->get('email'));   
            $password=trim($request->get('password'));   
            $cpassword=trim($request->get('cpassword'));              
            
            $user_details=User::where(array('id'=>$user_id))->select('email')->first();        
            if($user_details->email!=$email)
            {
               return redirect('/passwordreset/'.$user_id)->with("error_msg","Please enter registered email.");  
            }
            else if($password!=$cpassword)
            {
               return redirect('/passwordreset/'.$user_id)->with("error_msg","Password & confirm password must be same."); 
            }
            else if(!empty($email) && !empty($password) && !empty($cpassword))
            {
                User::where(array('id'=>$user_id))->update(array('password'=>md5($password)));
                //Password reset mail
                (new EmailNotification)->password_reset_success_mail($user_id);
                return redirect('/login')->with("success_msg","Password reset successfully.");
            }
            return redirect('/passwordreset')->with("error_msg","Invalid details.");
    }
}