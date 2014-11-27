<?php
require 'includes/includes.inc.php';
connect();
$array;
$i=0;
$sql='select * from question where form_id="'.$_GET['id'].'"';
$result=mysql_query($sql);
while ($rows=mysql_fetch_assoc($result)){
	$array[$i++]=$rows;
}
echo json_encode($array);
return json_encode($array);