@extends('admin.layouts.master')
@section('title','Admin Login')
@section('style')
<!--page level style-->
@endsection
<!--page content-->
@section('content')
<?php
use App\AdminModels\Coupon;
$data = Coupon::get();
?>
	<section class="package-page">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6">
    				<h1 class="title">Coupon</h1>
    			</div>
    			<div class="col-md-6 text-right">
    				<a href="{{ url('/admin/addCoupon') }}" class="btn btn-default table-top-btn"><i class="ion-plus-round"></i> add coupon</a>
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
    								<th>Code</th>
                                    <th>Disc. Type</th>
                                    <th>Amount</th>
    								<th class="action_tab">Actions</th>
    							</tr>
    						</thead>
    						<tbody>
                                @foreach ($data as $d)
    							<tr>
    								<td>{{ $d->id }}</td>
    								<td>{{ $d->name }}</td>
    								<td>{{ $d->code }}</td>
                                    <td>{{ $d->discount_type }}</td>
                                    <td>{{ $d->duscount_amount }}</td>
    								<td>
    									<ul class="list-inline table-btns">
                                            <?php
                                                $edit_url = url('/admin/editCoupon/'.$d->id);
                                                if($d->active==1){
                                                    $btn_url = url('/admin/deactivateCoupon/'.$d->id);
                                                    $label = "Deactivate";
                                                }
                                                else{
                                                    $btn_url = url('/admin/activateCoupon/'.$d->id);
                                                    $label = "Activate";
                                                }
                                            ?>
    										<li><a href="{{ $edit_url }}" class="edit"><i class="ion-edit"></i></a></li>
    										<li><a onclick="remove('{{ $btn_url }}')">{{ $label }}</a></li>
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