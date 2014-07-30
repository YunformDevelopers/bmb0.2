<?php
function do_js_alert($string){
	echo "<script>alert('".$string."')</script>";
}
function connect(){
	$link=mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD) or die('连接数据库出错');
	mysql_select_db(DB_DBNAME) or die('选择数据库出错');
	mysql_set_charset(DB_CHARSET) or die('设置编码出错');
	return $link;
}
function insert($table,$array){
	$keys = join(",", array_keys($array));
	$values ="'".join("','",array_values($array))."'";
	$string="insert into {$table} ($keys) values ({$values})";
	$result=mysql_query($string) or die(mysql_error());
	return $result;
}
function update($table,$array,$where=null){
	//update sdad set name="12312" where asd ='dqwd'
	$str=null;
	foreach($array as $key =>$value){
		if($str==null){
			$sep="";
		}else{
			$sep=",";
		}
		$str.=$sep.$key."='".$value."'";
	}
	$query="update {$table} set {$str} ".($where==null?null:"where".$where);
	mysql_query($query);
	return mysql_affected_rows();
}
function delete($table,$where=null){
	$where =($where==null?null:"where ".$where);
	$query = "delete from {$table} {$where}";
	mysql_query($query);
	return mysql_affected_rows();
}
function fetchOne($sql){
	$result = mysql_query($sql) or die(mysql_error());
	$rows = mysql_fetch_assoc($result) or die(mysql_error());
	return $rows;
}
function fetchAll($sql){
	$result = mysql_query($sql);
	$rows=array();
	while (@$row=mysql_fetch_assoc($result)){
		array_push($rows, $row);
	}
	return $rows;
} 
function create_to_db(){
	$link=mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD) or die('连接数据库出错');
	mysql_select_db('srtp-lzx') or die('选择数据库出错');
	mysql_set_charset(DB_CHARSET) or die('设置编码出错');
	if(isset($_COOKIE['qStore'])){
		$string=explode('δ', $_COOKIE['qStore']);
	    for($i=0;$i<count($string)-1;$i++){
		    $explode1 = explode('α', $string[$i]);
			$question = $explode1[0];
			$explode2 = explode('β', $explode1[1]);
			$type=$explode2[0];
			$choice=explode('γ', $explode2[1]);
			echo '<div id="" class="q1 q-field '.$type.'">';
				echo '<div class="q-number"><span>'.($i+1).'</span></div>';
				echo '<div class="q-whole">';
				if($type=="free-multichoice"){
					echo '<div class="q-title">'.$question.'(多选)</div>';
				}
				else {
					echo '<div class="q-title">'.$question.'</div>';
				}
					echo '<div class="q-alternative">*</div>';
// 					if($type=="free-multichoice"){
// 						echo '<div class="q-alternative">*</div>';
// 					}
				echo '<div class="q-body">';
				if($type=="free-multichoice")
					for($j=0;$j<count($choice)-1;$j++){
						echo '<label><input name="q'.($i+1).'-'.$choice[$j].'" type="checkbox" />'.$choice[$j].'</label>';
					}
				if($type=="free-singlechoice")
					for($j=0;$j<count($choice)-1;$j++){
						echo '<label><input name="q'.($i+1).'-body" type="radio" />'.$choice[$j].'</label>';
					}
				if($type=="free-multiline"){
					echo '<textarea name="q'.($i+1).'-body" class="body edit" ></textarea>';
				}
				echo '</div>';
				echo '</div>';
			echo '</div>';
			}
    }
}

function save_form_to_db($string){
	connect();
	$array['question_string'] = $string;
	$array['username']=$_COOKIE['srtp-username'];
	date_default_timezone_set("Asia/Shanghai");
	$array['Date'] = date("Y-m-d h:i:s");
	insert('question', $array);
	$sql="select * from question where Date ='{$array['Date']}'";
	$result=fetchOne($sql);
	return $result['form_id'];
}

function save_answer_to_db($string,$id){
	connect();
	$array['form_id']=$id;
	$array['answer_string'] = $string;
	$array['username']=$_COOKIE['srtp-username'];
	date_default_timezone_set("Asia/Shanghai");
	$array['date'] = date("Y-m-d h:i:s");
	insert('answer', $array);
}

function do_js_link($url){
	echo "<script>location.href = '$url';</script>";
}

function get_id(){
}

function change_to_string(){
	if(isset($_GET['action']) && $_GET['action']=='submit'){
		connect();
		$num=1;
		$answer_array = null;
		$i=0;
		$old = null;
		foreach ($_POST as $question => $answers){
			$new = explode("-", $question);
			if($old == $new[0]){
				if(isset($new[2])&&$new[2]=='note'){
					$answer_array[$num][$i++]=$answers;
					$old = $new[0];
					continue;
				}
				else{
					$answer_array[$num][$i++]=$question;
					$old = $new[0];
					continue;
				}
			}
			else{
				$i=0;
				if($old==null){
					if($answers=="on"){
						if(isset($new[2])&&$new[2]=='note'){
							$answer_array[1][$i++]=$answers;
							$old = $new[0];
						}
						else{
							$answer_array[1][$i++]=$question;
							$old = $new[0];
						}
					}
					else{
						$answer_array[1][$i++]=$answers;
						$old = $new[0];
					}
				}
				else{
					if($answers=="on"){
						$num++;
						$answer_array[$num][$i++]=$question;
						$old = $new[0];
					}
					else{
						$num++;
						$answer_array[$num][$i++]=$answers;
						$old = $new[0];
					}
				}
			}
		}
		$submit = null;
		$i=1;
		$b=1;
		$string = null;
		foreach($answer_array as $answers){
			if(count($answers)>1){
				foreach ($answers as $value){
					$string .= $value.'γ';
				}
			}
			else{
				$string = $answers[0];
			}
			$submit['q'.$b++]= $string;
			$string = null;
		}
		$answer_string = null;
		foreach ($submit as $question => $value){
			$answer_string .=$question."β".$value."α";
		}
		return $answer_string;
	}
	
}











?>