<?php
include 'includes/includes.inc.php';
connect();
$sql="select * from _user where id='".$_GET['id']."'";
$result=mysql_query($sql);
while ($row=mysql_fetch_assoc($result)){
	$array=$row;
	$array['VIP']=1;
	update('_user', $array,'id="'.$_GET['id'].'"');
	do_js_link('houtai1.php');
}
