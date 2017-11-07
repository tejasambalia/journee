<!DOCTYPE html>
<html lang="en">
    <head>    
        <?php include "head.php"; ?>
        <title>Room Type | Travel</title>
    </head>
    <body>
        <?php include "header.php"; ?>

        <section class="package-page">
        	<div class="container">
        		<div class="row">
        			<div class="col-md-6">
        				<h1 class="title">Types of rooms</h1>
        			</div>
        			<div class="col-md-6 text-right">
        				<a href="add-room-type.php" class="btn btn-default table-top-btn"><i class="ion-plus-round"></i> add room type</a>
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-md-12">
        				<div class="table-responsive">
        					<table class="table table-bordered custom-table">
        						<thead>
        							<tr>
        								<th>No.</th>
        								<th>Room Type</th>
        								<th>Description</th>
        								<th class="action_tab">Actions</th>
        							</tr>
        						</thead>
        						<tbody>
        							<tr>
        								<td>1</td>
        								<td>Room Type 1</td>
        								<td>Lorem Ipsum donor sit amet</td>
        								<td>
        									<ul class="list-inline table-btns">
        										<li><a href="edit-room-type.php" class="edit"><i class="ion-edit"></i></a></li>
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