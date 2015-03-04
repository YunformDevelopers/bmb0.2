<?php
require_once 'includes/includes.inc.php';
if(isset($_GET['id'])){
	$array=$_POST;
	$files=$_FILES;
	if(isset($_GET['action'])&&$_GET['action']=='EditSave'){
		EditSave_decoration_to_db($array,$files,$_GET['id']);//返回的是更改的字段数，为了方便，强制将返回值改为一
		$result=1;
	}
	else {
		$result=save_decoration_to_db($array,$files,$_GET['id']);
	}
	if($result){
		do_js_alert('更改成功，请进入下一步');
		if(isset($_GET['action'])&&$_GET['action']=='EditSave'){
			do_js_link('create-3.php?action=edit&id='.$_GET['id']);
		}
		else {
			do_js_link('create-3.php?id='.$_GET['id']);
		}
	}
}else{
	do_js_alert("请从正确路径访问该页");
	do_js_link('index.php');
}

