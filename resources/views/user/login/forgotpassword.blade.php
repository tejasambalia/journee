@extends('user.layouts.master')
@section('title','User Login')
@section('style')
<!--page level style-->
@endsection
<!--page content-->

@section('content')
@if(session('error_msg'))      
<div class="alert alert-danger alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{session('error_msg')}}
</div>
@elseif(session('success_msg'))       
<div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{session('success_msg')}}
</div>
@endif
<section class="login_sec">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="logo_modal form-group">
                    <h3 class="text-center">Forgot Password</h3>
                </div>
				{!! Form::open(array('url' => 'post_forgotpassword','class'=>'modal_form')) !!}                        
				<div class="form-group space30">
				    <label>Email:</label>
				    <input type="text" class="form-control" name="email" placeholder="user@mail.com" required="">
				</div>  
				<button type="submit" class="btn btn-default btn-login wid100">submit</button>
				{!! Form::close() !!}    
				<p class="register space30">Please check your mail for further process.</p>
			</div>
		</div>
	</div>
</section>
@endsection
@section('script')
<!--page level script-->
@endsection
