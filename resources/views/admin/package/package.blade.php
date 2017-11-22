@extends('admin.layouts.master')
@section('title','Admin Login')
@section('style')
<!--page level style-->
@endsection
<!--page content-->
@section('content')
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
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>category</th>
                                    <th>City</th>
                                    <th>Availabilty (from-to)</th>
                                    <th>Description</th>
                                    <th class="action_tab">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><img src="https://placeimg.com/100/100/nature" class="img-responsive"></td>
                                    <td>Package 1</td>
                                    <td>Category 1</td>
                                    <td>Ahmedabad</td>
                                    <td>20-09-2017 to 30-12-2017</td>
                                    <td>Lorem Ipsum donor sit amet</td>
                                    <td>
                                        <ul class="list-inline table-btns">
                                            <li><a href="view-package.php" class="edit"><i class="ion-forward"></i></a></li>
                                            <li><a href="edit-package.php" class="edit"><i class="ion-edit"></i></a></li>
                                            <li><a href="#" class="delete"><i class="ion-android-delete"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
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