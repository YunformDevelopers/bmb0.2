<?php
include 'includes/includes.inc.php';
if(!isset($_COOKIE['isVIP'])){
	do_js_alert('您不是管理员');
	do_js_link('houtai.php');
}
?>
<table style="width: 100%;height:40px">
	<tr>
		<td style="width:20%">账号ID</td>
		<td style="width:50%">账号邮箱</td>
		<td style="width:10%">权限</td>
		<td style="width:20%">操作</td>
	</tr>
	<?php 
	connect();
	$sql="select * from _user";
	$result=mysql_query($sql);
	while ($rows=mysql_fetch_array($result)){
		if($rows['VIP']==0){
			$level='普通用户';
		}else{
			$level='认证用户';
		}
		echo '<tr>
		<td>'.$rows['id'].'</td>
		<td>'.$rows['username'].'</td>
		<td>'.$level.'</td>
		<td><a href="houtai2.php?id='.$rows['id'].'" style="color:#333;text-decoration:none"><div style="width:66px;height:100%;background:#eee;cursor:pointer">提高权限</div></a></td>
		</tr>';
	}
	?>
</table>