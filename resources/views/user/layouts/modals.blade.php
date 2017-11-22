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
                        {!! Form::open(array('url' => 'post_login','class'=>'modal_form')) !!}                        
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
                        {!! Form::close() !!}
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