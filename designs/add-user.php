<!DOCTYPE html>
<html lang="en">
    <head>    
        <?php include "head.php"; ?>
        <title>Home | Travel</title>
    </head>
    <body>
        <?php include "header.php"; ?>

        <section class="package-page">
        	<div class="container">
        		<div class="row">
        			<div class="col-md-12">
        				<h1 class="title space-bot-0">Add User</h1>
        			</div>
        		</div>
                <hr>
        		<div class="row">
        			<div class="col-md-12">
        				<form class="basic-form">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Name:</label>
                                    <input type="text" class="form-control" placeholder="" name="">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>User Name:</label>
                                    <input type="text" class="form-control" placeholder="" name="">
                                </div>
                            </div>            
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Email:</label>
                                    <input type="mail" class="form-control" placeholder="" name="">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Password:</label>
                                    <input type="Password" class="form-control" placeholder="" name="">
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