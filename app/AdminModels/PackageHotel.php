<?php

namespace App\AdminModels;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;

class PackageHotel extends Model 
{
    //
    protected $fillable = [
        'id', 'package_id', 'hotel_id', 'audit_created_date', 'audit_updated_date', 'audit_created_by', 'audit_updated_by', 'audit_ip'
    ];

    protected $table = 'package_hotel';

    public static function findById($id)
    {
        $addressObj = DB::table('package_hotel')->where('id', $id)->first();
        return $addressObj;
    }

    public static function getSingleColumnData($addressId, $columnName){
        $profileObj = DB::table('package_hotel')->where('id', $addressId)->select($columnName)->first();
        return $profileObj;
    }

    public static function getPackageFirstHotel($_package_id){
        $obj = DB::table('package_hotel')->where('package_id', $_package_id)->first();
        return $obj;
    }

    public static function getPackageHotel($_package_id){
        $obj = DB::table('package_hotel')->where('package_id', $_package_id)->get();
        return $obj;
    }

    public static function get(){
        $data = DB::table('package_hotel')
            ->select('id', 'package_id', 'hotel_id')
            ->get();

        return $data;
    }

    public static function getById($id){
        $data = DB::table('package_hotel')
            ->select('id', 'package_id', 'hotel_id')
            ->where('id', '=', $id)
            ->get();

        return $data;
    }

    public static function add($data){
    	$id = DB::table('package_hotel')->insertGetId([
            'package_id'            => $data['package_id'],
            'hotel_id' 	            => $data['hotel_id'],
            'audit_created_date'    => date('Y-m-d H:i:s'),
            'audit_created_by'      => '1',
            'audit_ip'              => Request::ip()
        ]);

        return $id;
    }

    public static function edit($data){
        DB::table('package_hotel')
            ->where('id', $data['id'])
            ->update([
                'hotel_id'              => $data['hotel_id'],
                'audit_updated_date'    => date('Y-m-d H:i:s'),
                'audit_updated_by'      => '1',
                'audit_ip'              => Request::ip()
            ]);
    }

    public static function remove($id){
        DB::table('package_hotel')
            ->where('id', '=', $id)
            ->delete();
    }
}
