@extends('admin.layouts.master')
@section('title','Admin Login')
@section('style')
<!--page level style-->
@endsection
<!--page content-->
@section('content')
<?php
use App\AdminModels\Package;
use App\AdminModels\PackageCategory;
use App\AdminModels\City;

$data_package = Package::get();
?>
    <section class="package-page">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="title">Packages</h1>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ url('/admin/addPackage') }}" class="btn btn-default table-top-btn"><i class="ion-plus-round"></i> add Package</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered custom-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <!-- <th>Image</th> -->
                                    <th>Name</th>
                                    <th>category</th>
                                    <!-- <th>City</th> -->
                                    <th>Availabilty (from-to)</th>
                                    <th>Description</th>
                                    <th class="action_tab">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                ?>
                                @foreach($data_package as $d_package)
                                <?php
                                $count++;
                                ?>
                                <tr>
                                    <td>{!! $count !!}</td>
                                    <!-- <td><img src="https://placeimg.com/100/100/nature" class="img-responsive"></td> -->
                                    <td>{!! $d_package->name !!}</td>
                                    <td>{!! PackageCategory::getSingleColumnData($d_package->category, 'name') !!}</td>
                                    <td><!-- { City::getSingleColumnData($d_package->city, 'name') } --></td>
                                    <td></td>
                                    <td>{!! $d_package->description !!}</td>
                                    <td>
                                        <ul class="list-inline table-btns">
                                            <?php
                                            $view_url = url('/admin/viewPackage/'.$d_package->id);
                                            $edit_url = url('/admin/editPackage/'.$d_package->id);
                                            $delete_url = url('/admin/deletePackage/'.$d_package->id);
                                            ?>
                                            <li><a href="{{ $view_url }}" class="edit"><i class="ion-forward"></i></a></li>
                                            <li><a href="{{ $edit_url }}" class="edit"><i class="ion-edit"></i></a></li>
                                            <li><a href="{{ $delete_url }}" onclick="return confirm('Are you sure you want to delete package?')" class="delete"><i class="ion-android-delete"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    </section>
@endsection
@section('script')
<!--page level script-->
@endsection