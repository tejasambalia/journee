<!DOCTYPE html>
<html lang="en">
    <head>    
        <?php include "head.php"; ?>
        <title>View {{Hotel Name}} | Travel</title>
    </head>
    <body>
        <?php include "header.php"; ?>

        <section class="package-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="title space-bot-0">View {{hotel's name}}</h1>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="edit-hotel.php" class="btn btn-default table-top-btn">Edit hotel</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <form class="basic-form">
                            <div class="hotel_details">
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Name:</label>
                                        <p>Hotel Name</p>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Type:</label>
                                        <p>Hotel Type</p>
                                    </div>
                                </div>            
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <label>State:</label>
                                        <p>Gujarat</p>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>City:</label>
                                        <p>Ahmedabad</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Upload Image:</label>
                                        <p> <a href="#">Image 1</a></p>
                                    </div>
                                </div>   
                            </div>
                            <div class="hotel_room_details">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="list-inline">
                                            <li><h3 class="sub_title">Hotel's Room</h3></li>
                                        </ul>                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Room Name:</label>
                                        <p> Room XYZ </p>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Room Type:</label>
                                        <p> Room Type 1 </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Rooms Available:</label>
                                        <p> 5 </p>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Affiliates:</label>
                                        <p> Wifi, Food, Parking </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Guests Allowed:</label>
                                            <p>More than 1</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Image</label>
                                            <p><a href="#">image url comes here</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Room Description:</label>
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