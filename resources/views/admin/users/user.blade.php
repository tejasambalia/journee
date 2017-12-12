@extends('admin.layouts.master')
@section('title','Admin Login')
@section('style')
<!--page level style-->
@endsection
<!--page content-->
@section('content')
<?php
use App\AdminModels\Users;
$data = Users::get();
?>

<section class="package-page">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1 class="title">Users</h1>
			</div>
			<div class="col-md-6 text-right">
				<a href="{{ url('/admin/addUser') }}" class="btn btn-default table-top-btn"><i class="ion-plus-round"></i> add user</a>
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
								<th>Username</th>
								<th>Password</th>
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
								<td>{!! $d->username !!}</td>
								<td>{!! $d->password !!}</td>
								<td>
									<ul class="list-inline table-btns">
										<?php
                                        $edit_url = url('/admin/editUser/'.$d->id);
                                        $delete_url = url('/admin/deleteUser/'.$d->id);
                                        ?>
										<li><a href="{!! $edit_url !!}" class="edit"><i class="ion-edit"></i></a></li>
										<li><a href="{!! $delete_url !!}" class="delete"><i class="ion-android-delete"></i></a></li>
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