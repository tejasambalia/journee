<!DOCTYPE html>
<html lang="en">
    <head>    
        <?php include "head.php"; ?>
        <title>Package Listing & Filters | Travel</title>
    </head>
    <body>
        <?php include "header.php"; ?>

        <section class="best_offers_sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 filter_wrapper_main">
                        <div class="filter_wrapper">
                            <h3>Filter By <a href="#" class="reset pull-right">Reset</a></h3>
                            <div class="panel-group filter_acc" id="filter-accordion">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" href="#collapse1">
                                                Price <i class="ion-ios-arrow-down pull-right"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <div id="slider-range"></div>
                                            <input type="text" id="amount" readonly class="range_input">
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" href="#collapse2">
                                                Category <i class="ion-ios-arrow-down pull-right"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse2" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_1" name="">
                                                        <label for="check_1">Adventure Tours</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_2" name="">
                                                        <label for="check_2">Family Tours</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_3" name="">
                                                        <label for="check_3">National Parks Tours</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_4" name="">
                                                        <label for="check_4">Religious Tours</label>
                                                    </div>
                                                </li>
                                            </ul>
                                            <a href="#" class="pull-right reset">Clear</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" href="#collapse3">
                                                Tour Destinations <i class="ion-ios-arrow-down pull-right"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse3" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_5" name="">
                                                        <label for="check_5">Mumbai</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_6" name="">
                                                        <label for="check_6">Puna</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_7" name="">
                                                        <label for="check_7">Manali</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_8" name="">
                                                        <label for="check_8">Goa</label>
                                                    </div>
                                                </li>
                                            </ul>
                                            <a href="#" class="pull-right reset">Clear</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" href="#collapse4">
                                                Duration (In Days) <i class="ion-ios-arrow-down pull-right"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse4" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_9" name="">
                                                        <label for="check_9">1 to 3</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_10" name="">
                                                        <label for="check_10">4 to 6</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_11" name="">
                                                        <label for="check_11">7 to 12</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_12" name="">
                                                        <label for="check_12">More than 12</label>
                                                    </div>
                                                </li>
                                            </ul>
                                            <a href="#" class="pull-right reset">Clear</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" href="#collapse5">
                                                Budget Per Person (In Rs.) <i class="ion-ios-arrow-down pull-right"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse5" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_13" name="">
                                                        <label for="check_13">Less than 10,000</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_14" name="">
                                                        <label for="check_14">10,000 - 20,000</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_15" name="">
                                                        <label for="check_15">20,000 to 40,000</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_16" name="">
                                                        <label for="check_16">40,000 to 60,000</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_17" name="">
                                                        <label for="check_17">Above 60,000</label>
                                                    </div>
                                                </li>
                                            </ul>
                                            <a href="#" class="pull-right reset">Clear</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" href="#collapse6">
                                                Hotel Star Rating <i class="ion-ios-arrow-down pull-right"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse6" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_18" name="">
                                                        <label for="check_18">
                                                            <ul class="list-inline star_rating">
                                                                <li class="ion-star active"></li>
                                                                <li class="ion-star active"></li>
                                                                <li class="ion-star active"></li>
                                                                <li class="ion-star active"></li>
                                                                <li class="ion-star active"></li>
                                                                <li>5 Star</li>
                                                            </ul>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_19" name="">
                                                        <label for="check_19">
                                                            <ul class="list-inline star_rating">
                                                                <li class="ion-star active"></li>
                                                                <li class="ion-star active"></li>
                                                                <li class="ion-star active"></li>
                                                                <li class="ion-star active"></li>
                                                                <li class="ion-star"></li>
                                                                <li>4 Star</li>
                                                            </ul>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_20" name="">
                                                        <label for="check_20">
                                                            <ul class="list-inline star_rating">
                                                                <li class="ion-star active"></li>
                                                                <li class="ion-star active"></li>
                                                                <li class="ion-star active"></li>
                                                                <li class="ion-star"></li>
                                                                <li class="ion-star"></li>
                                                                <li>3 Star</li>
                                                            </ul>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_21" name="">
                                                        <label for="check_21">
                                                            <ul class="list-inline star_rating">
                                                                <li class="ion-star active"></li>
                                                                <li class="ion-star active"></li>
                                                                <li class="ion-star"></li>
                                                                <li class="ion-star"></li>
                                                                <li class="ion-star"></li>
                                                                <li>2 Star</li>
                                                            </ul>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_22" name="">
                                                        <label for="check_22">
                                                            <ul class="list-inline star_rating">
                                                                <li class="ion-star active"></li>
                                                                <li class="ion-star"></li>
                                                                <li class="ion-star"></li>
                                                                <li class="ion-star"></li>
                                                                <li class="ion-star"></li>
                                                                <li>1 Star</li>
                                                            </ul>
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>
                                            <a href="#" class="pull-right reset">Clear</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" href="#collapse9">
                                                Inclusions <i class="ion-ios-arrow-down pull-right"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse9" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <ul class="list-unstyled inclusions_filter">
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_23" name="">
                                                        <label for="check_23"> <i class="icon ion-fork"></i> Meals</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_24" name="">
                                                        <label for="check_24"><i class="icon ion-model-s"></i> Cab</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_25" name="">
                                                        <label for="check_25"><i class="icon ion-plane"></i> Flights</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_26" name="">
                                                        <label for="check_26"><i class="icon ion-android-bus"></i> Shared Coach</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_27" name="">
                                                        <label for="check_27"><i class="icon ion-ios-glasses"></i> Sightseeing</label>
                                                    </div>
                                                </li>
                                            </ul>
                                            <a href="#" class="pull-right reset">Clear</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" href="#collapse10">
                                                Cities <i class="ion-ios-arrow-down pull-right"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse10" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <ul class="list-unstyled cities_filter">
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_28" name="">
                                                        <label for="check_28">Mumbai</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_29" name="">
                                                        <label for="check_29">Cab</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_30" name="">
                                                        <label for="check_30">Flights</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_31" name="">
                                                        <label for="check_31">Shared Coach</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="check_32" name="">
                                                        <label for="check_32">Sightseeing</label>
                                                    </div>
                                                </li>
                                            </ul>
                                            <a href="#" class="pull-right reset">Clear</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                <?php 
                                    for ($x = 0; $x <= 5; $x++) {
                                ?>
                                    <div class="col-md-6 package_box">
                                        <div class="package_main_box">
                                            <div class="package_img">
                                                <a href="packagedesc.php"> <img src="https://placeimg.com/200/200/any" height="200" width="200" class="img-responsive wid100"></a>
                                            </div>
                                            <div class="package_details">
                                                <a href="packagedesc.php"><h3 class="package_name">Lorem ipsum donor sit amet</h3></a>
                                                <ul class="list-inline package_features">
                                                    <li><p class="package_duration">6 Days and 5 Nights</p></li>
                                                    <li><p class="package_sharing">Per Person Twin Sharing</p></li>
                                                </ul>
                                                <ul class="package_pricing list-inline">
                                                    <li><p class="package_price">Starting From: <span>Rs. 15,000</span></p></li>
                                                    <li><p class="package_discount">5% off</p></li>
                                                </ul>
                                                <ul class="list-inline package_hotel_include">
                                                    <li><p class="package_hotel">Hotel Included:</p></li>
                                                    <li><i class="ion-checkmark-circled active"></i> 5 star</li>
                                                    <li>4 star</li>
                                                    <li>3 star</li>
                                                </ul>
                                                
                                                <ul class="list-inline package_inclusions">
                                                    <li class="active"><i class="icon ion-fork"></i><span>Meals</span></li>
                                                    <li><i class="icon ion-plane"></i><span>Flights</span></li>
                                                    <li><i class="icon ion-android-bus"></i><span>Airport</span></li>
                                                    <li class="active"><i class="icon ion-ios-glasses"></i><span>Sightseeing</span></li>
                                                </ul>
                                                <div class="package_btn text-center">
                                                    <a href="packagedesc.php" class="btn btn-default">View Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                    } 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include "footer.php"; ?>

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
    </body>
</html>