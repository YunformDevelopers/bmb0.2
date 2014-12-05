<?php
include 'includes/includes.inc.php';
connect();
if(isset($_POST['username'])){
	$sql='select * from _user where username="'.$_POST['username'].'"';
	$result=mysql_query($sql);
	while ($rows=mysql_fetch_array($result)){
		if($_POST['password']==$rows['password']&&$rows['VIP']==2){
			setcookie('isVIP','true');
			do_js_link('houtai1.php');
		}
		else {
			do_js_alert("密码输入错误，请重新输入");
		}
	}
}
?>
<form method="post" action="houtai.php">
	<div style="margin:200px 0 0 0;text-align:center">
		<input placeholder="输入管理员账号" type="text" name="username" style="width: 500px;height:50px;margin:0 auto;background:#fff"/>
	</div>
	<div style="text-align:center">
		<input placeholder="输入管理员密码" type="password" name="password" style="width: 500px;height:50px;margin:10px auto"/>
	</div>
	<div style="text-align:center">
		<input type="submit" value="提交" style="width: 500px;height:50px;margin:10px auto"/>
	</div>
</form>
