<?php

namespace App\AdminModels;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;

class roomOption extends Model 
{
    //
    protected $fillable = [
        'id', 'room_id', 'option_id', 'value','audit_created_date', 'audit_updated_date', 'audit_created_by', 'audit_updated_by', 'audit_ip'
    ];

    protected $table = 'room_option';

    public static function findById($id)
    {
        $addressObj = DB::table('room_option')->where('id', $id)->first();
        return $addressObj;
    }

    public static function getOptionByRoomId($room_id){
        $data = DB::table('room_option')
        ->where('room_id', '=', $room_id)
        ->select('id', 'room_id', 'option_id', 'value','audit_created_date', 'audit_updated_date', 'audit_created_by', 'audit_updated_by', 'audit_ip')
        ->get();
        return $data;
    }

    public static function getSingleColumnData($addressId, $columnName){
        $profileObj = DB::table('room_option')->where('id', $addressId)->select($columnName)->first();
    }

    public static function get(){
        $data = DB::table('room_option')
            ->select('id', 'room_id', 'option_id', 'value','audit_created_date', 'audit_updated_date', 'audit_created_by', 'audit_updated_by', 'audit_ip')
            ->get();

        return $data;
    }

    public static function getById($id){
        $data = DB::table('room_option')
            ->select('id', 'room_id', 'option_id', 'value','audit_created_date', 'audit_updated_date', 'audit_created_by', 'audit_updated_by', 'audit_ip')
            ->where('id', '=', $id)
            ->get();

        return $data;
    }

    public static function add($data){
    	DB::table('room_option')->insert([
            'room_id'              => $data['room_id'],
            'option_id' 	        => $data['option_id'],
            'value'                 => $data['value'],
            'audit_created_date'    => date('Y-m-d H:i:s'),
            'audit_created_by'      => '1',
            'audit_ip'              => Request::ip()
        ]);

        $id = DB::table('room_option')
            ->max('id');

        return $id;
    }

    public static function edit($data){
        DB::table('room_option')
            ->where('id', $data['id'])
            ->update([
                'hotel_id'              => $data['hotel_id'],
                'option_id'             => $data['option_id'],
                'value'                 => $data['value'],
                'audit_updated_date'    => date('Y-m-d H:i:s'),
                'audit_updated_by'      => '1',
                'audit_ip'              => Request::ip()
            ]);
    }

    public static function remove($id){
        DB::table('room_option')
            ->where('id', '=', $id)
            ->delete();
    }
}
