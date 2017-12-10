<?php

namespace App\AdminModels;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;

class Inquiry extends Model 
{
    //
    protected $fillable = [
        'id', 'name', 'contact', 'email', 'city', 'state', 'description', 'status', 'audit_created_date', 'audit_updated_date', 'audit_created_by', 'audit_updated_by', 'audit_ip'
    ];

    protected $table = 'inquiry';

    public static function findById($id)
    {
        $addressObj = DB::table('inquiry')->where('id', $id)->first();
        return $addressObj;
    }

    public static function getSingleColumnData($addressId, $columnName){
        $profileObj = DB::table('inquiry')->where('id', $addressId)->select($columnName)->first();
        return $profileObj->$columnName;
    }

    public static function get(){
        $data = DB::table('inquiry')
            ->select('id', 'name', 'contact', 'email', 'city', 'state', 'description', 'status', 'audit_created_date', 'audit_updated_date', 'audit_created_by', 'audit_updated_by', 'audit_ip')
            ->get();

        return $data;
    }

    public static function getInquiryList(){
        $data = DB::table('inquiry')
            ->where('status', '=', '0')
            ->orWhere('status', '=', '1')
            ->select('id', 'name', 'contact', 'email', 'city', 'state', 'description', 'status', 'audit_created_date', 'audit_updated_date', 'audit_created_by', 'audit_updated_by', 'audit_ip')
            ->orderBy('id', 'desc')
            ->get();

        return $data;
    }

    public static function getById($id){
        $data = DB::table('inquiry')
            ->select('id', 'name', 'contact', 'email', 'city', 'state', 'description', 'status', 'audit_created_date', 'audit_updated_date', 'audit_created_by', 'audit_updated_by', 'audit_ip')
            ->where('id', '=', $id)
            ->get();

        return $data;
    }

    public static function add($data){
    	$id = DB::table('inquiry')->insertGetId([
            'name'                  => $data['name'],
            'contact' 	            => $data['contact'],
            'email'                 => $data['email'],
            'city'                  => $data['city'],
            'state'                 => $data['state'],
            'description'           => $data['description'],
            'status'                => $data['status'],
            'audit_created_date'    => date('Y-m-d H:i:s'),
            'audit_created_by'      => '1',
            'audit_ip'              => Request::ip()
        ]);

        return $id;
    }

    public static function edit($data){
        DB::table('inquiry')
            ->where('id', $data['id'])
            ->update([
                'name'                  => $data['name'],
                'contact'               => $data['contact'],
                'email'                 => $data['email'],
                'city'                  => $data['city'],
                'state'                 => $data['state'],
                'description'           => $data['description'],
                'status'                => $data['status'],
                'audit_updated_date'    => date('Y-m-d H:i:s'),
                'audit_updated_by'      => '1',
                'audit_ip'              => Request::ip()
            ]);
    }

    public static function remove($id){
        DB::table('inquiry')
            ->where('id', '=', $id)
            ->delete();
    }

    public static function ChangeStatus($id, $status_id)
    {
        DB::table('inquiry')
            ->where('id', $id)
            ->update([
                'status'    => $status_id,
                'audit_updated_date'    => date('Y-m-d H:i:s'),
                'audit_updated_by'      => '1',
                'audit_ip'              => Request::ip()
            ]);
    }

    public static function getStatusName($id){
        $name = "";
        if($id=="0"){
            $name = "New";
        }
        else if($id=="1"){
            $name = "Active";
        }
        else if($id=="2"){
            $name = "Closed";
        }
        return $name;
    }
}
