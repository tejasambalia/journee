<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>        
        @include('user.layouts.header')
        <noscript>
            <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display = 'none';">&times;</span> 
                 please enable javascript for this site.
            </div>
        </noscript>
        @yield('style')        
    </head>
    <body>        
          <header>
            <section class="topbar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="navbar-brand">
                                <img src="https://placeimg.com/250/75/any" class="img-responsive">
                            </div>
                        </div>
                        <div class="col-md-4">
<!--                            <form class="search_form">
                                <div class="form-group">
                                    <input type="search" class="form-control" placeholder="Search here" name="">
                                    <button type="submit" class="btn btn-default"><i class="ion-android-search"></i></button>
                                </div>
                            </form>-->
                        </div>
                        <div class="col-md-4">
                            <ul class="list-inline topbar_menu text-right">
                                <li><a href="#"><i class="ion-android-call"></i>+91 1234567890 </a></li>
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown"><i class="ion-android-person"></i></a>
                                    <div class="dropdown-menu">
                                        <ul class="list-unstyled">
                                            <li>   
                                                @php
                                                if(session()->has('user_id'))
                                                {
                                                @endphp
                                                {{ Html::link('/logout', 'Logout', array())}}
                                                @php } else { @endphp 
                                                {{ Html::link('/login', 'Login', array())}}
                                                @php
                                                }
                                                @endphp
                                            </li>
                                            <li>{{ Html::link('/signup', 'Register with us', array())}}</li>
                                            <li>{{ Html::link('/', 'Bookings', array())}}</li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <nav class="navbar">
                <div class="container">
                    <div class="row">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-left">
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li><a href="{{url('/aboutus')}}">About Us</a></li>
                                <li><a href="{{url('/package')}}">Packages</a></li>
                                <li><a href="{{url('/')}}">Destinations</a></li>
                                <li><a href="#inquiryModal" data-toggle="modal" data-target="#inquiryModal">Inquiry</a></li>
                                
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                </div>
                <!-- /.container-fluid -->
            </nav>
        </header>                 
        @include('user.layouts.modals')  
        @yield('content')
        @include('user.layouts.footer')
        @yield('script')
    </body>
</html>