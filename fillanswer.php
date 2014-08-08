<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--下面这meta意思是告知浏览器的宽度是设备的宽度，缩放值为1.0-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>表格填写</title>
<link rel="stylesheet" href="style/form/paper.css" />
<link rel="stylesheet" href="style/form/form-responsive.css"/>
<link rel="stylesheet" href="style/index.css"></link>
<link rel="stylesheet" href="style/msg.css"></link>
<link rel="stylesheet" href="style/responsive.css"></link>
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/answerCookie.js"></script>
</head>
<body>
		        	<?php
		        	require 'includes/header.inc.php';
		        	if(isset($_GET['data']) && isset($_GET['id'])){
                    	create_to_db($_GET['data'],$_GET['id']);}
                    else if(isset($_GET['id'])){
						connect();
						$result1=mysql_query("select * from question where form_id='".$_GET['id']."'");
						$rows1=mysql_fetch_assoc($result1);
						$result2=mysql_query("select * from answer where form_id='".$_GET['id']."' and username ='".$_COOKIE['srtp-username']."'");
						$rows2=mysql_fetch_assoc($result2);
						$title_string=explode('ζ', $rows1['question_string']);
						$title=$title_string[0];
						$string=explode('δ', $title_string[1]);
						$answer=explode('δ', $rows2['answer_string']);
						for($i=0;$i<count($answer)-1;$i++){
							$answer_array[$i]=explode('γ', $answer[$i]);
						}
						echo '<div id="form-field">';
						echo '<div id="form-title">';
						echo '<h3>'.$title.'</h3>';
						echo '</div>';
						echo '<div id="form-intro" >
	            注：标 * 的题目为必填
	        </div>
	        <ul id="form-body">
	        	<form method="post" action="formaction.php?action=update&id='.$_GET['id'].'">';
						for($i=0;$i<count($string)-1;$i++){
							$explode1 = explode('α', $string[$i]);
							$question = $explode1[0];
							$explode2 = explode('β', $explode1[1]);
							$type=$explode2[0];
							$choice=explode('γ', $explode2[1]);
							echo '<li id="" class="q'.($i+1).' q-field '.$type.'">';
							echo '<div class="q-number"><span>'.($i+1).'</span></div>';
							echo '<div class="q-whole">';
							if($type=="free-multichoice"){
								echo '<div class="q-title">'.$question.'(多选)</div>';
							}
							else {
								echo '<div class="q-title">'.$question.'</div>';
							}
							echo '<div class="q-alternative" name="required">*</div>';
							// 					if($type=="free-multichoice"){
							// 						echo '<div class="q-alternative">*</div>';
							// 					}
							echo '<div class="q-body">';
							if($type=="free-multichoice")
							for($j=0;$j<count($choice)-1;$j++){
								echo '<label><input name="q'.($i+1).'-'.$choice[$j].'" type="checkbox" value="'.$choice[$j].'"/>'.$choice[$j].'</label>';
							}
							if($type=="free-singlechoice")
							for($j=0;$j<count($choice)-1;$j++){
								if(in_array($choice[$j], $answer_array[$i])){
									echo '<label><input name="q'.($i+1).'-body" type="radio" value="'.$choice[$j].'" checked="checked"/>'.$choice[$j].'</label>';
								}
								else{
									echo '<label><input name="q'.($i+1).'-body" type="radio" value="'.$choice[$j].'"/>'.$choice[$j].'</label>';
								}
							}
							if($type=="free-multiline"){
								echo '<textarea name="q'.($i+1).'-body" class="body edit">'.$answer_array[$i][0].'</textarea>';
							}
							if($type=="free-singleline"){
								echo '<input type="text" name="q'.($i+1).'-body" class="body edit" value="'.$answer_array[$i][0].'">';
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
		        	?>
		        	<input id="submit" class="btn red" name="submit" type="submit" value="提交" onClick="SetAnswerCookie();"/>
                </form>   
            </ul>
	</div>
</body>
</html>