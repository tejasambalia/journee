<?php

namespace App\AdminModels;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;

class City extends Model 
{
    //
    protected $fillable = [
        'id', 'name','audit_created_date', 'audit_updated_date', 'audit_created_by', 'audit_updated_by', 'audit_ip'
    ];

    protected $table = 'm_city';

    public static function findById($id)
    {
        $addressObj = DB::table('m_city')->where('id', $id)->first();
        return $addressObj;
    }

    public static function getSingleColumnData($id, $columnName){
        $profileObj = DB::table('m_city')->where('id', $id)->select($columnName)->first();
        return $profileObj->$columnName;
    }

    public static function get(){
        $data = DB::table('m_city')
            ->select('id', 'name')
            ->get();

        return $data;
    }

    public static function getById($id){
        $data = DB::table('m_city')
            ->select('id', 'name')
            ->where('id', '=', $id)
            ->get();

        return $data;
    }

    public static function add($data){
    	$id = DB::table('m_city')->insertGetId([
            'name'                  => $data['name'],
            'audit_created_date'    => date('Y-m-d H:i:s'),
            'audit_created_by'      => '1',
            'audit_ip'              => Request::ip()
        ]);

        return $id;
    }

    public static function edit($data){
        DB::table('m_city')
            ->where('id', $data['id'])
            ->update([
                'name'                  => $data['name'],
                'audit_updated_date'    => date('Y-m-d H:i:s'),
                'audit_updated_by'      => '1',
                'audit_ip'              => Request::ip()
            ]);
    }

    public static function remove($id){
        DB::table('m_city')
            ->where('id', '=', $id)
            ->delete();
    }
}
