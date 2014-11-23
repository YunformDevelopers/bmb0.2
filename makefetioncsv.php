<?php
require 'includes/includes.inc.php';
connect();
// $list = array (
// 		'aaa,bbb,ccc',
// 		'123,456,789',
// 		'aaa,bbb,ccc'
// );
$sql="select * from question where form_id='".$_GET['id']."'";
$result=mysql_query($sql);
$rows=mysql_fetch_assoc($result);
$eachquestion=explode('δ', $rows['question_string']);
$question=explode('α', $eachquestion[0]);
$questionstring='';
$localid=-1;
for($i=0;$i<count($eachquestion)-1;$i++){
	$question=explode('α', $eachquestion[$i]);
	$type=explode('β', $question[1]);
	$pattern='/logic-name/';
	if(preg_match($pattern,$type[0])){
		$questionstring='姓名,手机,手机2,办公电话号码,家庭电话号码,公司住址,电子邮件';
		$localid=$i;
	}
}
$index=0;
$list[$index++]= $questionstring;
$sql="select * from answer where form_id='".$_GET['id']."'";
$result=mysql_query($sql);
$answerstring='';
while($rows=mysql_fetch_assoc($result)){
	$answerstring='';
	$array=array();
	for($i=0;$i<7;$i++){
		$array[$i]='';
	}
	$eachanswer=explode('δ', $rows['answer_string']);
	for($i=0;$i<count($eachanswer)-2;$i++){
		$answer=explode('γ', $eachanswer[$i]);
		//姓名
		if($i==$localid){
			$array[0]=$answer[0];
		}
		//电话
		if($i==($localid+4)){
			$array[1]=$answer[0];
		}
		//住址
		if($i==($localid+3)){
			$array[5]=$answer[0];
		}
		//邮箱
		if($i==($localid+5)){
			$array[6]=$answer[0];
		}
		/* if($i==(count($eachanswer)-3)){
			$answerstring.=$answer[0];
		}else{
			$answerstring.=$answer[0].',';
		} */
		
	}
	for($i=0;$i<7;$i++){
		if($i!=6){
			$answerstring.=$array[$i].',';
		}else if($i==6){
			$answerstring.=$array[$i];
		}
	}
	$list[$index++]=$answerstring;
}
$newfilename="bmb_xls_fetionid".$_GET['id'].'.csv';
$fp = fopen($newfilename, 'w');
fwrite($fp,chr(0xEF).chr(0xBB).chr(0xBF));
  foreach ($list as $line) {
      fputcsv($fp, explode(',', $line));
  }
  fclose($fp);
  do_js_link($newfilename);
?>