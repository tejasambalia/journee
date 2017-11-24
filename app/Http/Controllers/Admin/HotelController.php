<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Admin Models
use App\AdminModels\Hotel;
use App\AdminModels\Room;
use App\AdminModels\RoomOption;
use App\Classes\ArrayClass;

class HotelController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function hotel(){
        return view('admin.hotel.hotel');
    }

    public function addHotel(){
        return view('admin.hotel.addHotel');
    }

    public function handleAddHotel(Request $request){
        $data = $request->all();

        $this->validate($request, [
            'hotel_image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('hotel_image_path');
        
        $room_data = array();
        $room_data['name'] = $data['room_name'];
        $room_data['m_room_type_id'] = $data['m_room_type_id'];
        $room_data['total_available'] = $data['total_available'];
        $room_data['guest_condition'] = $data['guest_condition'];
        $room_data['guest_allowed'] = $data['guest_allowed'];
        $room_data['room_image'] = $data['room_image'];
        $room_data['room_description'] = $data['room_description'];
        $room_data['option'] = $data['option'];
        $room_data['description'] = $data['room_description'];

        $obj = new ArrayClass;
        $new_room_data = $obj->Flip($room_data);
        $new_room_data = collect($new_room_data)->shift();
        //store hotel data        
        $hotel_id = Hotel::add($data);
        
        //add room
        $new_room_data['hotel_id'] = $hotel_id;
        $room_id = Room::add($new_room_data);

        //add room options
        $room_options = explode(',', $new_room_data['option']);
        foreach ($room_options as $options) {
            $option['room_id'] = $room_id;
            $option['option_id'] = $options;
            $option['value'] = "";
            RoomOption::add($option);
        }
        return redirect('/admin/hotel');
    }

    public function viewHotel($id){
        return view('admin.hotel.viewHotel')->with(array('id' => $id));
    }

    public function editHotel($id)
    {
        return view('admin.hotel.editHotel')->with(array('id' => $id));
    }

    public function handleEditHotel(Request $request){
        $data = $request->all();

        $hotel_data['id'] = $data['hotel_id'];
        $hotel_data['name'] = $data['name'];
        $hotel_data['type'] = $data['type'];
        $hotel_data['hotel_image_path'] = $data['hotel_image_path'];
        $hotel_data['state_id'] = $data['state_id'];
        $hotel_data['city_id'] = $data['city_id'];

        //update hotel data
        Hotel::edit($hotel_data);

        //unset hotel var
        unset($data['_token']);
        unset($data['hotel_id']);
        unset($data['name']);
        unset($data['type']);
        unset($data['hotel_image_path']);
        unset($data['state_id']);
        unset($data['city_id']);

        //create array
        $obj = new ArrayClass;
        $_room_data = $obj->Flip($data);
        //update room details
        foreach ($_room_data as $r_data) {
            $room_data['id'] = $r_data['room_id'];
            $room_data['name'] = $r_data['room_name'];
            $room_data['m_room_type_id'] = $r_data['m_room_type_id'];
            $room_data['total_available'] = $r_data['total_available'];
            $room_data['guest_condition'] = $r_data['guest_condition'];
            $room_data['guest_allowed'] = $r_data['guest_allowed'];
            $room_data['room_image'] = $r_data['room_image'];
            $room_data['description'] = $r_data['room_description'];

            Room::edit($room_data);

            //edit room options
            $room_options = explode(',', $r_data['option']);
            foreach ($room_options as $options) {
                $option['room_id'] = $r_data['room_id'];
                $option['option_id'] = $options;
                $option['value'] = "";
                RoomOption::add($option);
            }
        }
        return redirect('/admin/hotel');
    }

    public function deleteHotel($id){
        Hotel::remove($id);

        return redirect('/admin/hotel');        
    }
}