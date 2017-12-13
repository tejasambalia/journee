<?php

namespace App\AdminModels;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;

class PackageRoom extends Model 
{
    //
    protected $fillable = [
        'id', 'package_hotel_id', 'room_id', 'audit_created_date', 'audit_updated_date', 'audit_created_by', 'audit_updated_by', 'audit_ip'
    ];

    protected $table = 'package_room';

    public static function findById($id)
    {
        $addressObj = DB::table('package_room')->where('id', $id)->first();
        return $addressObj;
    }

    public static function getSingleColumnData($addressId, $columnName){
        $profileObj = DB::table('package_room')->where('id', $addressId)->select($columnName)->first();
    }

    public static function getPackageRoom($_hotel_id){
        $obj = DB::table('package_room')->where('package_hotel_id', $_hotel_id)->get();
        return $obj;
    }

    public static function getPackageFirstRoom($_hotel_id){
        $obj = DB::table('package_room')->where('package_hotel_id', $_hotel_id)->first();
        return $obj;   
    }

    public static function get(){
        $data = DB::table('package_room')
            ->select('id', 'package_hotel_id', 'room_id')
            ->get();

        return $data;
    }

    public static function getById($id){
        $data = DB::table('package_room')
            ->select('id', 'package_hotel_id', 'room_id')
            ->where('id', '=', $id)
            ->get();

        return $data;
    }

    public static function add($data){
    	$id = DB::table('package_room')->insertGetId([
            'package_hotel_id'      => $data['package_hotel_id'],
            'room_id' 	            => $data['room_id'],
            'audit_created_date'    => date('Y-m-d H:i:s'),
            'audit_created_by'      => '1',
            'audit_ip'              => Request::ip()
        ]);

        return $id;
    }

    public static function edit($data){
        DB::table('package_room')
            ->where('id', $data['id'])
            ->update([
                'room_id'               => $data['room_id'],
                'audit_updated_date'    => date('Y-m-d H:i:s'),
                'audit_updated_by'      => '1',
                'audit_ip'              => Request::ip()
            ]);
    }

    public static function remove($id){
        DB::table('package_room')
            ->where('id', '=', $id)
            ->delete();
    }
}
