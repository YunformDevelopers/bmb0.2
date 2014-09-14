<?php
	     $_clean=array();
		 $_tmp_username = trim($_POST['username']);
		     if(preg_match('/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/',$_tmp_username)){
		         $_clean['username']=$_tmp_username;
			     if($_POST['password']==$_POST['notpassword']){
			         if(!(strlen($_POST['password'])>10||strlen($_POST['password'])<6)){
				         $_clean['password']=$_POST['password'];
						 $db=mysql_connect("localhost","srtp-lzx","srtp-lzx") or die("数据库连接失败");
						 mysql_select_db("srtp-lzx",$db);
						 mysql_query("SET NAMES 'utf8'",$db) or die("数据表连接失败");
						 $sql = "SELECT * from _user where username='{$_clean['username']}'";
						 $result = mysql_query($sql);
						 if(mysql_num_rows($result)==0){
						 $sql = "INSERT INTO _user (username,password) VALUES ('{$_clean['username']}','{$_clean['password']}')";
                         mysql_query($sql) or die(mysql_error());
						 setcookie('srtp-username',$_clean['username']);}
						 else
						 echo "<script>alert('该用户名已被注册'); window.location='index.php'; </script>";
						 ?>
						 <script>
						     alert('注册成功'); 
							 window.location='index.php';
						 </script>
						 <?php
						 
				     }
			     }
			 }
			 else{
			 echo "<script>alert('请输入正确的邮箱地址'); window.location='index.php'; </script>";
			 }
?>