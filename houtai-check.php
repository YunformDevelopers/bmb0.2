<?php
include 'includes/includes.inc.php';
connect();
if(isset($_POST['username'])){
	$sql='select * from _user where username="'.$_POST['username'].'"';
	$result=mysql_query($sql);
	if($rows=mysql_fetch_array($result)){
		if(($_POST['password']==$rows['password'])&&($rows['VIP']==2)){
			setcookie('isVIP','true');
			do_js_alert('欢迎您管理员');
			do_js_link('houtai1.php');
		}
		else {
			do_js_alert("密码输入错误，请重新输入");
		}
	}else {
		do_js_alert('没有这个账号哦');
	}
}