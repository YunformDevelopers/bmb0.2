<?php
function no_empty(){
	$test=$_POST;
	$array= array();
	unset($array['q10-body']);
	foreach ($test as $question => $value){
		$string = explode("-", $question);
		if(!in_array($string[0], $array)){
			array_push($array, $string[0]);
		}
	}
	if(count($array)!=11||count($array)!=10){
		return false;
	}
	return true;
};
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
	$result = mysql_query($sql);
	$rows = mysql_fetch_assoc($result);
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
	$string=explode('δ', $_COOKIE['qStore']);
	$i=0;
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











?>