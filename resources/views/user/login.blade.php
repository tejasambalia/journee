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
    {!! Form::open(array('url' => 'post_login')) !!}
    Enter Email:{{ Form::input('text', 'email') }}<br>
    Enter Password:{{ Form::input('password', 'password') }}<br>
    {{ Form::submit('Login', array('class' => 'btn')) }}
    {{ Html::link('/password_reset', 'Password Reset')}}
    {{ Html::link('/signup', 'Sign Up')}}
    {!! Form::close() !!}
@endsection
@section('script')
<!--page level script-->
@endsection
