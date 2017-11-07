<?php
namespace App\Classes;

Class GuestAllowedCondition {
	public function displayFormat($condition, $guest_count) {
		$msg = "";
		if($condition==0){
        	$msg = "More Than ".$guest_count;
        }
        else if($condition==1){
        	$msg = "Less Than ".$guest_count;
        }
        else if($condition==2){
        	$msg = "Equal To ".$guest_count;
        }

        return $msg;
	}
}