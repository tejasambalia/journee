<?php

namespace App\AdminModels;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;

class Room extends Model 
{
    //
    protected $fillable = [
        'id', 'hotel_id', 'name', 'm_room_type_id', 'total_available', 'booked', 'remaining', 'guest_condition', 'guest_allowed', 'room_image','audit_created_date', 'audit_updated_date', 'audit_created_by', 'audit_updated_by', 'audit_ip', 'description'
    ];

    protected $table = 'room';

    public static function findById($id)
    {
        $addressObj = DB::table('room')->where('id', $id)->first();
        return $addressObj;
    }

    public static function getByHotelId($hotel_id){
        $data = DB::table('room')
            ->select('id', 'hotel_id', 'name', 'm_room_type_id', 'total_available', 'booked', 'remaining', 'guest_condition', 'guest_allowed', 'room_image','audit_created_date', 'audit_updated_date', 'audit_created_by', 'audit_updated_by', 'audit_ip', 'description')
            ->where('hotel_id', '=', $hotel_id)
            ->get();

        return $data;
    }

    public static function getSingleColumnData($addressId, $columnName){
        $profileObj = DB::table('room')->where('id', $addressId)->select($columnName)->first();
        return $profileObj;
    }

    public static function get(){
        $data = DB::table('room')
            ->select('id', 'hotel_id', 'name', 'm_room_type_id', 'total_available', 'booked', 'remaining', 'guest_condition', 'guest_allowed', 'room_image','audit_created_date', 'audit_updated_date', 'audit_created_by', 'audit_updated_by', 'audit_ip', 'description')
            ->get();

        return $data;
    }

    public static function getById($id){
        $data = DB::table('room')
            ->select('id', 'hotel_id', 'name', 'm_room_type_id', 'total_available', 'booked', 'remaining', 'guest_condition', 'guest_allowed', 'room_image','audit_created_date', 'audit_updated_date', 'audit_created_by', 'audit_updated_by', 'audit_ip', 'description')
            ->where('id', '=', $id)
            ->get();

        return $data;
    }

    public static function add($data){
    	DB::table('room')->insert([
            'hotel_id'              => $data['hotel_id'],
            'name' 	                => $data['name'],
            'description'           => $data['description'],
            'm_room_type_id'        => $data['m_room_type_id'],
            'total_available'       => $data['total_available'],
            'booked'                => '0',
            'remaining'             => $data['total_available'],
            'guest_condition'       => $data['guest_condition'],
            'guest_allowed'         => $data['guest_allowed'],
            'room_image'            => $data['room_image'],
            'audit_created_date'    => date('Y-m-d H:i:s'),
            'audit_created_by'      => '1',
            'audit_ip'              => Request::ip()
        ]);

        $id = DB::table('room')
            ->max('id');

        return $id;
    }

    public static function edit($data){
        DB::table('room')
            ->where('id', $data['id'])
            ->update([
                'name'                  => $data['name'],
                'description'           => $data['description'],
                'm_room_type_id'        => $data['m_room_type_id'],
                'total_available'       => $data['total_available'],
                'guest_condition'       => $data['guest_condition'],
                'guest_allowed'         => $data['guest_allowed'],
                'audit_updated_date'    => date('Y-m-d H:i:s'),
                'audit_updated_by'      => '1',
                'audit_ip'              => Request::ip()
            ]);
    }

    public static function remove($id){
        DB::table('room')
            ->where('id', '=', $id)
            ->delete();
    }

    public static function getRoomType($hotel_id){
        $data = DB::table('room')
            ->select('m_room_type_id')
            ->where('hotel_id', '=', $hotel_id)
            ->get();

        return $data;
    }

    public static function getDropDownData($hotel_id){
        $data = DB::table('room')
            ->select('id', 'name')
            ->where('hotel_id', '=', $hotel_id)
            ->get();

        return $data;
    }
}
