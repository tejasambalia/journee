@extends('Admin.layouts.master')
@section('title','Admin Login')
@section('style')
<!--page level style-->
@endsection
<!--page content-->
@section('content')
<?php
use App\AdminModels\Hotel;
use App\AdminModels\Room;
use App\AdminModels\RoomType;
use App\AdminModels\State;
use App\AdminModels\City;
use App\AdminModels\roomOption;
use App\Classes\GuestAllowedCondition;
$hotel_data = Hotel::findById($id);
$room_data = Room::getByHotelId($hotel_data->id);
?>
<section class="package-page">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title space-bot-0">View {!! $hotel_data->name !!}</h1>
            </div>
            <div class="col-md-6 text-right">
                <a href="" class="btn btn-default table-top-btn">Edit hotel</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <form class="basic-form">
                    <div class="hotel_details">
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Name:</label>
                                <p>{!! $hotel_data->name !!}</p>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Type:</label>
                                <p>{!! $hotel_data->type !!}</p>
                            </div>
                        </div>            
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>State:</label>
                                <p>{!! State::getSingleColumnData($hotel_data->state_id,'name') !!}</p>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>City:</label>
                                <p>{!! City::getSingleColumnData($hotel_data->city_id,'name') !!}</p>
                            </div>
                            <div class="col-sm-4">
                                <label>Upload Image:</label>
                                <p> <a href="{!! $hotel_data->hotel_image_path !!}">{!! $hotel_data->hotel_image_path !!}</a></p>
                            </div>
                        </div>   
                    </div>
                    <div class="hotel_room_details">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-inline">
                                    <li><h3 class="sub_title">Hotel's Room</h3></li>
                                </ul>                                        
                            </div>
                        </div>
                        <?php
                        foreach ($room_data as $r_data) {
                        ?>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Room Name:</label>
                                <p>{!! $r_data->name !!}</p>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Room Type:</label>
                                <p>{!! RoomType::getSingleColumnData($r_data->m_room_type_id,'name') !!}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Rooms Available:</label>
                                <p>{!! $r_data->total_available !!}</p>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Affiliates:</label>
                                <?php
                                $room_option = RoomOption::getOptionByRoomId($r_data->id);
                                $seprator = "";
                                $room_options = "";
                                foreach ($room_option as $r_option) {
                                	$room_options .= $seprator.$r_option->option_id;
                                	$seprator = ",";
                                }
                                ?>
                                <p>{!! $room_options !!}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Guests Allowed:</label>
                                    <p>
                                    <?php
                                    	$obj = new GuestAllowedCondition();
                                    	echo $obj->displayFormat($r_data->guest_condition, $r_data->guest_allowed);
                                    ?>
                                	</p>
                                </div>
                                <div class="form-group">
                                    <label>Upload Image</label>
                                    <p><a href="{!! $r_data->room_image !!}">image url comes here</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Room Description:</label>
                                <p>{!! $r_data->description !!}</p>
                            </div>
                        </div>
                        <hr>
                        <?php
                    	}
                        ?>   
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