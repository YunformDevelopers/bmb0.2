<?php
require_once 'includes/includes.inc.php';
if(isset($_GET['id'])){
	$array=$_POST;
	$files=$_FILES;
	$result=save_decoration_to_db($array,$files,$_GET['id']);
	if($result){
		do_js_alert('更改成功，请进入下一步');
		do_js_link('create-3.php?id='.$_GET['id']);
	}
}else{
	do_js_alert("请从正确路径访问该页");
	do_js_link('index.php');
}

