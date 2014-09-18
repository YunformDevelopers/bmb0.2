<?php
require 'includes/includes.inc.php';
$string=explode('-', $_GET['data']);
$question_num=$string[0];
$id=$string[1];
connect();
$result=mysql_query("select * from answer where form_id='".$id."'");
$j=1;
while($rows=mysql_fetch_assoc($result)){
	$string="";
	$answer_array=explode('δ',$rows['answer_string']);
	$answer=explode('γ',$answer_array[intval($question_num)-1]);
	for($i=0;$i<count($answer)-1;$i++){
		$string.=$answer[$i].";";
	}
	echo '<td class="answer-container matrix-td">
 			<p class="a-content">
			<a href="#" title="" id="">';
	echo $string.'
			</a>
 			</p>
 			<p class="a-time">
 				'.$rows["date"].'
			</p>
			</td>';
								} 
								