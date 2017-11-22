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
                            <form class="search_form">
                                <div class="form-group">
                                    <input type="search" class="form-control" placeholder="Search here" name="">
                                    <button type="submit" class="btn btn-default"><i class="ion-android-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-inline topbar_menu text-right">
                                <li><a href="#"><i class="ion-android-call"></i>+91 1234567890 </a></li>
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown"><i class="ion-android-person"></i></a>
                                    <div class="dropdown-menu">
                                        <ul class="list-unstyled">
                                            <li><a href="#loginModal" data-toggle="modal" data-target="#loginModal">Login</a></li>   
                                            <li><a href="#registerModal" data-toggle="modal" data-target="#registerModal">Register with us</a></li>
                                            <li><a href="#">Bookings</a></li>
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
                                <li><a href="index.php">Home</a></li>
                                <li><a href="index.php">About Us</a></li>
                                <li><a href="packagelisting.php">Packages</a></li>
                                <li><a href="destinations.php">Destinations</a></li>
                                <li><a href="index.php">Gift Vouchers</a></li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                </div>
                <!-- /.container-fluid -->
            </nav>
        </header>

        <!-- Login Modal -->
        <div class="modal fade login_modal medium-modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="logo_modal">
                            <img src="https://placeimg.com/250/75/any" class="img-responsive center-block">
                            <h3>Login Now</h3>
                        </div>
                        <form class="modal_form">
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="text" class="form-control" name="" placeholder="user@mail.com">
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="password" class="form-control" name="" placeholder="********">
                            </div>
                            <div class="row">
                                <div class="col-xs-4 form-group">
                                    <button type="submit" class="btn btn-default btn-login">submit</button>
                                </div>
                                <div class="col-xs-8 text-right">
                                    <a href="#forgetModal" data-target="#forgetModal" data-dismiss="modal" data-toggle="modal" class="forgot">Forgot Password?</a>
                                </div>
                            </div>
                            <div>
                                <p class="register">Don't have an account yet, <a href="#registerModal" data-target="#registerModal" data-dismiss="modal" data-toggle="modal">Register Now</a>.</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Forgot Password Modal -->
        <div class="modal fade login_modal medium-modal" id="forgetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="logo_modal">
                            <img src="https://placeimg.com/250/75/any" class="img-responsive center-block">
                            <h3>Forgot Password</h3>
                            <p class="text-center">Have you forgot your password, don't worry. We have your back!</p>
                        </div>
                        <form class="modal_form space20">
                            <div class="form-group">
                                <label>Registered Email:</label>
                                <input type="text" class="form-control" name="" placeholder="user@mail.com">
                            </div>
                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <button type="submit" class="btn btn-default wid100 btn-login">submit</button>
                                </div>
                            </div>
                            <p class="register">Please check you mail for further process.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Register Modal -->
        <div class="modal fade login_modal medium-modal" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="logo_modal">
                            <img src="https://placeimg.com/250/75/any" class="img-responsive center-block">
                            <h3>Register Now!</h3>
                        </div>
                        <form class="modal_form">
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="text" class="form-control" name="" placeholder="user@mail.com">
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="password" class="form-control" name="" placeholder="********">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password:</label>
                                <input type="password" class="form-control" name="" placeholder="********">
                            </div>
                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <button type="submit" class="btn btn-default btn-login wid100">submit</button>
                                </div>
                            </div>
                            <div>
                                <p class="register">Already have an account, <a  href="#loginModal" data-target="#loginModal" data-dismiss="modal" data-toggle="modal">Login Here</a>.</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>