<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
{!! Html::script('/assets/js/jquery.min.js') !!}
<!-- Include all compiled plugins (below), or include individual files as needed -->
{!! Html::script('/assets/js/bootstrap.min.js') !!}
{!! Html::script('/assets/js/bootstrap-tagsinput.js') !!}
{!! Html::script('/assets/js/typeahead.bundle.js') !!}
<script type="text/javascript">

    // https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/

    var substringMatcher = function(strs) {
      return function findMatches(q, cb) {
        var matches, substringRegex;

        // an array that will be populated with substring matches
        matches = [];

        // regex used to determine if a string contains the substring `q`
        substrRegex = new RegExp(q, 'i');

        // iterate through the pool of strings and for any string that
        // contains the substring `q`, add it to the `matches` array
        $.each(strs, function(i, str) {
          if (substrRegex.test(str)) {
            matches.push(str);
          }
        });

        cb(matches);
      };
    };

    var skills = ['Type 1', 'Type 2', 'Type 3', 'Type 4', 'Type 5',
      'Type 6'];

    $('input[data-role="tagsinput"]').tagsinput({
      typeaheadjs: {
            name: 'room_type',
            source: substringMatcher(skills)
        }
    });
</script>
<!-- DateRangePicker http://www.daterangepicker.com/ -->
{!! Html::script('/assets/js/moment.min.js') !!}
{!! Html::script('/assets/js/daterangepicker.js') !!}
<script type="text/javascript">
    $(function() {

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#availability span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            $('#available_start_date').val(start.format('YYYY-M-DD'));
            $('#available_end_date').val(end.format('YYYY-M-DD'));
        }

        $('#availability').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);
        
    });
</script>
{!! Html::script('/assets/js/custom.js') !!}