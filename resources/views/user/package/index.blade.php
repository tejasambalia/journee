@extends('user.layouts.master')
@section('title','Packages | Travel')
@section('style')
<!--page level style-->
@endsection
<!--page content-->
@php
use App\Classes\DiscountType;
use App\AdminModels\Hotel;
use App\AdminModels\Room;
use App\AdminModels\PackageHotel;
use App\AdminModels\PackageRoom;
use App\AdminModels\RoomType;
@endphp
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
<section class="best_offers_sec">
            <div class="container">
                <div class="row">
                    
                    @include ('user.package.filter');
                    
                    <div class="col-md-8">
                        <div class="topbar_filter">
                        <div class="row">
                            <div class="col-md-8">
                                <h1 class="title">Packages Listing</h1>
                            </div>
                            <div class="col-md-4">
                                <form class="">
                                    <div class="text-right">
                                        <p class="packages_found">{{count($package_details)}} Results Found</p>
                                        <select class="form-control">
                                            <option>Relavant</option>
                                            <option>Popular</option>
                                            <option>Price High</option>
                                            <option>Price Low</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                        <div class="package_wrapper">
                            <div class="row">
                                @php
                                    if(count($package_details)>0){
                                    foreach($package_details as $row){
                                    $hotel_id = PackageHotel::getPackageFirstHotel($row->id);
                                    $hotel_type = Hotel::getSingleColumnData($hotel_id->hotel_id, 'type');

                                    $room_id = PackageRoom::getPackageFirstRoom($hotel_id->id);
                                    $room_type_id = Room::getSingleColumnData($room_id->room_id, 'm_room_type_id');
                                    $room_type = RoomType::getSingleColumnData($room_type_id, 'name');
                                @endphp
                                    <div class="col-md-6 package_box">
                                        <div class="package_main_box">
                                            <div class="package_img">
                                                <a href='{{url("/packagedetails/$row->id")}}'> <img src='{{url("$row->upload_image")}}' height="200" width="200" class="img-responsive wid100"></a>
                                            </div>
                                            <div class="package_details">
                                                <a href='{{url("/packagedetails/$row->id")}}'><h3 class="package_name">{{$row->name}}</h3></a>
                                                <ul class="list-inline package_features">
                                                    <li><p class="package_duration">{{$row->days}} {{($row->days==1)?'Day':'Days'}} and {{$row->nights}} {{($row->nights==1)?'Night':'Nights'}}</p></li>
                                                    <li><p class="package_sharing">{{$room_type}}</p></li>
                                                </ul>
                                                <ul class="package_pricing list-inline">
                                                    <li><p class="package_price">Starting From: <span>Rs. {{$row->price}}</span></p></li>
                                                    @php
                                                    $obj = new DiscountType;
                                                    @endphp
                                                    <li><p class="package_discount">{{$row->discount_amount." ".$obj->name($row->discount_type)}} off</p></li>
                                                </ul>
                                                <ul class="list-inline package_hotel_include">
                                                    <li><p class="package_hotel">Hotel Included:</p></li>
                                                    <li><i class="ion-checkmark-circled active"></i> {{$hotel_type}}</li>
                                                </ul>
                                                <div class="package_btn text-center">
                                                    <a href='{{url("/packagedetails/$row->id")}}' class="btn btn-default">View Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @php
                                    } 
                                    }
                                @endphp
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
@section('script')
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function(){
                $( "#slider-range" ).slider({
                    range: true,
                    min: 0,
                    max: 100000,
                    values: [ 20000, 50000 ],
                    slide: function( event, ui ) {
                        $( "#amount" ).val( "Rs. " + ui.values[ 0 ] + " - Rs. " + ui.values[ 1 ] );
                    }
                });
                $("#amount").val( "Rs. " + $( "#slider-range" ).slider( "values", 0 ) + "  -  Rs. " + $( "#slider-range" ).slider( "values", 1 ) );
            });
        </script>
@endsection
