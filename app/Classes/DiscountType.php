<?php
namespace App\Classes;

Class DiscountType {
	public function name($condition) {
		$msg = "";
		if($condition==1){
        	       $msg = "%";
                }
                else if($condition==2){
        	       $msg = "Flat";
                }

                return $msg;
	}
}