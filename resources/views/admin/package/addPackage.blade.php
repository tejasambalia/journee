@extends('admin.layouts.master')
@section('title','Admin Login')
@section('style')
<!--page level style-->
@endsection
<!--page content-->
@section('content')
<?php
use App\Classes\DropDown;
use App\AdminModels\PackageCategory;
use App\AdminModels\City;
use App\AdminModels\Coupon;

$packageCategory = PackageCategory::get();
$city = City::get();
$coupon = Coupon::getActive();
?>
    <section class="package-page">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="title space-bot-0">Add Package</h1>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(array('url' => '/admin/handleAddPackage', 'class' => 'basic-form', 'method' => 'post')) !!}
                        <div class="hotel_details">
                            <div class="row">
                                <div class="col-sm-3 form-group">
                                    <label>Name:</label>
                                    {!! Form::text('name', null, array('class' => 'form-control',  'placeholder' => 'Package Name', 'required' => 'required')) !!}
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Price:</label>
                                    {!! Form::text('price', null, array('class' => 'form-control',  'placeholder' => 'Price', 'required' => 'required')) !!}
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Category:</label>
                                    <select class="form-control" name='category'>
                                        <?php
                                        $obj = new DropDown;
                                        $DropDown = $obj->ObjDropDown($packageCategory);
                                        echo $DropDown;
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-xs-6 form-group">
                                            <label>Days:</label>
                                            <input type="number" min="0" class="form-control" name="days">
                                        </div>
                                        <div class="col-xs-6 form-group">
                                            <label>Nights:</label>
                                            <input type="number" min="0" class="form-control" name="nights">
                                        </div>
                                    </div>
                                </div>
                            </div>            
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>City:</label>
                                    <select class="form-control" name="city">
                                        <?php
                                        $obj = new DropDown;
                                        $DropDown = $obj->ObjDropDown($city);
                                        echo $DropDown;
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label>Availability:</label>
                                    <div id="availability" class="date_range_picker" class="pull-right">
                                        <i class="ion-calendar"></i> <span></span> <i class="ion-arrow-down-b pull-right" aria-hidden="true"></i>
                                    </div>
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
                                            $DropDown = $obj->ObjDropDown($coupon);
                                            echo $DropDown;
                                        ?>
                                    </select>
                                </div> 
                                <div class="col-sm-3 form-group">
                                    <label>Discount Type:</label>
                                    <select class="form-control" name="discount_type">
                                        <?php
                                            $data = array('1'=>'%','2'=> 'Flat');
                                            $DropDown = $obj->DropDown($data);
                                            echo $DropDown;
                                        ?>
                                    </select>
                                </div> 
                                <div class="col-sm-3 form-group">
                                    <label>Discount Amount:</label>
                                    <input type="number" class="form-control" min="0" name="discount_amount">
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label>Package Description:</label>
                                    <textarea class="form-control" rows="5" name="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button id="continue_btn" type="button" data-target="#hotel_selection" data-toggle="collapse" class="btn btn-default">Continue</button>
                            </div>
                        </div>  
                        <div class="collapse hotel_selection_block" id="hotel_selection">
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
                                    <select class="form-control">
                                        <option>Hotel 1</option>
                                        <option>Hotel 2</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Select Room:</label>
                                    <select class="form-control">
                                        <option>Room 1</option>
                                        <option>Room 2</option>
                                    </select>
                                </div>
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
                    </form>
                </div>
            </div>
        </div>  
    </section>
@endsection
@section('script')
<!--page level script-->
@endsection