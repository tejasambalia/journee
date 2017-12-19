@extends('admin.layouts.master')
@section('title','Admin Login')
@section('style')
<!--page level style-->
@endsection
<!--page content-->
@section('content')
<?php
use App\Classes\DropDown;
use App\AdminModels\Coupon;
$coupon_data = Coupon::findById($id);
?>
	<section class="package-page">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="title space-bot-0">Edit Coupon {!! $coupon_data->name !!}</h1>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(array('url' => '/admin/handleEditCoupon', 'class' => 'basic-form', 'method' => 'post')) !!}
                        <input type="hidden" name="id" value="{!! $coupon_data->id !!}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name:</label>
                                    {!! Form::text('name', $coupon_data->name, array('class' => 'form-control',  'placeholder' => 'Coupon Name', 'required' => 'required')) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Coupon Code:</label>
                                    {!! Form::text('code', $coupon_data->code, array('class' => 'form-control',  'placeholder' => 'Coupon Code', 'required' => 'required')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Discount Type:</label>
                                    <select name="discount_type" class="form-control">
                                        <?php
                                            $data = array('1'=>'%','2'=> 'Flat');
                                            $obj = new DropDown;
                                            $DropDown = $obj->DropDown($data, $coupon_data->discount_type);
                                            echo $DropDown;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Discount Amount:</label>
                                    {!! Form::text('duscount_amount', $coupon_data->duscount_amount, array('class' => 'form-control',  'placeholder' => 'Discount Amount', 'required' => 'required')) !!}
                                </div>
                            </div>
                        </div>          
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::submit('submit', array('class' => 'btn btn-default')) !!}
                            </div>
                        </div>    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>  
    </section>
@endsection
@section('script')
<!--page level script-->
@endsection