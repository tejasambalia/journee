@extends('admin.layouts.master')
@section('title','Admin Login')
@section('style')
<!--page level style-->
@endsection
<!--page content-->
@section('content')
<?php
use App\AdminModels\Inquiry;
use App\AdminModels\City;
use App\AdminModels\State;
$data = Inquiry::getInquiryList();
?>
    <section class="package-page">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="title">Inquiry</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered custom-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>contact</th>
                                    <th>Location</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th class="action_tab">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                ?>
                                @foreach($data as $d)
                                <?php
                                $count++;
                                ?>
                                <tr>
                                    <td>{!! $count !!}</td>
                                    <td>{!! $d->name !!}</td>
                                    <td>Ph: {!! $d->contact !!}<br>E-Mail: {!! $d->email !!}</td>
                                    <td>City: {!! City::getSingleColumnData($d->city, 'name') !!}<br>State: {!! State::getSingleColumnData($d->state, 'name') !!}</td>
                                    <td>{!! $d->description !!}</td>
                                    <td>{!! Inquiry::getStatusName($d->status) !!}</td>
                                    <td>
                                        <ul class="list-inline table-btns">
                                            <?php
                                            $activate_url = url('/admin/activateInquiry/'.$d->id);
                                            $close_url = url('/admin/closeInquiry/'.$d->id);
                                            ?>
                                            @if($d->status==0)
                                            <li><a href="{{ $activate_url }}" class="edit">Activate</a></li>
                                            @endif
                                            <li><a href="{{ $close_url }}" onclick="return confirm('Are you sure you want to close?')" class="delete">Close</a></li>
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