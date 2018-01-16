@extends('admin.layouts.master')
@section('title','Admin Login')
@section('style')
<!--page level style-->
@endsection
<!--page content-->
@section('content')
<?php
use App\AdminModels\Package;
use App\AdminModels\Hotel;
use App\AdminModels\Room;
use App\AdminModels\PackageHotel;
use App\AdminModels\PackageRoom;
use App\AdminModels\RoomType;
use App\AdminModels\State;
use App\AdminModels\City;
use App\AdminModels\RoomOption;
use App\Classes\GuestAllowedCondition;
use App\Classes\DiscountType;
use App\AdminModels\PackageCategory;
use App\AdminModels\Coupon;
use App\Classes\DropDown;
use App\Classes\Zone;
use App\AdminModels\PackageSection;

$package_data = Package::findById($id);
$package_hotel = PackageHotel::getPackageHotel($id);
$packageCategory = PackageCategory::get();
$city = City::get();
$coupon = Coupon::getActive();
$hotels = Hotel::getDropDownData();
?>
<section class="package-page">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title space-bot-0">Edit {!! $package_data->name !!}</h1>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ url('/admin/addPackage') }}" class="btn btn-default table-top-btn"><i class="ion-plus-round"></i> add Package</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(array('url' => '/admin/handleEditPackage', 'class' => 'basic-form', 'method' => 'post', 'enctype' => "multipart/form-data")) !!}
                    <div class="hotel_details">
                        <div class="row">
                            <input type="hidden" name="id" value="{!! $package_data->id !!}">
                            <div class="col-sm-3 form-group">
                                <label>Name:</label>
                                <input type="text" class="form-control" placeholder="" name="name" value="{!! $package_data->name !!}" required="required">
                            </div>
                            <div class="col-sm-3 form-group">
                                <label>Price:</label>
                                <input type="number" min="0" class="form-control" placeholder="" name="price" value="{!! $package_data->price !!}" required="required">
                            </div>
                            <div class="col-sm-3 form-group">
                                <label>Category:</label>
                                <select class="form-control" name='category' required="required">
                                    <?php
                                    $obj = new DropDown;
                                    $DropDown = $obj->ObjDropDown($packageCategory, $package_data->category);
                                    echo $DropDown;
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-xs-6 form-group">
                                        <label>Days:</label>
                                        <input type="number" min="0" class="form-control" name="days" value="{!! $package_data->days !!}" required="required">
                                    </div>
                                    <div class="col-xs-6 form-group">
                                        <label>Nights:</label>
                                        <input type="number" min="0" class="form-control" name="nights" value="{!! $package_data->nights !!}" required="required">
                                    </div>
                                </div>
                            </div>
                        </div>            
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>City:</label>
                                <select class="form-control" name="city" required="required">
                                    <?php
                                    $obj = new DropDown;
                                    $DropDown = $obj->ObjDropDown($city, $package_data->city);
                                    echo $DropDown;
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Availability:</label>
                                <div id="availability" class="date_range_picker" class="pull-right">
                                    <i class="ion-calendar"></i> <span></span> <i class="ion-arrow-down-b pull-right" aria-hidden="true"></i>
                                </div>
                                <input type="hidden" id="available_start_date" name="available_start_date" required="required">
                                <input type="hidden" id="available_end_date" name="available_end_date" required="required">
                            </div>
                            <div class="col-sm-4">
                                <label>Upload Image:</label>
                                <input type="file" class="form-control" name="upload_image">
                            </div>
                        </div>              
                        <div class="row">
                            <div class="col-sm-3 form-group">
                                <label>Coupon:</label>
                                <select class="form-control" name="coupon_id">
                                    <?php
                                        $obj = new DropDown;
                                        $DropDown = $obj->ObjDropDown($coupon, $package_data->coupon_id);
                                        echo $DropDown;
                                    ?>
                                </select>
                            </div> 
                            <div class="col-sm-3 form-group">
                                <label>Discount Type:</label>
                                <select class="form-control" name="discount_type">
                                    <?php
                                        $data = array('1'=>'%','2'=> 'Flat');
                                        $DropDown = $obj->DropDown($data, $package_data->discount_type);
                                        echo $DropDown;
                                    ?>
                                </select>
                            </div> 
                            <div class="col-sm-3 form-group">
                                <label>Discount Amount:</label>
                                <input type="number" class="form-control" min="0" name="discount_amount" value="{!! $package_data->discount_amount !!}">
                            </div>
                            <div class="col-sm-3 form-group">
                                <label>Zone:</label>
                                <select class="form-control" name="zone" required="required">
                                    <?php
                                        $zone_obj = new Zone;
                                        $zone_data = $zone_obj->name();
                                        $DropDown = $obj->DropDown($zone_data, $package_data->zone);
                                        echo $DropDown;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 form-group">
                                <label>Package Section:</label>
                                <select class="form-control" name="package_section" required="required">
                                    <?php
                                        $package_section = PackageSection::get();
                                        $DropDown = $obj->ObjDropDown($package_section, $package_data->package_section);
                                        echo $DropDown;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Package Description:</label>
                                <textarea class="ckeditor form-control" id="editor1" name="description" required="required">{!! $package_data->description !!}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Inclusions:</label>
                                <textarea class="ckeditor form-control" id="editor_inclusions" name="inclusions" required="required">{!! $package_data->inclusions !!}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Exclusions:</label>
                                <textarea class="ckeditor form-control" id="editor_exclusions" name="exclusions" required="required">{!! $package_data->exclusions !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" data-target="#hotel_selection" data-toggle="collapse" class="btn btn-default">Continue</button>
                        </div>
                    </div>  
                    <div class="collapse" id="hotel_selection">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-inline">
                                    <li><h3 class="sub_title">Hotel's Selection</h3></li>
                                </ul>                                        
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Select Hotel:</label>
                                @if(count($package_hotel)>0)
                                <input type="hidden" name="hotel_id" value="{!! $package_hotel[0]->id !!}">
                                <select class="form-control" name="package_hotel" id="hotel_id" onchange="get_hotel_rooms()" required="required">
                                    @foreach($package_hotel as $p_hotel)
                                    <?php
                                        $DropDown = $obj->ObjDropDown($hotels, $p_hotel->hotel_id);
                                        echo $DropDown;
                                    ?>
                                    @endforeach
                                </select>
                                @else
                                <input type="hidden" name="hotel_id" value="">
                                <select class="form-control" name="package_hotel" id="hotel_id" onchange="
                                    get_hotel_rooms()" required="required">
                                    <?php
                                        $DropDown = $obj->ObjDropDown($hotels);
                                        echo $DropDown;
                                    ?>
                                </select>
                                @endif
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Select Room:</label>
                                <select class="form-control" id="display_room" name="package_room" required="required">
                                    @foreach($package_hotel as $p_hotel)
                                        <?php
                                            $rooms = Room::getDropDownData($p_hotel->hotel_id);
                                            $package_room = PackageRoom::getPackageRoom($p_hotel->id);
                                        ?>
                                        @foreach($package_room as $p_room)
                                            <?php
                                                $DropDown = $obj->ObjDropDown($rooms, $p_room->room_id);
                                                echo $DropDown;
                                            ?>
                                        @endforeach
                                    @endforeach
                                </select>
                                @if(isset($package_room))
                                <input type="hidden" name="room_id" value="{!! $package_room[0]->id !!}">
                                @else
                                <input type="hidden" name="room_id" value="">
                                @endif
                            </div>
                            <div class="submit_btn_block">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-default">Save Package</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </form>
            </div>
        </div>
    </div>  
</section>
<script type="text/javascript">
    function get_hotel_rooms(){
        var hotel_id = $('#hotel_id').val();

        $.ajax({
            type: "GET",
            url: "/admin/fetchroom",
            data: {hotel_id:hotel_id},
            success: function(msg) {  
                $("#display_room").html(msg);
            }
        });
    }
</script>
@endsection
@section('script')
<!--page level script-->
@endsection