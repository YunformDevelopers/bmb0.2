<?php
require 'includes/includes.inc.php';
if(isset($_GET['action'])&&$_GET['action']=='save'){
	save_form_to_db($_COOKIE['qStore']);
	do_js_link('reform.php');
}
else if(isset($_POST['action'])&&$_POST['action']=='answer'){
	$string = change_to_string();
	save_answer_to_db($string, $_POST['id']);
}