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
		save_answer_to_db($_COOKIE['answerStore'], $_GET['id']);
		$result=mysql_query("select * from question where form_id='".$_GET['id']."'");
		$rows=mysql_fetch_assoc($result);
		$array=$rows;
		$array['answer_times']=intval($array['answer_times'])+1;
		update('question', $array);
		do_js_alert("感谢您的回答");
		setcookie('answerStore','',time()-1);
		do_js_link('index.php');
	}else{
		echo '<script type="text/javascript" src="js/jQuery.js"></script>';
		echo '<script>
				function afterFillRegisterMsgPopOver (){
					//load一个从别的地方拿到的数据
					$(".msg-content").load("msg.php #after-fill-register-msg-content",
						//做一个msg移到屏幕中央的动画效果
						function(){
							//定义topoff为屏幕高度减去通知框高度的一半，这是为了让通知框居中
							var topoff = ($(window).height()-$(".msg").height())/ 2 + "px";
							//通知框框弹出的动画
							$(".msg").animate({
								top:topoff		
							},600)//这里的数字是时间
							$("#msg-ok-btn").click(function(){
								$(".msg").animate({
									top:$(window).height()*1.1
								},500)//这里的数字是时间
							}) 
							initMsg ();//重新初始化msg模块
						});
				};
				var r = confirm("是否要注册后再提交回答，不注册提交将不能再修改你的回答。");
				if(r==true){
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
	print_r($answer_array);
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
}