<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--下面这meta意思是告知浏览器的宽度是设备的宽度，缩放值为1.0-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>报名表修改</title>
<link rel="stylesheet" href="style/form/material_jixie.css" />
<link rel="stylesheet" href="style/form/form-responsive.css"/>
<link rel="stylesheet" href="style/index.css"/>
<link rel="stylesheet" href="style/msg.css" />
<link rel="stylesheet" href="style/responsive.css" />
<link rel="stylesheet" href="style/form/validationEngine.jquery.css"/>
<script type="text/javascript" src="js/jQuery.js"></script>
<script src="js/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="js/answerCookie.js"></script>
</head>
<body>
		        	<?php
		        	require 'includes/includes.inc.php';
		        	connect();
		        	$sql="select * from decoration where form_id=".$_GET['id'];
		        	$result=mysql_query($sql);
		        	$rows=mysql_fetch_assoc($result);
		        	date_default_timezone_set("Asia/Shanghai");
		        	$now = date("Y-m-d h:i:s");
		        	if(strtotime($rows['form_expire_time'])==null){
		        		
		        	}else if(strtotime($rows['form_expire_time'])<=strtotime($now)){
		        		do_js_alert('该表填写日期已经到了哦');
		        		do_js_link('index.php');
		        	}
		        	if(isset($_GET['data']) && isset($_GET['id'])){
                    	create_to_db($_GET['data'],$_GET['id']);}
                    else if(isset($_GET['id'])){
						connect();
						$result1=mysql_query("select * from question where form_id='".$_GET['id']."'");
						$rows1=mysql_fetch_assoc($result1);
						$result2=mysql_query("select * from answer where form_id='".$_GET['id']."' and username ='".$_COOKIE['srtp-username']."'");
						$rows2=mysql_fetch_assoc($result2);
						$title=$rows1['form_title'];
						$string=explode('$$$que_end', $rows1['question_string']);
						$answer=explode('$$$ans_all', $rows2['answer_string']);
						$question_amount=count(explode('$$$que_end', $rows1['question_string']));
						for($i=0;$i<count($answer)-1;$i++){
							$answer_array[$i]=explode('$$$ans_end', $answer[$i]);
						}
						echo '<div id="form-field">
								<div id="form-title-wrapper">
									<div id="form-title">
										<h3>'.$title.'</h3>
									</div>
								</div>
							<div id="form-wrapper">
									<div id="form-intro" >
										'.$rows1['form_intro'].'
									</div>
										<form enctype="multipart/form-data" novalidate="novalidate" id="formID" method="post" action="formaction.php?action=update&id='.$_GET['id'].'&amount='.($question_amount-1).'">
	        <ul id="form-body">';
						for($i=0;$i<count($string)-1;$i++){
							$explode1 = explode('$$$quetit_end', $string[$i]);
							$question = $explode1[0];
							$explode2 = explode('$$$quetyp_end', $explode1[1]);
							$type=$explode2[0];
							$choice=explode('$$$quebod_end', $explode2[1]);
							$re=end($choice);
							if($re=='required'){
								$re='required="required"';
							}else{
								$re='';
							}
							echo '<li id="" class="q'.($i+1).' q-field '.$type.'">';
							echo '<div class="q-number"><span>'.($i+1).'</span></div>';
							echo '<div class="q-whole">';
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
							if($type=="logic-sex"){
								for($j=0;$j<count($choice)-1;$j++){
									if(in_array($choice[$j], $answer_array[$i])){
										echo '<label><input name="q'.($i+1).'-body" type="radio" '.$re.' value="'.$choice[$j].'" checked="checked"/>'.$choice[$j].'</label>';
									}else{
										echo '<label><input name="q'.($i+1).'-body" type="radio" '.$re.' value="'.$choice[$j].'"/>'.$choice[$j].'</label>';
									}
								}
							}
							if($type=="free-multichoice"){
								for($j=0;$j<count($choice)-1;$j++){
									if(in_array($choice[$j], $answer_array[$i])){
										echo '<label><input name="q'.($i+1).'-'.$choice[$j].'" type="checkbox" '.$re.' value="'.$choice[$j].'" checked="checked"/>'.$choice[$j].'</label>';
									}
									else{
										echo '<label><input name="q'.($i+1).'-'.$choice[$j].'" type="checkbox" '.$re.' value="'.$choice[$j].'"/>'.$choice[$j].'</label>';
									}
								}
								//print_r($answer_array[$i]);
							}
							if($type=="free-singlechoice")
								for($j=0;$j<count($choice)-1;$j++){
									if(in_array($choice[$j], $answer_array[$i])){
										echo '<label><input name="q'.($i+1).'-body" type="radio" '.$re.' value="'.$choice[$j].'" checked="checked"/>'.$choice[$j].'</label>';
									}
									else{
										echo '<label><input name="q'.($i+1).'-body" type="radio" '.$re.' value="'.$choice[$j].'"/>'.$choice[$j].'</label>';
									}
								}
							if($type=="free-multiline"){
								echo '<textarea name="q'.($i+1).'-body" class="body edit">'.str_replace('<br />', chr(13),$answer_array[$i][0]).'</textarea>';
							}
							if($type=="free-singleline"){
								echo '<input type="text" name="q'.($i+1).'-body" class="body edit" '.$re.' value="'.$answer_array[$i][0].'">';
							}
							if($type=="logic-name"){
								echo '<input type="text" name="q'.($i+1).'-body" class="body edit" '.$re.' value="'.$answer_array[$i][0].'"/>';
							}
							if($type=="logic-studentID"){
								echo '<input type="number" name="q'.($i+1).'-body" class="body edit" '.$re.' value="'.$answer_array[$i][0].'"/>';
							}
							if($type=="logic-address"){
								echo '<input type="text" name="q'.($i+1).'-body" class="body edit" '.$re.' value="'.$answer_array[$i][0].'"/>';
							}
							if($type=="logic-tel"){
								echo '<input type="tel" name="q'.($i+1).'-body" class="long-tel body edit" '.$re.' value="'.$answer_array[$i][0].'" />（长号：必填）<input type="tel" name="q'.($i+1).'-body" class="short-tel body edit" value="'.$answer_array[$i][1].'" />（短号：可不填）';
								//print_r($answer_array[$i]);
							}
							if($type=="logic-email"){
								echo '<input type="email" name="q'.($i+1).'-body" class="body edit" '.$re.' value="'.$answer_array[$i][0].'"/>';
							}
							if($type=="logic-class"){
								echo '<input type="text" name="q'.($i+1).'-body" class="body edit" '.$re.' value="'.$answer_array[$i][0].'"/>';
							}
							if($type=="free-file"){
								echo '<input type="file" name="q'.($i+1).'-body" class="body edit" '.$re.' ></input>';
							}
							echo '</div>';
							echo '</div>';
							echo '</li>';
						}
                    }
                    else{
                    	do_js_alert('请从正确路径访问该页');
                    	do_js_link('index.php');
                    }
                    echo '<input id="submit" class="btn red" name="submit" type="submit" value="提交修改" onClick="SetFillCookie(); SetAnswerCookie();"/>
								</ul>
								</form>
								<div id="form-tip">
									<p class="title edit raw" rows="1">'.$result1['form_tip'].'</p>
								</div>
							</div>
						</div>
					';?>
</body>
</html>