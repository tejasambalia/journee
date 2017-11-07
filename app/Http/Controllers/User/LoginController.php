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
        return view('user.login');
    }
    function post_login(Request $request)
    {   
        try
        {          
            $email=$request->get('email');
            $password=$request->get('password');
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
        return view('user.signup');
    }
    function post_signup(Request $request)
    {
        try
        {
            $name=trim($request->get('name'));   
            $email=trim($request->get('email'));   
            $password=trim($request->get('password'));   
            $cpassword=trim($request->get('cpassword'));   
            if($password!=$cpassword)
            {
               return redirect('/signup')->with("error_msg","Password & confirm password must be same."); 
            }
            else if(!empty($name) && !empty($email) && !empty($password) && !empty($cpassword))
            {
                User::insert(array('name'=>$name,'email'=>$email,'password'=>md5($password)));
                //registration success
                (new EmailNotification)->registration_success_mail(1);
                return redirect('/signup')->with("success_msg","Registration successfully.");
            }
            return redirect('/signup')->with("error_msg","Invalid details.");
        } catch (\Exception $ex) {

        }
        
    }
}