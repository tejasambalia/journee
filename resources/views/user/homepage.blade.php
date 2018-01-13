@extends('user.layouts.master')
@section('title','Home | Travel')
@section('style')
<!--page level style-->
@endsection
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

<?
//best offers
$best_offer_data = DB::table('package')
    ->select('id', 'name', 'discount_type', 'discount_amount', 'upload_image')
    ->where([
        ['package_section', '=', '2'],
        ['active', '=', '1']
    ])
    ->orderBy('id', 'desc')
    ->limit(3)
    ->get();
//new added packages
$new_data = DB::table('package')
    ->select('id', 'name', 'discount_type', 'discount_amount', 'upload_image')
    ->where([
        ['package_section', '<>', '2'],
        ['active', '=', '1']
    ])
    ->orderBy('id', 'desc')
    ->limit(3)
    ->get();
?>
<!--page content-->
 <section class="home-banner">
            <div class="view_table">
                <div class="view_cell">                    
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="search_filter">
                                    <h1>Find an exceptional hotel <br> & enjoy great benefits</h1> 
                                    {!! Form::open(array('url' => '/search','class'=>'modal_form')) !!}                                       
                                         <ul class="list-inline home_search_panel"> 
                                            <li> 
                                                <div class="form-group"> 
                                                    <input type="search" class="form-control" name="search_text" placeholder="Where do you want to go?" name=""> 
                                                </div> 
                                            </li> 
                                            <li> 
                                                <div class="form-group datepicker_bg"> 
                                                    <input type="text" class="form-control" id="from_date" name='from_date' placeholder="Check In" name=""> 
                                                </div> 
                                            </li> 
                                            <li>                                                 
                                                <div class="form-group datepicker_bg"> 
                                                    <input type="text" class="form-control" id="to_date" name='to_date' placeholder="Depart" name=""> 
                                                </div>    
                                            </li> 
                                            <li> 
                                                <div class="form-group"> 
                                                    <button type="submit" class="btn btn-default wid100">Search</button> 
                                                </div> 
                                            </li> 
                                        </ul> 
                                        <p>Want package customized just for you? <a href="#quote_modal"  data-toggle="modal" data-target="#quote_modal">Click here!</a></p> 
                                    {!! Form::close() !!}               
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </section>

        <!-- <section class="features_sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="feature_box">
                            <h3 class="main_title">Lorem Ipsum Donor</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature_box">
                            <h3 class="main_title">Lorem Ipsum Donor</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature_box">
                            <h3 class="main_title">Lorem Ipsum Donor</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <section class="best_offers_sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="main_title text-center">Best Offers</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($best_offer_data as $data)
                    <div class="col-sm-4">
                        <div class="offer_box">
                            <div class="offer_img">
                                <img src="{{ url($data->upload_image) }}" class="img-responsive wid100">
                                <div class="offer_discount">
                                    <span>-{{ $data->discount_amount }}{{ ($data->discount_type==1)?"Rs":"%" }}</span>
                                    <a href="/packagedetails/{{ $data->id }}" class="btn btn-default">book</a>
                                </div>
                            </div>
                            <div class="offer_details">
                                <h3>{{$data->name}}</h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a href="{{ url('/package') }}" class="btn btn-default space30">find all offers</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- <section class="top_destinations_sec">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="dest_box">
                            <img src="https://placeimg.com/360/200/nature" class="img-responsive wid100">
                            <div class="dest_details">
                                <h4>Lorem</h4>
                                <p>
                                    ipsum
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="dest_box">
                            <img src="https://placeimg.com/360/200/people" class="img-responsive wid100">
                            <div class="dest_details">
                                <h4>Lorem</h4>
                                <p>
                                    ipsum
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="dest_box">
                            <img src="https://placeimg.com/360/200/any" class="img-responsive wid100">
                            <div class="dest_details">
                                <h4>Lorem</h4>
                                <p>
                                    ipsum
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="dest_box">
                            <img src="https://placeimg.com/360/200/tech" class="img-responsive wid100">
                            <div class="dest_details">
                                <h4>Lorem</h4>
                                <p>
                                    ipsum
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="dest_box">
                            <img src="https://placeimg.com/360/200/people" class="img-responsive wid100">
                            <div class="dest_details">
                                <h4>Lorem</h4>
                                <p>
                                    ipsum
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="dest_name_box">
                            <h2 class="main_title">top destinations</h2>
                            <a href="#" class="btn btn-default">all destinations</a>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="dest_box">
                            <img src="https://placeimg.com/360/200/any" class="img-responsive wid100">
                            <div class="dest_details">
                                <h4>Lorem</h4>
                                <p>
                                    ipsum
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="dest_box">
                            <img src="https://placeimg.com/360/200/arch" class="img-responsive wid100">
                            <div class="dest_details">
                                <h4>Lorem</h4>
                                <p>
                                    ipsum
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="dest_box">
                            <img src="https://placeimg.com/360/200/nature" class="img-responsive wid100">
                            <div class="dest_details">
                                <h4>Lorem</h4>
                                <p>
                                    ipsum
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="dest_box">
                            <img src="https://placeimg.com/360/200/people" class="img-responsive wid100">
                            <div class="dest_details">
                                <h4>Lorem</h4>
                                <p>
                                    ipsum
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="dest_box">
                            <img src="https://placeimg.com/360/200/tech" class="img-responsive wid100">
                            <div class="dest_details">
                                <h4>Lorem</h4>
                                <p>
                                    ipsum
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <section class="discover_esc_sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="main_title text-center">discover the great escapes</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($new_data as $data)
                    <div class="col-sm-4">
                        <div class="discover_box">
                            <img src="{{ url($data->upload_image) }}" class="img-responsive wid100">
                            <h3>{{ $data->name }}</h3>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a href="{{ url('/package') }}" class="btn btn-default space30">discover all</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- <section class="hotels_selcted_sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="main_title text-center">
                            Discover new hotels of our selection
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="hotel_box">
                                    <img src="https://placeimg.com/400/400/people" class="img-responsive center-block wid100">
                                    <div class="hotel_details">
                                        <h3 class="">Lorem Ipsum</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                        </p>
                                        <a href="#" class="btn btn-default space20">book now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="hotel_box">
                                    <img src="https://placeimg.com/400/400/nature" class="img-responsive center-block wid100">
                                    <div class="hotel_details">
                                        <h3 class="">Lorem Ipsum</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                        </p>
                                        <a href="#" class="btn btn-default space20">book now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="hotel_box">
                                    <img src="https://placeimg.com/400/400/people" class="img-responsive center-block wid100">
                                    <div class="hotel_details">
                                        <h3 class="">Lorem Ipsum</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                        </p>
                                        <a href="#" class="btn btn-default space20">book now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="hotel_box">
                                    <img src="https://placeimg.com/400/400/nature" class="img-responsive center-block wid100">
                                    <div class="hotel_details">
                                        <h3 class="">Lorem Ipsum</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                        </p>
                                        <a href="#" class="btn btn-default space20">book now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="hotel_box">
                                    <img src="https://placeimg.com/400/400/people" class="img-responsive center-block wid100">
                                    <div class="hotel_details">
                                        <h3 class="">Lorem Ipsum</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                        </p>
                                        <a href="#" class="btn btn-default space20">book now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="hotel_box">
                                    <img src="https://placeimg.com/400/400/nature" class="img-responsive center-block wid100">
                                    <div class="hotel_details">
                                        <h3 class="">Lorem Ipsum</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                        </p>
                                        <a href="#" class="btn btn-default space20">book now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
@endsection
@section('script')
<!--page level script-->
<script>
$( function() {
                var dateFormat = "mm/dd/yy",
                  from = $( "#from_date" )
                    .datepicker({
                      defaultDate: "+1w",
                      changeMonth: true,
                      numberOfMonths: 1
                    })
                    .on( "change", function() {
                      to.datepicker( "option", "minDate", getDate( this ) );
                    }),
                  to = $( "#to_date" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1
                  })
                  .on( "change", function() {
                    from.datepicker( "option", "maxDate", getDate( this ) );
                  });
             
                function getDate( element ) {
                      var date;
                      try {
                        date = $.datepicker.parseDate( dateFormat, element.value );
                      } catch( error ) {
                        date = null;
                      }
                 
                      return date;
                }
            });
</script>
@endsection
