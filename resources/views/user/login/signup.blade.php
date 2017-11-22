@extends('user.layouts.master')
@section('title','Sign Up')
@section('style')
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
    {!! Form::open(array('url' => 'post_signup','id'=>'sign_up')) !!}
        {{ Form::label('name', 'Enter Name:') }} {{ Form::input('text', 'name','',['required','class'=>'form-control']) }}
        {{ Form::label('email', 'Enter Email:') }} {{ Form::input('email', 'email','',['required','class'=>'form-control']) }}
        {{ Form::label('password', 'Enter Password:') }} {{ Form::input('password', 'password','',['required','class'=>'form-control']) }}<br>
        {{ Form::label('cpassword', 'Enter confirm Password:') }} {{ Form::input('password', 'cpassword','',['required','class'=>'form-control']) }}
        {{ Form::submit('Sign Up', array('class' => 'btn btn-default btn-login')) }}
    {!! Form::close() !!}
@endsection
@section('script')
<script>
$( "#sign_up" ).validate({
  rules: {
    password: "required",
    cpassword: {
      equalTo: "#password"
    }
  }
});
</script>
@endsection
