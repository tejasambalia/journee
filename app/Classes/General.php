<?php
namespace App\Classes;

Class General{

    function getUserImagePath($_name){
        $path = '/public/img/'.$_name;
        return $path;
    }

}


?>
