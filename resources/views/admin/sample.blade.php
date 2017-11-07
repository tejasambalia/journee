@extends('Admin.layouts.master')
@section('title','Admin Login')
@section('style')
<!--page level style-->
@endsection
<!--page content-->
@section('content')
    {!! Form::open(array('url' => 'post_login')) !!}
    Enter Email:{{ Form::input('text', 'name') }}<br>
    Enter Password:{{ Form::input('password', 'password') }}
    {{ Form::submit('Save', array('class' => 'btn')) }}
    {!! Form::close() !!}
@endsection
@section('script')
<!--page level script-->
@endsection
