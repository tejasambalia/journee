@extends('user.layouts.master')
@section('title','Search Result')
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
<section class="best_offers_sec">
            <div class="container">
                <div class="row">
                    
                    
                    
                    <div class="col-md-8">
                        <div class="topbar_filter">
                        <div class="row">
                            <div class="col-md-8">
                                <h1 class="title">Packages Listing</h1>
                            </div>
                            <div class="col-md-4">
                                <form class="">
                                    <div class="text-right">
                                        <p class="packages_found">6 Results Found</p>
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
                                    if(count($search_details)>0){
                                    foreach($search_details as $row){
                                @endphp
                                    <div class="col-md-6 package_box eq_height">
                                        <div class="package_main_box">
                                            <div class="package_img">
                                                <a href='{{url("/packagedetails/$row->id")}}'> <img src="https://placeimg.com/200/200/any" height="200" width="200" class="img-responsive wid100"></a>
                                            </div>
                                            <div class="package_details">
                                                <a href='{{url("/packagedetails/$row->id")}}'><h3 class="package_name">{{$row->name}}</h3></a>
                                                <ul class="list-inline package_features">
                                                    <li><p class="package_duration">{{$row->days}} {{($row->days==1)?'Day':'Days'}} and {{$row->nights}} {{($row->nights==1)?'Night':'Nights'}}</p></li>
                                                    <li><p class="package_sharing">Per Person Twin Sharing</p></li>
                                                </ul>
                                                <ul class="package_pricing list-inline">
                                                    <li><p class="package_price">Starting From: <span>Rs. {{$row->price}}</span></p></li>
                                                    <li><p class="package_discount">5% off</p></li>
                                                </ul>
                                                <ul class="list-inline package_hotel_include">
                                                    <li><p class="package_hotel">Hotel Included:</p></li>                                                    
                                                    <!--<li><i class="ion-checkmark-circled active"></i> 5 star</li>-->
                                                    <li>{{$row->type}}</li>                                                    
                                                </ul>
                                                
                                                <ul class="list-inline package_inclusions">
                                                    <li class="active"><i class="icon ion-fork"></i><span>Meals</span></li>
                                                    <li><i class="icon ion-plane"></i><span>Flights</span></li>
                                                    <li><i class="icon ion-android-bus"></i><span>Airport</span></li>
                                                    <li class="active"><i class="icon ion-ios-glasses"></i><span>Sightseeing</span></li>
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
        </script>>
@endsection
