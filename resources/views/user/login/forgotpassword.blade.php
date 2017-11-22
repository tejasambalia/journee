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
{!! Form::open(array('url' => 'post_forgotpassword','class'=>'modal_form')) !!}                        
<div class="form-group">
    <label>Email:</label>
    <input type="text" class="form-control" name="email" placeholder="user@mail.com" required="">
</div>  
<button type="submit" class="btn btn-default btn-login">submit</button>
{!! Form::close() !!}    
<p class="register">Please check you mail for further process.</p>
@endsection
@section('script')
<!--page level script-->
@endsection
