<?php
		include 'includes/includes.inc.php';
	     $_clean=array();
		 $_tmp_username = trim($_POST['username']);
		     if(preg_match('/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/',$_tmp_username)){
		         $_clean['username']=$_tmp_username;
			     if($_POST['password']==$_POST['notpassword']){
			         if(!(strlen($_POST['password'])>16||strlen($_POST['password'])<6)){
				         $_clean['password']=$_POST['password'];
						 connect();
						 $sql = "SELECT * from _user where username='{$_clean['username']}'";
						 $result = mysql_query($sql);
						 if(!$rows=mysql_fetch_array($result)){
							 $sql = "INSERT INTO _user (username,password) VALUES ('{$_clean['username']}','{$_clean['password']}')";
	                         mysql_query($sql) or die(mysql_error());
							 setcookie('srtp-username',$_clean['username']);
							 do_js_alert('注册成功');
							 do_js_link('index.php');
						 }else{
						 	do_js_alert('该用户名已被注册');
						 	do_js_link('index.php');
						 }
				     }else{
				     	do_js_alert('密码必须在6到16位之间');
				     	do_js_link('index.php');
			     	}
			     }else {
			     	do_js_alert('输入的两次密码要一致哦');
			     	do_js_link('index.php');
			     }
			 }
			 else{
			 	do_js_alert('请输入正确的邮箱地址');
			 	do_js_link('index.php');
			 }
?>