<?php

namespace App\AdminModels;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;

class Users extends Model
{
    //
    protected $fillable = [
        'id', 'name', 'username', 'password', 'role', 'active', 'audit_created_date', 'audit_updated_date', 'audit_created_by', 'audit_updated_by', 'audit_ip'
    ];

    protected $table = 'users_admin';

    public static function findById($id)
    {
        $addressObj = DB::table('users_admin')->where('id', $id)->first();
        return $addressObj;
    }

    public static function getSingleColumnData($addressId, $columnName){
        $profileObj = DB::table('users_admin')->where('id', $addressId)->select($columnName)->first();
        return $profileObj->$columnName;
    }

    public static function get(){
        $data = DB::table('users_admin')
            ->select('id', 'username', 'name', 'password', 'role', 'active')
            ->where('active', '=', '1')
            ->get();

        return $data;
    }

    public static function getById($id){
        $data = DB::table('users_admin')
            ->select('id', 'username', 'name', 'password', 'role', 'active')
            ->where('active', '=', '1')
            ->where('id', '=', $id)
            ->get();

        return $data;
    }

    public static function add($data){
    	DB::table('users_admin')->insert([
    		'username'				=> $data['username'],
            'name'                  => $data['name'],
            'password' 	        	=> $data['password'],
            'role' 	        		=> $data['role'],
            'active' 		        => '1',
            'audit_created_date'    => date('Y-m-d H:i:s'),
            'audit_created_by'      => '1',
            'audit_ip'              => Request::ip()
        ]);

        $id = DB::table('users_admin')
            ->max('id');

        return $id;
    }

    public static function edit($data){
        DB::table('users_admin')
            ->where('id', $data['id'])
            ->update([
            	'username'				=> $data['username'],
                'name'                  => $data['name'],
                'password' 	        	=> $data['password'],
            	'role' 	        		=> $data['role'],
                'audit_updated_date'    => date('Y-m-d H:i:s'),
                'audit_updated_by'      => '1',
                'audit_ip'              => Request::ip()
            ]);
    }

    public static function remove($id){
        DB::table('users_admin')
            ->where('id', '=', $id)
            ->delete();
    }

    public static function inactivate($id){
        DB::table('users_admin')
            ->where('id', $id)
            ->update([
            	'active' 	        	=> '0',
                'audit_updated_date'    => date('Y-m-d H:i:s'),
                'audit_updated_by'      => '1',
                'audit_ip'              => Request::ip()
            ]);
    }
}
