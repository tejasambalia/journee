@extends('admin.layouts.master')
@section('title','Admin Login')
@section('style')
<!--page level style-->
@endsection
<!--page content-->
@section('content')
<?php
use App\AdminModels\PackageCategory;
$data = PackageCategory::get();
?>
	<section class="package-page">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6">
    				<h1 class="title">Package Categories</h1>
    			</div>
    			<div class="col-md-6 text-right">
    				<a href="{{ url('/admin/addPackageCategory') }}" class="btn btn-default table-top-btn"><i class="ion-plus-round"></i> add category</a>
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
    								<th>Description</th>
    								<th class="action_tab">Actions</th>
    							</tr>
    						</thead>
    						<tbody>
                                @foreach ($data as $d)
    							<tr>
    								<td>{{ $d->id }}</td>
    								<td>{{ $d->name }}</td>
    								<td>{{ $d->description }}</td>
    								<td>
    									<ul class="list-inline table-btns">
                                            <?php $url = url('/admin/editPackageCategory/'.$d->id) ?>
    										<li><a href="{{ $url }}" class="edit"><i class="ion-edit"></i></a></li>
                                            <?php $url = url('/admin/deletePackageCategory/'.$d->id) ?>
    										<li><a onclick="remove('{{ $url }}')" class="delete"><i class="ion-android-delete"></i></a></li>
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