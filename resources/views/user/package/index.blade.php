@extends('user.layouts.master')
@section('title','Packages | Travel')
@section('style')
<!--page level style-->
<script>
function package_filter(){
               /* $.ajax({
                    url: "package_filter",
                    success: function(result){
                        $("#div1").html(result);
                    }});
                }*/
        var zones = new Array();
        $.each($("input[name='zone[]']:checked"), function() {
          zones.push("'"+$(this).val()+"'");
        });
        //amount
        var min_amount=$('#min_amount').val();
        var max_amount=$('#max_amount').val();
        //duration
        var min_days=$('#min_days').val();
        var max_days=$('#max_days').val();
        $.ajax({
                type: "POST",
                url: "package_filter", // 
                data: {"_token": $('#token').val(),zones:zones.join(','),min_amount:min_amount,max_amount:max_amount,min_days:min_days,max_days:max_days},
                success: function(msg){
                    //alert(msg)
                    $('#filter_package_details').html(msg);
                },
                error: function(){
                    alert("failure");
                }
        });
        
    }
</script>
@endsection
<!--page content-->
@php
use App\Classes\DiscountType;
use App\AdminModels\Hotel;
use App\AdminModels\Room;
use App\AdminModels\PackageHotel;
use App\AdminModels\PackageRoom;
use App\AdminModels\RoomType;
use App\AdminModels\Package;
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
                    
                    @include ('user.package.filter')
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <div class="col-md-8">
                        <div class="topbar_filter">
                        <div class="row">
                            <div class="col-md-8">
                                <h1 class="title">Packages Listing</h1>
                            </div>
                            <div class="col-md-4">
                                <form class="">
                                    <div class="text-right">                                        
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
                            <div id="filter_package_details">
                                <p class="packages_found" div="result_found">{{count($package_details)}} Results Found</p>
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
            </div>
        </section>
@endsection
@section('script')
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function(){
                $( "#slider-range" ).slider({
                    range: true,
                    min: <?= Package::getminprice()?>,
                    max: <?= Package::getmaxprice()?>,
                    values: [ 1000, 80000 ],
                    slide: function( event, ui ) {
                        $( "#min_amount" ).val(ui.values[ 0 ]);
                        $( "#max_amount" ).val(ui.values[ 1 ]);                        
                        package_filter();
                        $( "#amount" ).val( "Rs. " + ui.values[ 0 ] + " - Rs. " + ui.values[ 1 ] );
                    }
                });
                $("#amount").val( "Rs. " + $( "#slider-range" ).slider( "values", 0 ) + "  -  Rs. " + $( "#slider-range" ).slider( "values", 1 ) );
                $( "#min_amount" ).val($( "#slider-range" ).slider( "values", 0 ));
                $( "#max_amount" ).val($( "#slider-range" ).slider( "values", 1 ) );                        
            });
        </script>
        <script>
            $(function(){
                $( "#slider-duration" ).slider({
                    range: true,
                    min: <?= Package::getmindays()?>,
                    max: <?= Package::getmaxdays()?>,
                    values: [ 1, 30 ],
                    slide: function( event, ui ) {
                        $( "#min_days" ).val(ui.values[ 0 ]);
                        $( "#max_days" ).val(ui.values[ 1 ]);                        
                        package_filter();
                        
                        $( "#duration" ).val(ui.values[ 0 ] + " days - " + ui.values[ 1 ] + " days" );
                    }
                });
                $("#duration").val($( "#slider-duration" ).slider( "values", 0 ) + " days - " + $( "#slider-duration" ).slider( "values", 1 ) + " days");
                $( "#min_days" ).val($( "#slider-duration" ).slider( "values", 0 ));
                $( "#max_days" ).val($( "#slider-duration" ).slider( "values", 1 ) );                        
            });
        </script>        
        <script>
            $('#filter_reset').click(function() {
                     location.reload();
            });
        </script>    
@endsection
