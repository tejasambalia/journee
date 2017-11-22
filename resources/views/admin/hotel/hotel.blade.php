@extends('admin.layouts.master')
@section('title','Admin Login')
@section('style')
<!--page level style-->
@endsection
<!--page content-->
@section('content')
<?php
use App\AdminModels\Hotel;
use App\AdminModels\Room;
use App\AdminModels\RoomType;
$data_hotel = Hotel::get();
?>
    <section class="package-page">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="title">Hotels</h1>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ url('/admin/addHotel') }}" class="btn btn-default table-top-btn"><i class="ion-plus-round"></i> add hotel</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered custom-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>type</th>
                                    <th>no of rooms</th>
                                    <th>Rooms Available</th>
                                    <th>Type of rooms</th>
                                    <th class="action_tab">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                ?>
                                @foreach($data_hotel as $d_hotel)
                                <?php
                                $count++;
                                $data_room = Room::getRoomType($d_hotel->id);
                                $type = "";
                                $seprator = "";
                                foreach ($data_room as $d_room) {
                                    $type .= $seprator.RoomType::getSingleColumnData($d_room->m_room_type_id, 'name');
                                    $seprator = ", ";
                                }
                                ?>
                                <tr>
                                    <td>{!! $count !!}</td>
                                    <td>{!! $d_hotel->name !!}</td>
                                    <td>{!! $d_hotel->type !!}</td>
                                    <td>{!! $d_hotel->total_rooms !!}</td>
                                    <td>{!! $d_hotel->available_rooms !!}</td>
                                    <td>{!! $type !!}</td>
                                    <td>
                                        <ul class="list-inline table-btns">
                                            <?php
                                            $view_url = url('/admin/viewHotel/'.$d_hotel->id);
                                            $edit_url = url('/admin/editHotel/'.$d_hotel->id);
                                            ?>
                                            <li><a href="{{ $view_url }}" class="edit"><i class="ion-forward"></i></a></li>
                                            <li><a href="{{ $edit_url }}" class="edit"><i class="ion-edit"></i></a></li>
                                            <li><a href="" class="delete"><i class="ion-android-delete"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    </section>
	
@endsection
@section('script')
<!--page level script-->
@endsection