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
                    <h3 class="text-center">Reset Password</h3>
                </div>
            {!! Form::open(array('url' => "post_passwordreset/".$user_id,'class'=>'modal_form','id'=>'password_reset')) !!}                        
            <div class="form-group">
                {{ Form::label('email', 'Enter Email:') }}    
                {{ Form::input('text', 'email','',['required','class'=>'form-control','placeholder'=>'user@mail.com']) }}
            </div>  
            <div class="form-group">
                {{ Form::label('password', 'Enter Password:') }} 
                {{ Form::input('password', 'password','',['required','class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('cpassword', 'Enter confirm Password:') }} 
                {{ Form::input('password', 'cpassword','',['required','class'=>'form-control']) }}
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default btn-login">submit</button>
            </div>
            {!! Form::close() !!}    
            <p class="register">Please check you mail for further process.</p>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<!--page level script-->
<script>
$( "#password_reset" ).validate({
  rules: {
    password: "required",
    cpassword: {
      equalTo: "#password"
    }
  }
});
</script>
@endsection
