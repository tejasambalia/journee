<!DOCTYPE html>
<html lang="en">
    <head>    
        <?php include "head.php"; ?>
        <title>Add Rom | Travel</title>

    </head>
    <body>
        <?php include "header.php"; ?>

        <section class="package-page">
        	<div class="container">
        		<div class="row">
                    <div class="col-md-6">
                        <h1 class="title space-bot-0">Edit {{Room Name}}</h1>
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
                                    <div class="col-sm-6 form-group">
                                        <label>Rooms Available:</label>
                                        <input type="number" min="0" name="" class="form-control">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Affiliates:</label>
                                        <input type="text"   value="Wifi, Food, Parking" data-role="tagsinput" min="0" name="" class="form-control">
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

    </body>
</html>