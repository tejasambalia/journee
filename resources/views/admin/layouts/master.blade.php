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
    <body>
        <header>
            <nav class="navbar">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="">Brand</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                        <ul class="nav navbar-nav navbar-left">
                            <li><a href="{{ url('/admin/package') }}">Package</a></li>
                            <li><a href="{{ url('/admin/hotel') }}">Hotel</a></li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">Manage</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/admin/users') }}">Users</a></li>
                                    <li><a href="{{ url('/admin/packageCategory') }}">Package Category</a></li>
                                    <li><a href="{{ url('/admin/roomType') }}">Room Type</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('/admin/inquiry') }}">Inquiry</a></li>
                            <li><a href="{{ url('/admin/orders') }}">Orders</a></li>
                            <li><a href="{{ url('/admin/reports') }}">Reports</a></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="logout"><span>User 1</span> <a href="{{ url('/admin/logout') }}">logout</a></li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </header>      
        <div class="container white-bg">  
        @yield('content')
        </div>

        @include('admin.layouts.footer')
        @yield('script')
    </body>
</html>