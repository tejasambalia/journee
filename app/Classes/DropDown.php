<?php
namespace App\Classes;

Class DropDown {
	public function DropDown($data, $selectId=null) {
		$optionData = "";
		//$optionData = '<option value="">Select Option</option>';
		if($selectId!=null){			
			foreach ($data as $key => $val) {
				$optionData .= '<option value="'.$key.'"'; 
					if($key==$selectId){
						$optionData.="selected";
					}
					$optionData.='>'.$val.'</option>';
			}
		}
		else{
			foreach ($data as $key => $val) {
				$optionData .= '<option value="'.$key.'">'.$val.'</option>';
			}
		}
		return $optionData;
	}

	public function ObjDropDown($data, $selectId=null){
		$optionData = "";
		//$optionData = '<option value="">Select Option</option>';
		if($selectId!=null){			
			foreach ($data as $_data) {
				$optionData .= '<option value="'.$_data->id.'"'; 
					if($_data->id==$selectId){
						$optionData.="selected";
					}
					$optionData.='>'.$_data->name.'</option>';
			}
		}
		else{
			foreach ($data as $_data) {
				$optionData .= '<option value="'.$_data->id.'">'.$_data->name.'</option>';
			}
		}
		return $optionData;
	}
}