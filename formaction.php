<?php
require 'includes/includes.inc.php';
if(isset($_GET['action'])&&$_GET['action']=='save'){
	$data=$_COOKIE['qStore'];
	$title_string=explode('ζ', $_COOKIE['qStore']);
	$title=$title_string[0];
	$id=save_form_to_db($_COOKIE['qStore'],$title);
	setcookie('qStore',"",time()-1);
 	do_js_link('reform.php?id='.$id.'&data='.$data);
}
else if(isset($_POST['action'])&&$_POST['action']=='answer'){
	save_answer_to_db($_COOKIE['answerStore'], $_POST['id']);
 	do_js_alert("感谢您的回答");
 	setcookie('answerStore','',time()-1);
 	do_js_link('index.php');
}
else if(isset($_GET['action'])&&$_GET['action']=='answer'){
	print_r($_COOKIE);
	save_answer_to_db($_COOKIE['answerStore'], $_GET['id']);
	do_js_alert("感谢您的回答");
	setcookie('answerStore','',time()-1);
	do_js_link('index.php');
}
else if(isset($_GET['action'])&&$_GET['action']=='update'){
	update_answer_to_db($_COOKIE['answerStore'],$_GET['id']);
	do_js_alert('相关信息已进行更改');
	setcookie('answerStore','',time()-1);
	do_js_link('personal.php');
}