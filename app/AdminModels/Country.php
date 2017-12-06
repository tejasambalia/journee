<?php

namespace App\AdminModels;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $table = 'm_countries';
    public static function getSingleColumnData($id, $columnName){
        $profileObj = Country::where('id', $id)->select($columnName)->first();
        return $profileObj->$columnName;
    }
}
