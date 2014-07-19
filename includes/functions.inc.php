<?php
function no_empty(){
	$test=$_POST;
	$array= array();
	unset($array['q10-body']);
	foreach ($test as $question => $value){
		$string = explode("-", $question);
		if(!in_array($string[0], $array)){
			array_push($array, $string[0]);
		}
	}
	if(count($array)!=11||count($array)!=10){
		return false;
	}
	return true;
};
function do_js_alert($string){
	echo "<script>alert('".$string."')</script>";
}
?>