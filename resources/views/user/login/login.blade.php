@extends('user.layouts.master')
@section('title','User Login')
@section('style')
<!--page level style-->
@endsection
<!--page content-->

@section('content')
@if(session('error_msg'))      
<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{session('error_msg')}}
</div>
@elseif(session('success_msg'))       
<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{session('success_msg')}}
</div>
@endif

<section class="login_sec">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="logo_modal form-group">
                    <h3 class="text-center">Login Now</h3>
                </div>
                {!! Form::open(array('url' => 'post_login','class'=>'modal_form')) !!}                        
                    <div class="form-group space30">
                        <label>Email:</label>
                        <input type="text" class="form-control" name="email" placeholder="user@mail.com" required="">
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="********" required="">
                    </div>
                    <div class="row">
                        <div class="col-xs-4 form-group">
                            <button type="submit" class="btn btn-default btn-login">submit</button>
                        </div>
                        <div class="col-xs-8 text-right">                   
                            {{ Html::link('/forgotpassword', 'Forgot Password?', array('class' => 'forgot'))}}
                        </div>
                    </div>
                    <div>
                        {{ Html::link('/signup', 'Register Now', array('class' => 'forgot'))}}
                    </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
        
@endsection
@section('script')
<!--page level script-->
@endsection
