<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>表单提交</title>
<link rel="stylesheet" href="style/msg.css" />
<link rel="stylesheet" href="style/index.css" />
<script src="js/msg.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="js/jQuery.js"></script>
</head>
<body>
<div class='msg'>
        <div class='msg-border'>
            <div class='msg-content'>
            <!--内容是动态获得的-->			
            </div>
        </div>
</div>
<?php
require 'includes/includes.inc.php';
if(isset($_GET['action'])&&$_GET['action']=='save'){
	$data=$_COOKIE['qStore'];
	$title_string=explode('ζ', $_COOKIE['qStore']);
	$title=$title_string[0];
	$intro_string=explode('η', $title_string[1]);
	$intro=$intro_string[0];
	$string_tip=explode('θ', $intro_string[1]);
	$string=$string_tip[0];
	$tip=$string_tip[1];
	$id=save_form_to_db($title, $intro, $string, $tip);
	setcookie('qStore',"",time()-1);
 	do_js_link('create-2.php?id='.$id);
}
else if(isset($_GET['action'])&&$_GET['action']=='answer'){
	if(isset($_COOKIE['srtp-username'])){
		$answer_array=explode('δ', $_COOKIE['answerStore']);
		for($i=0;$i<count($answer_array);$i++){
			if(strstr($answer_array[$i],'$_FILES')){
				$newname=move_file($i+1);
				$newanswerStore.='$_FILES-'.$newname.'δ';
			}
			else{
				$newanswerStore.=$answer_array[$i].'δ';
			}
		}
		$_COOKIE['answerStore']=$newanswerStore;
		save_answer_to_db($_COOKIE['answerStore'], $_GET['id']);
		$result=mysql_query("select * from question where form_id='".$_GET['id']."'");
		$rows=mysql_fetch_assoc($result);
		$array=$rows;
		$array['answer_times']=intval($array['answer_times'])+1;
		update('question', $array);
		do_js_alert("感谢您的回答");
		setcookie('answerStore','',time()-1);
		setcookie('form_id','',time()-1);
		do_js_link('index.php');
	}else{
		echo '	
				<script>
					function get_get(url){
						querystr = url.split("?");
						if(querystr[1]){
							GETs = querystr[1].split("&");
							GET =new Array();
							for(i=0;i<GETs.length;i++){
								tmp_arr = GETs[i].split("=");
								key=tmp_arr[0];
								GET[key] = tmp_arr[1];
							}
						}
						return GET["id"];
					}; 
				var r = confirm("是否要注册后再提交回答，不注册提交将不能再修改你的回答。");
				if(r==true){
					var id = get_get(window.location.href);
					document.cookie="form_id="+id+"";
					afterFillRegisterMsgPopOver();
				}else{
					alert("不注册");
				}
			</script>';
	}
	
}
else if(isset($_GET['action'])&&$_GET['action']=='update'){
	$newanswerStore='';
	echo $_COOKIE['answerStore'];
	$answer_array=explode('δ', $_COOKIE['answerStore']);
	for($i=0;$i<count($answer_array);$i++){
		if(strstr($answer_array[$i],'$_FILES')){
			$newname=move_file($i+1);
			$newanswerStore.='$_FILES-'.$newname.'δ';
		}
		else{
			$newanswerStore.=$answer_array[$i].'δ';
		}
	}
	update_answer_to_db($newanswerStore,$_GET['id']);
	do_js_alert('相关信息已进行更改');
	setcookie('answerStore','',time()-1);
	do_js_link('personal.php');
}else if(isset($_GET['action'])&&$_GET['action']=='register_answer'){
	$_clean=array();
	$_tmp_username = trim($_POST['username']);
	if(preg_match('/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/',$_tmp_username)){
		$_clean['username']=$_tmp_username;
		if($_POST['password']==$_POST['notpassword']){
			if(!(strlen($_POST['password'])>10||strlen($_POST['password'])<6)){
				$_clean['password']=$_POST['password'];
				connect();
				$sql = "SELECT * from _user where username='{$_clean['username']}'";
				$result = mysql_query($sql);
				if(mysql_num_rows($result)==0){
					$sql = "INSERT INTO _user (username,password) VALUES ('{$_clean['username']}','{$_clean['password']}')";
					mysql_query($sql) or die(mysql_error());
					setcookie('srtp-username',$_clean['username']);
					do_js_alert("注册成功");
					do_js_link('formaction.php?action=answer&id='.$_COOKIE['form_id']);
				}
					else{
						echo "<script>alert('该用户名已被注册'); window.location='formaction.php?action=answer&id=".$_GET['id']."'; </script>";
					}		
			}else{
				do_js_alert("密码长度要在6-10位");
				do_js_link('formaction.php?action=answer&&id='.$_GET['id']);
			}
	     }
	 }
	else{
	 echo "<script>alert('请输入正确的邮箱地址'); window.location='formaction.php?action=answer&id=".$_GET['id']."';</script>";
 	}
}
?>
</body>
</html>
