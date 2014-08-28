<?php
require 'includes/includes.inc.php';
if(isset($_GET['action'])&&$_GET['action']=='save'){
	$data=$_COOKIE['qStore'];
	$title_string=explode('ζ', $_COOKIE['qStore']);
	$title=$title_string[0];
	$intro_string=explode('η', $title_string[1]);
	$intro=$intro_string[0];
	$string_tip=explode('θ', $intro_string[1]);
	$string=$string_tip[0];
	$tip=$string_tip[1];
	$id=save_form_to_db($title, $intro, $string, $tip);
	setcookie('qStore',"",time()-1);
 	do_js_link('create-2.php?id='.$id);
}
else if(isset($_POST['action'])&&$_POST['action']=='answer'){
	save_answer_to_db($_COOKIE['answerStore'], $_POST['id']);
 	do_js_alert("感谢您的回答");
 	setcookie('answerStore','',time()-1);
 	//do_js_link('index.php');
}
else if(isset($_GET['action'])&&$_GET['action']=='answer'){
	print_r($_COOKIE);
	save_answer_to_db($_COOKIE['answerStore'], $_GET['id']);
	do_js_alert("感谢您的回答");
	setcookie('answerStore','',time()-1);
	do_js_link('index.php');
}
else if(isset($_GET['action'])&&$_GET['action']=='update'){
	echo $_COOKIE['answerStore'];
	$newanswerStore='';
	$answer_array=explode('δ', $_COOKIE['answerStore']);
	print_r($answer_array);
	for($i=0;$i<count($answer_array);$i++){
		if(strstr($answer_array[$i],'$_FILES')){
			$newname=move_file($i+1);
			$newanswerStore.='$_FILES-'.$newname.'δ';
		}
		else{
			$newanswerStore.=$answer_array[$i];
		}
	}
	echo $newanswerStore;
	exit();
	update_answer_to_db($_COOKIE['answerStore'],$_GET['id']);
	do_js_alert('相关信息已进行更改');
	setcookie('answerStore','',time()-1);
	do_js_link('personal.php');
}