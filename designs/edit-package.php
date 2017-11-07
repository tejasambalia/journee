<!DOCTYPE html>
<html lang="en">
    <head>    
        <?php include "head.php"; ?>
        <title>Edit {{Package Name}} | Travel</title>
    </head>
    <body>
        <?php include "header.php"; ?>

        <section class="package-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="title space-bot-0">Edit {{package's name}}</h1>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="add-package.php" class="btn btn-default table-top-btn"><i class="ion-plus-round"></i> add Package</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <form class="basic-form">
                            <div class="hotel_details">
                                <div class="row">
                                    <div class="col-sm-3 form-group">
                                        <label>Name:</label>
                                        <input type="text" class="form-control" placeholder="" name="">
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label>Price:</label>
                                        <input type="number" min="0" class="form-control" placeholder="" name="">
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label>Category:</label>
                                        <select class="form-control">
                                            <option>Select Option</option>
                                            <option>5 Star</option>
                                            <option>4 Star</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="row">
                                            <div class="col-xs-6 form-group">
                                                <label>Days:</label>
                                                <input type="number" min="0" class="form-control" name="">
                                            </div>
                                            <div class="col-xs-6 form-group">
                                                <label>Nights:</label>
                                                <input type="number" min="0" class="form-control" name="">
                                            </div>
                                        </div>
                                    </div>
                                </div>            
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <label>City:</label>
                                        <select class="form-control">
                                            <option>Select Option</option>
                                            <option>Ahmedabad</option>
                                            <option>Rajkot</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Availability:</label>
                                        <div id="availability" class="date_range_picker" class="pull-right">
                                            <i class="ion-calendar"></i> <span></span> <i class="ion-arrow-down-b pull-right" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Upload Image:</label>
                                        <input type="file" class="form-control" name="">
                                    </div>
                                </div>              
                                <div class="row">
                                    <div class="col-sm-3 form-group">
                                        <label>Coupon:</label>
                                        <select class="form-control">
                                            <option>Select Option</option>
                                            <option>Coupan 1</option>
                                            <option>Coupan 2</option>
                                        </select>
                                    </div> 
                                    <div class="col-sm-3 form-group">
                                        <label>Discount Type:</label>
                                        <select class="form-control">
                                            <option>Select Option</option>
                                            <option>Discount 1</option>
                                            <option>Discount 2</option>
                                        </select>
                                    </div> 
                                    <div class="col-sm-3 form-group">
                                        <label>Discount Amount:</label>
                                        <input type="number" class="form-control" min="0" name="">
                                    </div> 
                                    <div class="col-sm-3 form-group">
                                        <label>Discount Price:</label>
                                        <input type="number" class="form-control" min="0" name="">
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Package Description:</label>
                                        <textarea class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" data-target="#hotel_selection" data-toggle="collapse" class="btn btn-default">Continue</button>
                                </div>
                            </div>  
                            <div class="collapse" id="hotel_selection">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="list-inline">
                                            <li><h3 class="sub_title">Hotel's Selection</h3></li>
                                        </ul>                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Select Hotel:</label>
                                        <select class="form-control">
                                            <option>Hotel 1</option>
                                            <option>Hotel 2</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Select Room:</label>
                                        <select class="form-control">
                                            <option>Room 1</option>
                                            <option>Room 2</option>
                                        </select>
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