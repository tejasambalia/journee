<?php

namespace App\AdminModels;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;

class Hotel extends Model 
{
    //
    protected $fillable = [
        'id', 'name', 'type', 'state_id', 'city_id', 'audit_created_date', 'audit_updated_date', 'audit_created_by', 'audit_updated_by', 'audit_ip', 'total_rooms', 'available_rooms'
    ];

    protected $table = 'hotel';

    public static function findById($id)
    {
        $addressObj = DB::table('hotel')->where('id', $id)->first();
        return $addressObj;
    }

    public static function getSingleColumnData($addressId, $columnName){
        $profileObj = DB::table('hotel')->where('id', $addressId)->select($columnName)->first();
    }

    public static function get(){
        $data = DB::table('hotel')
            ->select('id', 'name', 'type', 'state_id', 'city_id', 'total_rooms', 'available_rooms')
            ->get();

        return $data;
    }

    public static function getById($id){
        $data = DB::table('hotel')
            ->select('id', 'name', 'type', 'state_id', 'city_id', 'total_rooms', 'available_rooms')
            ->where('id', '=', $id)
            ->get();

        return $data;
    }

    public static function add($data){
    	$id = DB::table('hotel')->insertGetId([
            'name'                  => $data['name'],
            'type' 	                => $data['type'],
            'state_id'              => $data['state_id'],
            'city_id'               => $data['city_id'],
            'audit_created_date'    => date('Y-m-d H:i:s'),
            'audit_created_by'      => '1',
            'audit_ip'              => Request::ip()
        ]);

        // $id = DB::table('hotel')
        //     ->max('id');

        return $id;
    }

    public static function edit($data){
        DB::table('hotel')
            ->where('id', $data['id'])
            ->update([
                'name'                  => $data['name'],
                'type'                  => $data['type'],
                'state_id'              => $data['state_id'],
                'city_id'               => $data['city_id'],
                'audit_updated_date'    => date('Y-m-d H:i:s'),
                'audit_updated_by'      => '1',
                'audit_ip'              => Request::ip()
            ]);
    }

    public static function remove($id){
        DB::table('hotel')
            ->where('id', '=', $id)
            ->delete();
    }

    public static function getDropDownData(){
        $data = DB::table('hotel')
            ->select('id', 'name')
            ->get();

        return $data;
    }
}
