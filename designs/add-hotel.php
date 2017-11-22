<!DOCTYPE html>
<html lang="en">
    <head>    
        <?php include "head.php"; ?>
        <title>Add Hotel | Travel</title>
    </head>
    <body>
        <?php include "header.php"; ?>

        <section class="package-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="title space-bot-0">Add Hotel</h1>
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
                                        <input type="text" class="form-control" placeholder="" name="">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Type:</label>
                                        <select class="form-control">
                                            <option>Select Option</option>
                                            <option>5 Star</option>
                                            <option>4 Star</option>
                                        </select>
                                    </div>
                                </div>            
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <label>State:</label>
                                        <select class="form-control">
                                            <option>Select Option</option>
                                            <option>Gujarat</option>
                                            <option>Madhyapradesh</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>City:</label>
                                        <select class="form-control">
                                            <option>Select Option</option>
                                            <option>Ahmedabad</option>
                                            <option>Rajkot</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Upload Image:</label>
                                        <input type="file" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <button type="button" id="continue_btn" class="btn btn-default" data-toggle="collapse" data-target="#hotel_rooms_add">Continue</button>
                                    </div>
                                </div>   
                            </div>
                            <div class="hotel_room_details collapse" id="hotel_rooms_add">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="list-inline">
                                            <li><h3 class="sub_title">Hotel's Room</h3></li>
                                            <li><a href="#" class="btn btn-default btn-bordered"><i class="ion-plus-round"></i> Add Room</a></li>
                                        </ul>                                        
                                    </div>
                                </div>
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