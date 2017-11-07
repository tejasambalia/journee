<!DOCTYPE html>
<html lang="en">
    <head>    
        <?php include "head.php"; ?>
        <title>Add Room Type | Travel</title>
    </head>
    <body>
        <?php include "header.php"; ?>

        <section class="package-page">
        	<div class="container">
        		<div class="row">
        			<div class="col-md-6">
        				<h1 class="title space-bot-0">Add Room Type</h1>
        			</div>
        		</div>
                <hr>
        		<div class="row">
        			<div class="col-md-12">
        				<form class="basic-form">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name:</label>
                                        <input type="text" class="form-control" placeholder="" name="">
                                    </div>
                                    <div class="form-group">
                                        <label>Description:</label>
                                        <textarea class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>          
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-default">submit</button>
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