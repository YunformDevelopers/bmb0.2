<?php
include 'includes/includes.inc.php';
if(isset($_GET['data'])){
	connect();
	$sql="select * from question where form_id=".$_GET['data'];
	$result=mysql_query($sql);
	if($rows=mysql_fetch_assoc($result)){
		$array=$rows;
		if($_GET['action']=='off'){
			$array['formstate']=0;
			update('question', $array,'form_id='.$_GET['data']);
		}else{
			$array['formstate']=1;
			update('question', $array,'form_id='.$_GET['data']);
		}
	}
}

