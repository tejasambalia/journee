<?php

namespace App\AdminModels;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;

class PackageSection extends Model 
{
    //
    protected $fillable = [
        'id', 'name', 'active', 'audit_created_date', 'audit_updated_date', 'audit_created_by', 'audit_updated_by', 'audit_ip'
    ];

    protected $table = 'm_package_section';

    public static function findById($id)
    {
        $addressObj = DB::table('m_package_section')->where('id', $id)->first();
        return $addressObj;
    }

    public static function getSingleColumnData($addressId, $columnName){
        $profileObj = DB::table('m_package_section')->where('id', $addressId)->select($columnName)->first();
    }

    public static function get(){
        $data = DB::table('m_package_section')
            ->select('id', 'name', 'active')
            ->get();

        return $data;
    }

    public static function getById($id){
        $data = DB::table('m_package_section')
            ->select('id', 'name', 'active')
            ->where('id', '=', $id)
            ->get();

        return $data;
    }

    public static function add($data){
    	$id = DB::table('m_package_section')->insertGetId([
            'name'      			=> $data['name'],
            'active' 	            => $data['active'],
            'audit_created_date'    => date('Y-m-d H:i:s'),
            'audit_created_by'      => '1',
            'audit_ip'              => Request::ip()
        ]);

        return $id;
    }

    public static function edit($data){
        DB::table('m_package_section')
            ->where('id', $data['id'])
            ->update([
                'name'      			=> $data['name'],
            	'active' 	            => $data['active'],
                'audit_updated_date'    => date('Y-m-d H:i:s'),
                'audit_updated_by'      => '1',
                'audit_ip'              => Request::ip()
            ]);
    }

    public static function remove($id){
        DB::table('m_package_section')
            ->where('id', '=', $id)
            ->delete();
    }
}
