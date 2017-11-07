<!DOCTYPE html>
<html lang="en">
    <head>    
        <?php include "head.php"; ?>
        <title>Hotels | Travel</title>
    </head>
    <body>
        <?php include "header.php"; ?>

        <section class="package-page">
        	<div class="container">
        		<div class="row">
        			<div class="col-md-6">
        				<h1 class="title">Hotels</h1>
        			</div>
        			<div class="col-md-6 text-right">
        				<a href="add-hotel.php" class="btn btn-default table-top-btn"><i class="ion-plus-round"></i> add hotel</a>
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
        								<th>Name</th>
        								<th>type</th>
        								<th>no of rooms</th>
        								<th>Rooms Available</th>
        								<th>Type of rooms</th>
        								<th class="action_tab">Actions</th>
        							</tr>
        						</thead>
        						<tbody>
        							<tr>
        								<td>1</td>
                                        <td><img src="https://placeimg.com/100/100/nature" class="img-responsive"></td>
        								<td>Hotel 1</td>
        								<td>5 Star</td>
        								<td>10</td>
        								<td>15</td>
        								<td>type 1, type 2</td>
        								<td>
        									<ul class="list-inline table-btns">
        										<li><a href="view-hotel.php" class="edit"><i class="ion-forward"></i></a></li>
        										<li><a href="edit-hotel.php" class="edit"><i class="ion-edit"></i></a></li>
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