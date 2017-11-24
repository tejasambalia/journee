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
use App\AdminModels\RoomType;
use App\AdminModels\Room;
use App\Classes\DropDown;

class RoomController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function type()
    {
        return view('admin.room.type');
    }

    public function addType(){
        return view('admin.room.addType');   
    }

    public function editType($id){
        return view('admin.room.editType')->with(array('id' => $id));
    }

    public function deleteType($id){
        RoomType::remove($id);
        return redirect('/admin/roomType');
    }

    public function handleAddType(Request $request){
        $data = $request->all();
        RoomType::add($data);

        return redirect('/admin/roomType');
    }

    public function handleEditType(Request $request){
        $data = $request->all();
        RoomType::edit($data);

        return redirect('/admin/roomType');
    }

    public function fetchroom(Request $request){
        $data = $request->all();
        $room_data = Room::getDropDownData($data['hotel_id']);

        $obj = new DropDown;
        $return_data = $obj->ObjDropDown($room_data);

        return $return_data;
    }
}