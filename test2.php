<?php
require 'includes/includes.inc.php';
connect();
$sql="select * from feedback";
$result=mysql_query($sql);
while ($rows=mysql_fetch_array($result)){
	if(strtotime($rows['date'])==''){
		echo 123;
	}
	echo '</br>';
}
?>