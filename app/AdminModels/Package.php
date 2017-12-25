<?php

namespace App\AdminModels;

use Illuminate\Database\Eloquent\Model;
use DB;
use Request;

class Package extends Model 
{
    //
    protected $fillable = [
        'id', 'name', 'active', 'description', 'price', 'audit_created_date', 'audit_updated_date', 'audit_created_by', 'audit_updated_by', 'audit_ip', 'discount_type', 'discount_amount', 'coupon_id', 'category', 'days', 'nights', 'city', 'upload_image', 'available_start_date', 'available_end_date', 'zone', 'inclusions', 'exclusions', 'package_section'
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
            ->select('id', 'name', 'active', 'description', 'price', 'discount_type', 'discount_amount', 'coupon_id', 'category', 'days', 'nights', 'city', 'upload_image', 'available_start_date', 'available_end_date', 'zone', 'inclusions', 'exclusions', 'package_section')
            ->get();

        return $data;
    }

    public static function getById($id){
        $data = DB::table('package')
            ->select('id', 'name', 'active', 'description', 'price', 'discount_type', 'discount_amount', 'coupon_id', 'category', 'days', 'nights', 'city', 'upload_image', 'available_start_date', 'available_end_date', 'zone', 'inclusions', 'exclusions', 'package_section')
            ->where('id', '=', $id)
            ->get();

        return $data;
    }

    public static function add($data){
        $add_data = array();

        $add_data['name'] = $data['name'];
        $add_data['active'] = '1';
        $add_data['description'] = $data['description'];
        $add_data['price'] = $data['price'];
        $add_data['discount_type'] = $data['discount_type'];
        $add_data['discount_amount'] = $data['discount_amount'];
        $add_data['coupon_id'] = $data['coupon_id'];
        $add_data['category'] = $data['category'];
        $add_data['days'] = $data['days'];
        $add_data['nights'] = $data['nights'];
        $add_data['city'] = $data['city'];
        $add_data['available_start_date'] = $data['available_start_date'];
        $add_data['available_end_date'] = $data['available_end_date'];
        $add_data['zone'] = $data['zone'];
        $add_data['inclusions'] = $data['inclusions'];
        $add_data['exclusions'] = $data['exclusions'];
        $add_data['audit_created_date'] = date('Y-m-d H:i:s');
        $add_data['audit_created_by'] = '1';
        $add_data['audit_ip'] = Request::ip();
        if(isset($data['package_section']))
            $add_data['package_section'] = $data['package_section'];

    	$id = DB::table('package')->insertGetId($add_data);

        return $id;
    }

    public static function edit($data){
        $edit_data['name'] = $data['name'];
        $edit_data['active'] = '1';
        $edit_data['description'] = $data['description'];
        $edit_data['price'] = $data['price'];
        $edit_data['discount_type'] = $data['discount_type'];
        $edit_data['discount_amount'] = $data['discount_amount'];
        $edit_data['coupon_id'] = $data['coupon_id'];
        $edit_data['category'] = $data['category'];
        $edit_data['days'] = $data['days'];
        $edit_data['nights'] = $data['nights'];
        $edit_data['city'] = $data['city'];
        $edit_data['available_start_date'] = $data['available_start_date'];
        $edit_data['available_end_date'] = $data['available_end_date'];
        $edit_data['zone'] = $data['zone'];
        $edit_data['inclusions'] = $data['inclusions'];
        $edit_data['exclusions'] = $data['exclusions'];
        $edit_data['audit_updated_date'] = date('Y-m-d H:i:s');
        $edit_data['audit_updated_by'] = '1';
        $edit_data['audit_ip'] = Request::ip();
        if(isset($data['package_section']))
            $edit_data['package_section'] = $data['package_section'];

        DB::table('package')
            ->where('id', $data['id'])
            ->update($edit_data);
    }

    public static function remove($id){
        DB::table('package')
            ->where('id', '=', $id)
            ->delete();
    }
    public static function getmaxprice()
    {
        return Package::max('price');
    }
    public static function getmaxdays()
    {
        return Package::max('days');
    }        
    public static function getminprice()
    {
        return Package::min('price');
    }
    public static function getmindays()
    {
        return Package::min('days');
    }        
}
