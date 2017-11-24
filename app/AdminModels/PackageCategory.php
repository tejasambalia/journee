<?php

namespace App\AdminModels;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;

class PackageCategory extends Model 
{
    //
    protected $fillable = [
        'id', 'name', 'description', 'active', 'audit_created_date', 'audit_updated_date', 'audit_created_by', 'audit_updated_by', 'audit_ip'
    ];

    protected $table = 'm_package_category';

    public static function findById($id)
    {
        $addressObj = DB::table('m_package_category')->where('id', $id)->first();
        return $addressObj;
    }

    public static function getSingleColumnData($addressId, $columnName){
        $profileObj = DB::table('m_package_category')->where('id', $addressId)->select($columnName)->first();
        return $profileObj->$columnName;
    }

    public static function get(){
        $data = DB::table('m_package_category')
            ->select('id', 'name', 'description')
            ->where('active', '=', '1')
            ->get();

        return $data;
    }

    public static function getById($id){
        $data = DB::table('m_package_category')
            ->select('id', 'name', 'description')
            ->where('active', '=', '1')
            ->where('id', '=', $id)
            ->get();

        return $data;
    }

    public static function add($data){
    	DB::table('m_package_category')->insert([
            'name'                  => $data['name'],
            'description' 	        => $data['description'],
            'active' 		        => '1',
            'audit_created_date'    => date('Y-m-d H:i:s'),
            'audit_created_by'      => '1',
            'audit_ip'              => Request::ip()
        ]);

        $id = DB::table('m_package_category')
            ->max('id');

        return $id;
    }

    public static function edit($data){
        DB::table('m_package_category')
            ->where('id', $data['id'])
            ->update([
                'name'                  => $data['name'],
                'description'           => $data['description'],
                'audit_updated_date'    => date('Y-m-d H:i:s'),
                'audit_updated_by'      => '1',
                'audit_ip'              => Request::ip()
            ]);
    }

    public static function remove($id){
        DB::table('m_package_category')
            ->where('id', '=', $id)
            ->delete();
    }
}
