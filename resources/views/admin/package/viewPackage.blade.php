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

$package_data = Package::findById($id);
$package_hotel = PackageHotel::getPackageHotel($id);
?>
<section class="package-page">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title space-bot-0">View {!! $package_data->name !!}</h1>
            </div>
            <div class="col-md-6 text-right">
                <a href="edit-package.php" class="btn btn-default table-top-btn"><i class="ion-plus-round"></i> edit Package</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <form class="basic-form">
                    <div class="hotel_details">
                        <div class="row">
                            <div class="col-sm-3 form-group">
                                <label>Name:</label>
                                <p>{!! $package_data->name !!}</p>
                            </div>
                            <div class="col-sm-3 form-group">
                                <label>Price:</label>
                                <p>Rs. {!! $package_data->price !!}</p>
                            </div>
                            <div class="col-sm-3 form-group">
                                <label>Category:</label>
                                <p>{!! PackageCategory::getSingleColumnData($package_data->category, 'name') !!}</p>
                            </div>
                            <div class="col-sm-3 form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label>Days:</label>
                                        <p>{!! $package_data->days !!}</p>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Nights:</label>
                                        <p>{!! $package_data->nights !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>            
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>City:</label>
                                <p>{!! City::getSingleColumnData($package_data->city, 'name') !!}</p>
                            </div>
                            <!-- <div class="col-sm-4 form-group">
                                <label>Availability:</label>
                                <p></p>
                            </div> -->
                            <div class="col-sm-4">
                                <label>Upload Image:</label>
                                <p><a href="{!! $package_data->upload_image !!}">{!! $package_data->upload_image !!}</a></p>
                            </div>
                        </div>              
                        <div class="row">
                            <div class="col-sm-3 form-group">
                                <label>Coupon:</label>
                                <p>{!! Coupon::getSingleColumnData($package_data->coupon_id, 'name') !!} ({!!Coupon::getSingleColumnData($package_data->coupon_id, 'code') !!})</p>
                            </div> 
                            <div class="col-sm-3 form-group">
                                <label>Discount Type:</label>
                                <p><?php
                                	$obj = new DiscountType;
                                	echo $obj->name($package_data->discount_type);
                                ?></p>
                            </div> 
                            <div class="col-sm-3 form-group">
                                <label>Discount Amount:</label>
                                <p>Rs. {!! $package_data->discount_amount !!}</p>
                            </div> 
                            <!-- <div class="col-sm-3 form-group">
                                <label>Discount Price:</label>
                                <p>Rs. 11000</p>
                            </div>  -->
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Package Description:</label>
                                <p>{!! $package_data->description !!}</p>
                            </div>
                        </div>
                    </div>
                    <div  id="hotel_selection">
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
                                @foreach($package_hotel as $p_hotel)
                                	<p>{!! Hotel::getSingleColumnData($p_hotel->hotel_id, 'name') !!}</p>
                                @endforeach
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Select Room:</label>
                                @foreach($package_hotel as $p_hotel)
                                	<?php $package_room = PackageRoom::getPackageRoom($p_hotel->id); ?>
                                	@foreach($package_room as $p_room)
                                		<p>{!! Room::getSingleColumnData($p_room->room_id, 'name') !!}</p>
                                	@endforeach
                                @endforeach
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