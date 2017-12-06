@extends('user.layouts.master')
@section('title','Sign Up')
@section('style')
@endsection
<!--page content-->
<?php 
use App\Classes\DropDown;
?>
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
    {!! Form::open(array('url' => 'post_inquiry','id'=>'inquiry')) !!}
        {{ Form::label('name', 'Enter Name:') }} {{ Form::input('text', 'name','',['required','class'=>'form-control']) }}
        {{ Form::label('mobile_number', 'Enter Mobile Number:') }} {{ Form::input('text', 'mobile_number','',['required','class'=>'form-control']) }}
        {{ Form::label('email', 'Enter Email:') }} {{ Form::input('email', 'email','',['required','class'=>'form-control']) }}<br>
        
        <select class="form-control" name="type">
                                    <?php
                                    foreach ($states as $state)
                                    {
                                        print_r($state);
                                            }
                                    $data = array(
                                            '5 Start' => '5 Start',
                                            '3 Start' => '3 Start'
                                            );
                                    $obj = new DropDown;
                                    $DropDown = $obj->DropDown($data);
                                    echo $DropDown;
                                    ?>
        </select>
        
        {{ Form::submit('Submit', array('class' => 'btn btn-default btn-login')) }}
        {{ Form::reset('Clear', array('class' => 'btn btn-default btn-login')) }}
    {!! Form::close() !!}
@endsection
@section('script')

@endsection
