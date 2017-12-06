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