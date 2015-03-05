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
$eachquestion=explode('$$$que_end', $rows['question_string']);
$question=explode('$$$quetit_end', $eachquestion[0]);
$questionstring='';
for($i=0;$i<count($eachquestion)-1;$i++){
	$question=explode('$$$quetit_end', $eachquestion[$i]);
	if($i==(count($eachquestion)-2)){
		$questionstring.=$question[0];
	}else{
		$questionstring.=$question[0].',';
	}
}
$index=0;
$list[$index++]= $questionstring;
$sql="select * from answer where form_id='".$_GET['id']."'";
$result=mysql_query($sql);
$answerstring='';
while($rows=mysql_fetch_assoc($result)){
	$answerstring='';
	$eachanswer=explode('$$$ans_all', $rows['answer_string']);
	for($i=0;$i<count($eachanswer)-2;$i++){
		$answer=explode('$$$ans_end', $eachanswer[$i]);
		if($i==(count($eachanswer)-3)){
			$answerstring.=$answer[0];
		}else{
			$answerstring.=$answer[0].',';
		}
	}
	$list[$index++]=$answerstring;
}
$newfilename="bmb_xls_formid".$_GET['id'].'.csv';
$fp = fopen($newfilename, 'w');
fwrite($fp,chr(0xEF).chr(0xBB).chr(0xBF));
  foreach ($list as $line) {
      fputcsv($fp, explode(',', $line));
  }
  fclose($fp);
  do_js_link($newfilename);
?>