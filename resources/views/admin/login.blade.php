<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>        
        @include('admin.layouts.header')
        <noscript>
            <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display = 'none';">&times;</span> 
                 please enable javascript for this site.
            </div>
        </noscript>
        @yield('style')        
    </head>
    <body class="login_bg">
	    <div class="bg_shadow">
	        <section class="sign-main-block">
	            <div class="view_table">
	                <div class="view_cell">                
	                    <div class="sign-side-block">
	                        <h1 class="login-title">Login</h1>
	                        <div class="space20"></div>
	                        {!! Form::open(array('url' => 'admin/post_login', 'id' => 'form-validation', 'method' => 'post', 'accept-charset' => 'utf-8')) !!}
	                            <div class="form-group">
	                            	{!! Form::text('username', null, array('class' => 'form-control',  'placeholder' => 'Email Address', 'required' => 'required')) !!}
	                            </div>
	                            <div class="form-group">
	                            	{!! Form::password('password', array('class' => 'form-control',  'placeholder' => 'Password', 'required' => 'required')) !!}
	                            </div>
	                            <div class="form-group">
	                            	{!! Form::submit('submit', array('class' => 'btn btn-signin')) !!}
	                            </div>
	                        {!! Form::close() !!}
	                    </div>  
	                </div>
	            </div>
	        </section>
	    </div>      
        <div class="container white-bg">  
        @yield('content')
        </div>

        @include('admin.layouts.footer')
        @yield('script')
        {!! Html::script('/assets/js/jquery.validate.js') !!}
	    <script type="text/javascript">
	        $( "#form-validation" ).validate({
	            rules: {
	                username: {
	                    required: true
	                },
	                password: {
	                    required: true
	                }
	            }
	        });
	    </script>
    </body>
</html>