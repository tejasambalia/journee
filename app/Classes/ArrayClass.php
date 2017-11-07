<?php
namespace App\Classes;

Class ArrayClass {
	public function Flip($data) {
		$new_array = array();
		foreach ($data as $outer_key => $outer_value) {
			foreach ($outer_value as $inner_key => $inner_value) {
				$new_array[$inner_key][$outer_key] = $inner_value;
			}
		}
		return $new_array;
	}
}