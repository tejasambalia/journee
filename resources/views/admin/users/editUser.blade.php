@extends('admin.layouts.master')
@section('title','Admin Login')
@section('style')
<!--page level style-->
@endsection
<!--page content-->
@section('content')
<?php
use App\AdminModels\Users;
$data = Users::getById($id);
?>
<section class="package-page">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1 class="title space-bot-0">Edit {{ $data[0]->name }}</h1>
			</div>
		</div>
        <hr>
		<div class="row">
			<div class="col-md-12">
                {!! Form::open(array('url' => '/admin/handleEditUser', 'class' => 'basic-form', 'method' => 'post')) !!}
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            {{ Form::hidden('id', $data[0]->id, array()) }}
                            <label>Name:</label>
                            {!! Form::text('name', $data[0]->name, array('class' => 'form-control',  'placeholder' => 'Name', 'required' => 'required')) !!}
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>User Name:</label>
                            {!! Form::text('username', $data[0]->username, array('class' => 'form-control',  'placeholder' => 'Username', 'required' => 'required')) !!}
                        </div>
                    </div>            
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Password:</label>
                            {!! Form::text('password', $data[0]->password, array('class' => 'form-control',  'placeholder' => 'Password', 'required' => 'required')) !!}
                        </div>
                    </div>        
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-default">submit</button>
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