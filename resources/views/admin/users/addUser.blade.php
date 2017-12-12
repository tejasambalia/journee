@extends('admin.layouts.master')
@section('title','Add User')
@section('style')
<!--page level style-->
@endsection
<!--page content-->
@section('content')

<section class="package-page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="title space-bot-0">Add User</h1>
			</div>
		</div>
        <hr>
		<div class="row">
			<div class="col-md-12">
                {!! Form::open(array('url' => '/admin/handleAddUser', 'class' => 'basic-form', 'method' => 'post')) !!}
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Name:</label>
                            {!! Form::text('name', null, array('class' => 'form-control',  'placeholder' => 'Name', 'required' => 'required')) !!}
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>User Name:</label>
                            {!! Form::text('username', null, array('class' => 'form-control',  'placeholder' => 'Username', 'required' => 'required')) !!}
                        </div>
                    </div>            
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Password:</label>
                            {!! Form::text('password', null, array('class' => 'form-control',  'placeholder' => 'Password', 'required' => 'required')) !!}
                        </div>
                    </div>        
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-default">submit</button>
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