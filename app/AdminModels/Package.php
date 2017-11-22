<?php

namespace App\AdminModels;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;

class Package extends Model 
{
    //
    protected $fillable = [
        'id', 'name', 'active', 'description', 'price', 'audit_created_date', 'audit_updated_date', 'audit_created_by', 'audit_updated_by', 'audit_ip', 'discount_type', 'discount_amount', 'coupon_id', 'category', 'days', 'nights', 'city', 'upload_image'
    ];

    protected $table = 'package';

    public static function findById($id)
    {
        $addressObj = DB::table('package')->where('id', $id)->first();
        return $addressObj;
    }

    public static function getSingleColumnData($addressId, $columnName){
        $profileObj = DB::table('package')->where('id', $addressId)->select($columnName)->first();
    }

    public static function get(){
        $data = DB::table('package')
            ->select('id', 'name', 'active', 'description', 'price', 'discount_type', 'discount_amount', 'coupon_id', 'category', 'days', 'nights', 'city', 'upload_image')
            ->get();

        return $data;
    }

    public static function getById($id){
        $data = DB::table('package')
            ->select('id', 'name', 'active', 'description', 'price', 'discount_type', 'discount_amount', 'coupon_id', 'category', 'days', 'nights', 'city', 'upload_image')
            ->where('id', '=', $id)
            ->get();

        return $data;
    }

    public static function add($data){
    	$id = DB::table('package')->insertGetId([
            'name'                  => $data['name'],
            'active'                => '1',
            'description'           => $data['description'],
            'price'                 => $data['price'],
            'discount_type'         => $data['discount_type'],
            'discount_amount'       => $data['discount_amount'],
            'coupon_id'             => $data['coupon_id'],
            'category'              => $data['category'],
            'days'                  => $data['days'],
            'nights'                => $data['nights'],
            'city'                  => $data['city'],
            'audit_created_date'    => date('Y-m-d H:i:s'),
            'audit_created_by'      => '1',
            'audit_ip'              => Request::ip()
        ]);

        return $id;
    }

    public static function edit($data){
        DB::table('package')
            ->where('id', $data['id'])
            ->update([
                'name'                  => $data['name'],
                'active'                => '1',
                'description'           => $data['description'],
                'price'                 => $data['price'],
                'discount_type'         => $data['discount_type'],
                'discount_amount'       => $data['discount_amount'],
                'coupon_id'             => $data['coupon_id'],
                'category'              => $data['category'],
                'days'                  => $data['days'],
                'nights'                => $data['nights'],
                'city'                  => $data['city'],
                'audit_updated_date'    => date('Y-m-d H:i:s'),
                'audit_updated_by'      => '1',
                'audit_ip'              => Request::ip()
            ]);
    }

    public static function remove($id){
        DB::table('package')
            ->where('id', '=', $id)
            ->delete();
    }
}
