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
	$query="update {$table} set {$str} ".($where==null?null:"where ".$where);
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
function create_to_db($array){
		$string=explode('δ', $array['question_string']);
		echo '<div id="form-field">
				<div id="form-title">
					<h3>'.$array['form_title'].'</h3>
				</div>
				<div id="form-intro" >
	            	'.$array['form_intro'].'
	        	</div>
	        	<ul id="form-body">
	        		<form enctype="multipart/form-data" method="post" action="formaction.php?action=answer&id='.$_GET['id'].'">';
	    				for($i=0;$i<count($string)-1;$i++){
					    $explode1 = explode('α', $string[$i]);
						$question = $explode1[0];
						$explode2 = explode('β', $explode1[1]);
						$type=$explode2[0];
						$choice=explode('γ', $explode2[1]);
						$re=end($choice);
						if($re=='required'){
							$re='required="required"';
						}else{
							$re='';
						}
				echo '<li class="q'.($i+1).' q-field '.$type.'">
						<div class="q-number"><span>'.($i+1).'</span></div>
						<div class="q-whole">';
				if($type=="free-multichoice"){
					echo '<div class="q-title">'.$question.'(多选)</div>';
				}
				else {
					echo '<div class="q-title">'.$question.'</div>';
				}
					if($re){
						echo '<div class="q-alternative">*</div>';
					}
				echo '<div class="q-body">';
				if($type=="free-multichoice")
					for($j=0;$j<count($choice)-1;$j++){
						echo '<label><input name="q'.($i+1).'-'.$choice[$j].'" type="checkbox" '.$re.' value="'.$choice[$j].'"/>'.$choice[$j].'</label>';
					}
				if($type=="free-singlechoice")
					for($j=0;$j<count($choice)-1;$j++){
						echo '<label><input name="q'.($i+1).'-body" type="radio" '.$re.' value="'.$choice[$j].'"/>'.$choice[$j].'</label>';
					}
				if($type=="logic-sex")
					for($j=0;$j<count($choice)-1;$j++){
						echo '<label><input name="q'.($i+1).'-body" type="radio" '.$re.' value="'.$choice[$j].'"/>'.$choice[$j].'</label>';
					}
				if($type=="free-multiline"){
					echo '<textarea name="q'.($i+1).'-body" class="body edit" '.$re.' ></textarea>';
				}
				if($type=="free-singleline"){
					echo '<input type="text" name="q'.($i+1).'-body" class="body edit" '.$re.' />';
				}
				if($type=="logic-name"){
					echo '<input type="text" name="q'.($i+1).'-body" class="body edit" '.$re.' />';
				}
				if($type=="logic-studentID"){
					echo '<input type="number" name="q'.($i+1).'-body" class="body edit" '.$re.' />';
				}
				if($type=="logic-address"){
					echo '<input type="text" name="q'.($i+1).'-body" class="body edit" '.$re.' />';
				}
				if($type=="logic-tel"){
					echo '<input type="tel" name="q'.($i+1).'-body" class="body edit" '.$re.' />';
				}
				if($type=="logic-email"){
					echo '<input type="email" name="q'.($i+1).'-body" class="body edit" '.$re.' />';
				}
				if($type=="logic-class"){
					echo '<input type="text" name="q'.($i+1).'-body" class="body edit" '.$re.' />';
				}
				if($type=="free-file"){
					echo '<input type="file" name="q'.($i+1).'-body" class="body edit" '.$re.' ></input>';
					//echo '<input type="file" name="q'.($i+1).'-body" class="body edit" ></input>';
				}
				echo '</div>';
				echo '</div>';
			echo '</li>';
			}
			echo '<div id="form-tip">
						<p class="title edit raw" contentEditable="true" rows="1">'.$array['form_tip'].'</p>
				</div>
					<input id="submit" class="btn red" name="submit" type="submit" value="提交" onClick="SetFillCookie(); SetAnswerCookie();"/>
					</form>
				</ul>
			</div>';
    }

