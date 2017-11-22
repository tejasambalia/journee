@extends('admin.layouts.master')
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
use App\AdminModels\RoomOption;
use App\Classes\GuestAllowedCondition;
use App\Classes\DropDown;
$hotel_data = Hotel::findById($id);
$room_data = Room::getByHotelId($hotel_data->id);
?>

<section class="package-page">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title space-bot-0">Edit {!! $hotel_data->name !!}</h1>
            </div>
            <div class="col-md-6 text-right">
                <a href="" class="btn btn-default table-top-btn"><i class="ion-plus-round"></i> add hotel</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(array('url' => '/admin/handleEditHotel', 'class' => 'basic-form', 'method' => 'post')) !!}
                    <input type="hidden" name="hotel_id" value="{!! $hotel_data->id !!}">
                    <div class="hotel_details">
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Name:</label>
                                {!! Form::text('name', $hotel_data->name, array('class' => 'form-control',  'placeholder' => 'Hotel Name', 'required' => 'required')) !!}
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Type:</label>
                                <?php
                                    $data = array(
                                        '5 Start' => '5 Start',
                                        '3 Start' => '3 Start'
                                        );
                                ?>
                                <select class="form-control" name="type">
                                <?php
                                    $obj = new DropDown;
                                    $DropDown = $obj->DropDown($data, $hotel_data->type);
                                    echo $DropDown;
                                ?>
                                </select>
                            </div>
                        </div>            
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>State:</label>
                                <select class="form-control" name="state_id">
                                <?php
                                    $stateData = State::get();
                                    $obj = new DropDown;
                                    echo $StateDropDown = $obj->ObjDropDown($stateData, $hotel_data->state_id);
                                ?>
                                </select>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>City:</label>
                                <select class="form-control" name="city_id">
                                <?php
                                    $cityData = City::get();
                                    $obj = new DropDown;
                                    echo $StateDropDown = $obj->ObjDropDown($cityData, $hotel_data->city_id);
                                ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label>Upload Image:</label>
                                {!! Form::file('hotel_image_path', array('class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="hotel_room_details" id="hotel_rooms_add">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-inline">
                                    <li><h3 class="sub_title">Hotel's Room</h3></li>
                                    <li><a href="#" class="btn btn-default btn-bordered"><i class="ion-plus-round"></i> Add Room</a></li>
                                </ul>                                        
                            </div>
                        </div>
                        <?php
                        foreach ($room_data as $r_data) {
                        ?>
                        <input type="hidden" name="room_id[]" value="{!! $r_data->id !!}">
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Room Name:</label>
                                {!! Form::text('room_name[]', $r_data->name, array('class' => 'form-control',  'placeholder' => 'Room Name', 'required' => 'required')) !!}
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Room Type:</label>
                                <select class="form-control" name="m_room_type_id[]">
                                <?php
                                    $data = RoomType::get();
                                    $DropDown = $obj->ObjDropDown($data, $r_data->m_room_type_id);
                                    echo $DropDown;
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Rooms Available:</label>
                                {!! Form::number('total_available[]', $r_data->total_available, array('class' => 'form-control',  'placeholder' => 'Total Available', 'required' => 'required')) !!}
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Affiliates:</label>
                                <?
                                $room_option = RoomOption::getOptionByRoomId($r_data->id);
                                $seprator = "";
                                $room_options = "";
                                foreach ($room_option as $r_option) {
                                    $room_options .= $seprator.$r_option->option_id;
                                    $seprator = ",";
                                }
                                ?>
                                {!! Form::text('option[]', $room_options, array('class' => 'form-control',  'placeholder' => 'Affiliates', 'data-role' => 'tagsinput')) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Guests Allowed:</label>
                                    <div class="row">
                                        <div class="col-xs-6 form-group">
                                        <?
                                        $data = array('More Than', 'Less Than', 'Equal To');
                                        ?>
                                            <select class="form-control" name="guest_condition[]">
                                            <?
                                                $DropDown = $obj->DropDown($data, $r_data->guest_condition);
                                                echo $DropDown;
                                            ?>
                                            </select>
                                        </div>
                                        <div class="col-xs-6 form-group">
                                            {!! Form::number('guest_allowed[]', $r_data->guest_allowed, array('class' => 'form-control',  'placeholder' => 'Guest Available', 'required' => 'required')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Upload Image</label>
                                    {!! Form::file('room_image[]', array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Room Description:</label>
                                {!! Form::textarea('room_description[]', $r_data->description, array('class' => 'form-control',  'placeholder' => 'Room Description', 'required' => 'required', 'rows' => '6')) !!}
                            </div>
                        </div>
                        <hr>
                        <?php
                        }
                        ?>
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