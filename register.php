<?php
	     $_clean=array();
		 $_tmp_username = trim($_POST['username']);
		     if(preg_match('/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/',$_tmp_username)){
		         $_clean['username']=$_tmp_username;
			     if($_POST['password']==$_POST['notpassword']){
			         if(!(strlen($_POST['password'])>10||strlen($_POST['password'])<6)){
				         $_clean['password']=$_POST['password'];
						 connect();
						 $sql = "SELECT * from _user where username='{$_clean['username']}'";
						 $result = mysql_query($sql);
						 if(mysql_num_rows($result)==0){
						 $sql = "INSERT INTO _user (username,password) VALUES ('{$_clean['username']}','{$_clean['password']}')";
                         mysql_query($sql) or die(mysql_error());
						 setcookie('srtp-username',$_clean['username']);
						 setcookie('srtp-password',$_clean['password']);}
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