function save_form_to_db($title,$intro,$string,$tip){
	connect();
	$array['question_string'] = $string;
	$array['username']=$_COOKIE['srtp-username'];
	$array['form_title']=$title;
	date_default_timezone_set("Asia/Shanghai");
	$array['Date'] = date("Y-m-d h:i:s");
	$array['form_intro']=$intro;
	$array['form_tip']=$tip;
	$array['click_times']=0;
	$array['answer_times']=0;
	insert('question', $array);
	$sql="select * from question where Date ='{$array['Date']}'";
	$result=fetchOne($sql);
	return $result['form_id'];
}

function save_answer_to_db($string,$id){
	echo $string;
	connect();
	$array['form_id']=$id;
	$array['answer_string'] = $string;
	$array['username']=$_COOKIE['srtp-username'];
	date_default_timezone_set("Asia/Shanghai");
	$array['date'] = date("Y-m-d h:i:s");
	$array['from_where']=$_COOKIE['fromwhere'];
	insert('answer', $array);
}

function do_js_link($url){
	echo "<script>location.href = '$url';</script>";
}

function update_answer_to_db($string,$id){
	connect();
	$array['answer_string'] = $string;
	date_default_timezone_set("Asia/Shanghai");
	$array['date'] = date("Y-m-d h:i:s");
	update('answer', $array," form_id='".$id."' and username='".$_COOKIE['srtp-username']."'");
}

function answer_file($data,$file,$amount){
	for($i=1;$i<$amount;$i++){
		
	}
	foreach ($data as $question=>$answer){
		$num_q=explode('-', $question);
		$num=explode('q',$num_q[0]);
		if($i==$num[1]){
			$i++;
			echo $i;
			continue;
		}
		else{
			move_file($file,$j);
			$j++;
		}
	}
	exit();
}

function move_file($index){
	$name=$_FILES['q'.$index.'-body']['name'];
	$type=$_FILES['q'.$index.'-body']['type'];
	$tmp_name=$_FILES['q'.$index.'-body']['tmp_name'];
	$error=$_FILES['q'.$index.'-body']['error'];
	$size=$_FILES['q'.$index.'-body']['size'];
	$ext=getExt($name);
	$newname=getuniname().'.'.$ext;
	$destination="uploads/".$newname;
	if(is_uploaded_file($tmp_name)){
		move_uploaded_file($tmp_name, $destination);
	}
	return $newname;
}

function getuniname(){
	return md5(uniqid(microtime(true),true));
}

function getExt($name){
	$a=explode('.', $name);
	return strtolower(end($a));
}

function save_decoration_to_db($array,$files,$form_id){
	print_r($array);
	$save_array['form_id']=$form_id;
	$save_array['form_expire_time'] =$array['form-expire-time'];
	$save_array['form_number_limit'] = $array['form-number-limit'];
	$save_array['form_tag']=$array['form-tag'];
	if($files['bg']['name']!=''){
		$name=$files['bg']['name'];
		$type=$files['bg']['type'];
		$tmp_name=$files['bg']['tmp_name'];
		$error=$files['bg']['error'];
		$size=$files['bg']['size'];
		$ext=getExt($name);
		$newname=getuniname().'.'.$ext;
		$destination="uploads/".$newname;
		if(is_uploaded_file($tmp_name)){
			move_uploaded_file($tmp_name, $destination);
		}
		$save_array['bg']=$newname;
	}else{
		$save_array['bg']='';
	}
	connect();
	return insert('decoration', $save_array);
}

function make_short_url($url){
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL,'http://dwz.cn/create.php');
	curl_setopt($ch,CURLOPT_POST,true);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	$data=array('url'=>$url);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
	$strRes=curl_exec($ch);
	curl_close($ch);
	$arrResponse=json_decode($strRes,true);
	if($arrResponse['status']!=0)
	{
		echo 'ErrorCode: ['.$arrResponse['status'].'] ErrorMsg: ['.iconv('UTF-8','GBK',$arrResponse['err_msg'])."]<br/>";
		return 0;
	}
	echo $arrResponse['tinyurl'];
}

function make_qrcode($url){
	$errorCorrectionLevel = "L";
	$matrixPointSize = "4";
	QRcode::png($url, false, $errorCorrectionLevel, $matrixPointSize);
}

