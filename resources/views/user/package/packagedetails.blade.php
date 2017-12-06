@extends('user.layouts.master')
@section('title','Package Description | Travel')
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
@php
use App\AdminModels\City;
@endphp
 <section class="best_offers_sec">
            <div class="container">
                <div class="package_desc_wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="package_img">
                                        <img src="https://placeimg.com/400/300/any" class="img-responsive wid100">
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="package_details">
                                        <h3 class="detail_name">{{$package_details->name}} <span>{{($package_details->days==1)?'Day':'Days'}} and {{$package_details->nights}} {{($package_details->nights==1)?'Night':'Nights'}} | Customizable</span></h3>                                       
                                        <ul class="list-inline package_hotel_include city_include">
                                            <li><p class="package_hotel">Cities:</p></li>
                                            <li>{{City::getSingleColumnData($package_details->id,'name')}}</li>
                                        </ul>
                                        <ul class="detail_package_pricing list-unstyled">
                                            <li><span class="startin_text">Starting From:</span> <span class="detail_price">Rs. {{$package_details->price}}</span> <span class="detail_discount">5% off</span> </li>
                                            <li class="per_person">Per person on twin sharing</li>
                                        </ul>
                                        <ul class="list-inline package_hotel_include">
                                            <li><p class="package_hotel">Hotel Included:</p></li>
                                            <!--<li><i class="ion-checkmark-circled active"></i> 5 star</li>-->
                                            @php
                                            foreach($Hotel_types as $row1){@endphp
                                            <li>{{$row1->type}}</li>
                                            @php }
                                            @endphp
                                        </ul> 
                                        <ul class="list-inline package_inclusions detail_package_inclusions">
                                            <li class="active"><i class="icon ion-fork"></i><span>Meals</span></li>
                                            <li><i class="icon ion-plane"></i><span>Flights</span></li>
                                            <li><i class="icon ion-android-bus"></i><span>Airport</span></li>
                                            <li class="active"><i class="icon ion-ios-glasses"></i><span>Sightseeing</span></li>
                                            <li class="active"><i class="icon ion-map"></i><span>City Tours</span></li>
                                            <li class="active"><i class="icon ion-compass"></i><span>Transfers</span></li>
                                        </ul>
                                        <div class="package_btn text-center">
                                            <a href="#inquiryModal"  data-toggle="modal" data-target="#inquiryModal" class="btn btn-default wid100">cuatomize and get quotes</a>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="package_desc_title">Package Description</h3>
                            <div class="package_content">
                                <p>
                                    {{$package_details->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="package_desc_title">Faq's</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel-group faq_accordian" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Collapsible Group Item #1
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingTwo">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Collapsible Group Item #2
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingThree">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    Collapsible Group Item #3
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                <div class="panel-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

        <script>
            $( function() {
                $('.datepicker').datepicker({
                });                    
            });
        </script>
@endsection
