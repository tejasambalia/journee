<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3 class="footer_title">Information</h3>
                <ul class="list-unstyled footer_menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">FAQ's</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3 class="footer_title">Legal</h3>
                <ul class="list-unstyled footer_menu">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Disclaimer</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3 class="footer_title">Contact Us</h3>
                <ul class="list-unstyled footer_contact">
                    <li class="call"><a href="#">+91 9081117017</a></li>
                    <li class="mail"><a href="#">salesjournee@gmail.com</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="made_love"><a href="https://en.wikipedia.org/wiki/Make_in_India">Made with <span class="ion-ios-heart"></span> in India</a></p>
            </div>
        </div>
    </div>
    <div class="copyright_block">
        <div class="container">
            <div class="row">
                <div class="col-md-push-6 col-md-6">
                    <p class="developed_by text-right">Developed by <a href="#">Multitude Tech.</a></p>
                </div>
                <div class="col-md-pull-6 col-md-6">
                    <p class="copyright">Copyright 2018 @ Journee.co.in</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
{!! Html::script('/assets/user/js/jquery.min.js') !!}
<!-- Include all compiled plugins (below), or include individual files as needed -->
{!! Html::script('/assets/user/js/bootstrap.min.js') !!}        
{!! Html::script('/assets/user/js/bootstrap-tagsinput.js') !!}
{!! Html::script('/assets/user/js/typeahead.bundle.js') !!}        
<script type="text/javascript">
</script>
<!-- DateRangePicker http://www.daterangepicker.com/ -->
{!! Html::script('/assets/user/js/moment.min.js') !!}        
{!! Html::script('/assets/user/js/daterangepicker.js') !!}
{!! Html::script('/assets/user/js/jquery-ui.js') !!}        
{!! Html::script('/assets/user/js/owl.carousel.min.js') !!}        
{!! Html::script('/assets/user/js/custom.js') !!}                
{!! Html::script('/assets/user/js/jquery.validate.js') !!}                
<script type="text/javascript">
    $(document).ready(function () {
        $('#country').on('change', function () {
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    type: 'GET',
                    url: 'dynamic_country_state',
                    data: 'country_id=' + countryID,
                    success: function (html) {
                        $('#state').html(html);
                        $('#city').html('<option value="">Select state first</option>');
                    }
                });
            } else {
                $('#state').html('<option value="">Select country first</option>');
                $('#city').html('<option value="">Select state first</option>');
            }
        });

        $('#state').on('change', function () {
            var stateID = $(this).val();
            if (stateID) {
                $.ajax({
                    type: 'GET',
                    url: 'dynamic_country_state',
                    data: 'state_id=' + stateID,
                    success: function (html) {
                        $('#city').html(html);
                    }
                });
            } else {
                $('#city').html('<option value="">Select state first</option>');
            }
        });
        $('#btn_inquiry').click(function() {
             valid=$("#frm_inquiry").valid();  
             if(valid)
             {
                mobile=$("#mobile_number").val();
                var pattern = /^\d{10}$/;
                if(!pattern.test(mobile)) {
                       window.alert("Phone number must be 10 digits.");                       
                       return false;
                }
                $( "#frm_inquiry" ).submit();
             }
        });
    });
    


    
</script>