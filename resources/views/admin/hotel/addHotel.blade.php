@extends('admin.layouts.master')
@section('title','Admin Login')
@section('style')
<!--page level style-->
@endsection
<!--page content-->
@section('content')
<?php
use App\Classes\DropDown;
use App\AdminModels\RoomType;
use App\AdminModels\State;
use App\AdminModels\City;
?>
    <section class="package-page">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="title space-bot-0">Add Hotel</h1>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(array('url' => '/admin/handleAddHotel', 'class' => 'basic-form', 'method' => 'post', 'enctype' => "multipart/form-data")) !!}
                    <form class="basic-form">
                        <div class="hotel_details">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Name:</label>
                                    {!! Form::text('name', null, array('class' => 'form-control',  'placeholder' => 'Hotel Name', 'required' => 'required')) !!}
                                </div>
                            </div>            
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>State:</label>
                                    <select class="form-control" name="state_id">
                                        <?php
                                            $stateData = State::get();
                                            $DropDown = $obj->ObjDropDown($stateData);
                                            echo $DropDown;
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label>City:</label>
                                    <select class="form-control" name="city_id">
                                        <?php
                                            $cityData = City::get();
                                            $DropDown = $obj->ObjDropDown($cityData);
                                            echo $DropDown;
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label>Upload Image:</label>
                                    {!! Form::file('hotel_image_path', array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#hotel_rooms_add">Continue</button>
                                </div>
                            </div>   
                        </div>
                        <div class="hotel_room_details collapse" id="hotel_rooms_add">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="list-inline">
                                        <li><h3 class="sub_title">Hotel's Room</h3></li>
                                        <li><a href="#" class="btn btn-default btn-bordered"><i class="ion-plus-round"></i> Add Room</a></li>
                                    </ul>                                        
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Room Name:</label>
                                    {!! Form::text('room_name[]', null, array('class' => 'form-control',  'placeholder' => 'Room Name', 'required' => 'required')) !!}
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Room Type:</label>
                                    <select class="form-control" name="m_room_type_id[]">
                                        <?php
                                            $data = RoomType::get();
                                            $DropDown = $obj->ObjDropDown($data);
                                            echo $DropDown;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Rooms Available:</label>
                                    {!! Form::number('total_available[]', null, array('class' => 'form-control',  'placeholder' => 'Total Available', 'required' => 'required')) !!}
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Affiliates:</label>
                                    {!! Form::text('option[]', 'Wifi, Food, Parking', array('class' => 'form-control',  'placeholder' => 'Affiliates', 'data-role' => 'tagsinput')) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Guests Allowed:</label>
                                        <div class="row">
                                            <div class="col-xs-6 form-group">
                                                <select class="form-control" name="guest_condition[]">
                                                    <?php
                                                        $data = array('More Than', 'Less Than', 'Equal To');
                                                        $DropDown = $obj->DropDown($data);
                                                        echo $DropDown;
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-xs-6 form-group">
                                                {!! Form::number('guest_allowed[]', null, array('class' => 'form-control',  'placeholder' => 'Guest Available', 'required' => 'required')) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Image</label>
                                        {!! Form::file('room_image', array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Room Description:</label>
                                    {!! Form::textarea('room_description[]', null, array('class' => 'form-control',  'placeholder' => 'Room Description', 'required' => 'required', 'rows' => '6')) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <button type="submit" class="btn btn-default">submit</button>
                                </div>
                            </div>    
                        </div>   
                    </form>
                </div>
            </div>
        </div>  
    </section>
	
@endsection
@section('script')
<!--page level script-->
@endsection