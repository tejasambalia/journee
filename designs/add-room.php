<!DOCTYPE html>
<html lang="en">
    <head>    
        <?php include "head.php"; ?>
        <title>Add Rom | Travel</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap-tagsinput.css">

    </head>
    <body>
        <?php include "header.php"; ?>

        <section class="package-page">
        	<div class="container">
        		<div class="row">
        			<div class="col-md-12">
        				<h1 class="title space-bot-0">Add Room</h1>
        			</div>
        		</div>
                <hr>
        		<div class="row">
        			<div class="col-md-12">
        				<form class="basic-form">                            
                            <div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Room Name:</label>
                                        <input type="text" class="form-control" placeholder="" name="">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Room Type:</label>
                                        <select class="form-control">
                                            <option>Select Room Type</option>
                                            <option>Room Type 1</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Guests Allowed:</label>
                                            <div class="row">
                                                <div class="col-xs-6 form-group">
                                                    <select class="form-control">
                                                        <option>Select Option</option>
                                                        <option>More Than</option>
                                                        <option>Less Than</option>
                                                        <option>Equal To</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-6 form-group">
                                                    <input type="number" min="0" class="form-control" name="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Image</label>
                                            <input type="file" class="form-control" name="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Room Description:</label>
                                        <textarea class="form-control" rows="6"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <button type="submit" class="btn btn-default">submit</button>
                                    </div>
                                </div>    
                            </div>  
                        </form>
        			</div>
        		</div>
        	</div>	
        </section>

        <?php include "footer.php"; ?>

        <script type="text/javascript" src="js/bootstrap-tagsinput.js"></script>
        <script type="text/javascript" src="js/typeahead.bundle.js"></script>
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

    </body>
</html>