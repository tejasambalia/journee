<!DOCTYPE html>
<html lang="en">
    <head>    
        <?php include "head.php"; ?>
        <title>View {{Package Name}} | Travel</title>
    </head>
    <body>
        <?php include "header.php"; ?>

        <section class="package-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="title space-bot-0">View {{package's name}}</h1>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="edit-package.php" class="btn btn-default table-top-btn"><i class="ion-plus-round"></i> edit Package</a>
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
                                        <p>Package Name</p>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label>Price:</label>
                                        <p>Rs. 12000</p>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label>Category:</label>
                                        <p>Package Category</p>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label>Days:</label>
                                                <p>1</p>
                                            </div>
                                            <div class="col-xs-6">
                                                <label>Nights:</label>
                                                <p>0</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>            
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <label>City:</label>
                                        <p>Package City</p>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Availability:</label>
                                        <p>12.09.2017 to 19.12.2017</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Upload Image:</label>
                                        <p><a href="#">image path 1</a></p>
                                    </div>
                                </div>              
                                <div class="row">
                                    <div class="col-sm-3 form-group">
                                        <label>Coupon:</label>
                                        <p>Coupon</p>
                                    </div> 
                                    <div class="col-sm-3 form-group">
                                        <label>Discount Type:</label>
                                        <p>Discount type 1</p>
                                    </div> 
                                    <div class="col-sm-3 form-group">
                                        <label>Discount Amount:</label>
                                        <p>Rs. 1000</p>
                                    </div> 
                                    <div class="col-sm-3 form-group">
                                        <label>Discount Price:</label>
                                        <p>Rs. 11000</p>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Package Description:</label>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div  id="hotel_selection">
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
                                        <p>Hotel 1</p>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Select Room:</label>
                                        <p>Room 1</p>
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