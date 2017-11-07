<?php

namespace App\AdminModels;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;

class RoomType extends Model 
{
    //
    protected $fillable = [
        'id', 'name', 'active', 'audit_created_date', 'audit_updated_date', 'audit_created_by', 'audit_updated_by', 'audit_ip'
    ];

    protected $table = 'm_room_type';

    public static function getSingleColumnData($addressId, $columnName){
        $profileObj = DB::table('m_room_type')->where('id', $addressId)->select($columnName)->first();
        return $profileObj->$columnName;
    }

    public static function get(){
        $data = DB::table('m_room_type')
            ->select('id', 'name')
            ->where('active', '=', '1')
            ->get();

        return $data;
    }

    public static function getById($id){
        $data = DB::table('m_room_type')
            ->select('id', 'name')
            ->where('active', '=', '1')
            ->where('id', '=', $id)
            ->get();

        return $data;
    }

    public static function add($data){
    	DB::table('m_room_type')->insert([
            'name'                  => $data['name'],
            'active' 		        => '1',
            'audit_created_date'    => date('Y-m-d H:i:s'),
            'audit_created_by'      => '1',
            'audit_ip'              => Request::ip()
        ]);

        $id = DB::table('m_room_type')
            ->max('id');

        return $id;
    }

    public static function edit($data){
        DB::table('m_room_type')
            ->where('id', $data['id'])
            ->update([
                'name'                  => $data['name'],
                'audit_updated_date'    => date('Y-m-d H:i:s'),
                'audit_updated_by'      => '1',
                'audit_ip'              => Request::ip()
            ]);
    }

    public static function remove($id){
        DB::table('m_room_type')
            ->where('id', '=', $id)
            ->delete();
    }
}
