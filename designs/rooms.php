<!DOCTYPE html>
<html lang="en">
    <head>    
        <?php include "head.php"; ?>
        <title>Rooms | Travel</title>
    </head>
    <body>
        <?php include "header.php"; ?>

        <section class="package-page">
        	<div class="container">
        		<div class="row">
        			<div class="col-md-6">
        				<h1 class="title">Rooms</h1>
        			</div>
        			<div class="col-md-offset-2 col-md-4 text-right">
        				<form class="custom_form">
                            <label>&nbsp;</label>
                            <select class="form-control">
                                <option>Select Hotel</option>
                                <option>Hotel 1</option>
                            </select>            
                        </form>
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-md-12">
        				<div class="table-responsive">
        					<table class="table table-bordered custom-table">
        						<thead>
        							<tr>
        								<th>No.</th>
                                        <th>Image</th>
        								<th>Room Name</th>
        								<th>Room type</th>
        								<th>Guests Allowed</th>
        								<th>Room Description</th>
        								<th class="action_tab">Actions</th>
        							</tr>
        						</thead>
        						<tbody>
        							<tr>
        								<td>1</td>
                                        <td><img src="https://placeimg.com/100/100/nature" class="img-responsive"></td>
        								<td>Room 1</td>
        								<td>room type 1</td>
        								<td>Less than 3</td>
        								<td>Lorem Ipsum lorem sit amet</td>
        								<td>
        									<ul class="list-inline table-btns">
        										<li><a href="edit-room.php" class="edit"><i class="ion-edit"></i></a></li>
        										<li><a href="#" class="delete"><i class="ion-android-delete"></i></a></li>
        									</ul>
        								</td>
        							</tr>
        						</tbody>
        					</table>
        				</div>
        			</div>
        		</div>
        	</div>	
        </section>

        <?php include "footer.php"; ?>
    </body>
</html>