function make_form_card($row,$row2){
	if($row2['bg']==''){
		$bg='images/5.jpg';
	}else{
		$bg='uploads/'.$row2['bg'];
	}
	$old=strtotime($row2['form_expire_time']);
	date_default_timezone_set("Asia/Shanghai");
	$now=strtotime(date("Y-m-d h:i:s"));
	$seconds=$old-$now;
	$days=$seconds/(24*60*60);
	$day=intval($days);
	$hours=($days-$day)*24;
	$hour=intval($hours);
	$minutes=($hours-$hour)*24;
	$minute=intval($minutes);
	echo '<div class="section-col" >';
	echo '<div class="card newest" >';
	echo '<a href="reform.php?id='.$row['form_id'].'&data='.$row['question_string'].'">';
	echo '<div class="img-holder">
									<div class="fader">
										<img src="'.$bg.'" alt="" />
									</div>
									<div class="form-name">
										'.$row['form_title'].'
									</div>
									<div class="img-counter">
										<div class="counter">';
											if($day>=0) echo '<span class="time-left">还有'.$day.'天'.$hour.'小时'.$minute.'分钟</span>';
	                            			else echo '<span class="time-left">已到期</span>';
											echo '<span class="written">'.$row['click_times'].'次</span>
										</div>
									</div>
								</div>
								</a>
								</div>
								</div>';
}

function getMajorColor($url){
	$i = imagecreatefromjpeg($url);
	$rTotal=0;
	$gTotal=0;
	$bTotal=0;
	$total=0;
	for ($x=0;$x<imagesx($i);$x++) {
		for ($y=0;$y<imagesy($i);$y++) {
			$rgb = imagecolorat($i,$x,$y);
			$r   = ($rgb >> 16) & 0xFF;
			$g   = ($rgb >> 8)  & 0xFF;
			$b   = $rgb & 0xFF;

			$rTotal += $r;
			$gTotal += $g;
			$bTotal += $b;
			$total++;
		}
	}

	$rAverage = dechex(round($rTotal/$total));
	$gAverage = dechex(round($gTotal/$total));
	$bAverage = dechex(round($bTotal/$total));
	$color='0x'.$rAverage.$gAverage.$bAverage;
	return $color;
}

function getContrastColor($color){
	$red=hexdec(substr($color, 2,2));
	$green=hexdec(substr($color,4,2));
	$blue=hexdec(substr($color,6,2));
	$red=255-$red;
	$green=255-$green;
	$blue=255-$blue;
	$red=to_twobit(dechex($red));
	$green=to_twobit(dechex($green));
	$blue=to_twobit(dechex($blue));
	$co='0x'.$red.$green.$blue;
	return $co;
}

function to_twobit($string){
	if(strlen($string)==1){
		return '0'.$string;
	}
	return $string;
}
function getAllfill($id){
	connect();
	//拿到第一天的
	$sql="select * from question where form_id=".$id;
	$result=mysql_query($sql);
	while ($row=mysql_fetch_array($result)){
		$arg1=explode(' ', $row['Date']);
	}
	$date['first']=$arg1[0];
	//拿到今天的
	date_default_timezone_set("Asia/Shanghai");
	$date['today']=date("Y-m-d");
	//算出其中多少天
	$date1 = strtotime($date['first']);
	$date2 = strtotime($date['today']);
	$days = ceil(abs($date1 - $date2)/86400);
	//从第一天开始一直往后取
	for($i=0;$i<=$days;$i++){
		$date_number[$i]=0;
	}
	$sql="select * from answer where form_id=".$id;
	$result=mysql_query($sql);
	$array['cc98']=0;
	$array['renren']=0;
	$array['other']=0;
	$array['newpage']=0;
	$array['bqr']=0;
	$array['sqr']=0;
	$string='';
	while($row=mysql_fetch_array($result)){
		$date2=strtotime($row['date']);
		$daynum = ceil(abs($date1 - $date2)/86400);
		$date_number[$daynum-1]++;
		$array[$row['from_where']]++;
	}
	$result=date("m-d",strtotime("-".$days." day")).'γ';
	for($i=0;$i<=$days;$i++){
		$result.=date("m-d",strtotime("-".($days-$i)." day")).'α'.$date_number[$i].'β';
	}
	foreach($array as $key => $value){
		$string.=$key.'='.$value.'&';
	}
	//得到来自哪里的信息
	setcookie('managenumber',$result);
	setcookie('fromwhereall',$string);
}










?>