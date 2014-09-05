<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--下面这meta意思是告知浏览器的宽度是设备的宽度，缩放值为1.0-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>社团需求调查表</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link rel="stylesheet" href="style/form/material.css" />
<!--<link rel="stylesheet" href="style/form/form-responsive.css"/>-->
<link rel="stylesheet" href="style/form/validationEngine.jquery.css"/>
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="js/answerCookie.js"></script>
<script>
/*$(function(){
	$('input[value=请注明]').focus(function(){
        if($(this).val()=="请注明"){
            $(this).val('');
        }
   })
})*/
	initFillTool();	
$(document).ready(function() {
	//获取浏览器的信息
	/*var browser = {
		versions : function() {
				var u = navigator.userAgent, app = navigator.appVersion;
				return {//移动终端浏览器版本信息   
				mobile : !!u.match(/AppleWebKit.*Mobile.*///)
	/*					|| !!u.match(/AppleWebKit/), //是否为移动终端  
				
				};
		}(),
		language : (navigator.browserLanguage || navigator.language).toLowerCase()
	}
	//为移动端做设置
	if (true){//是否为移动终端browser.versions.mobile .parent().css("background","#36F")
		alert($(".q-body input").html());
	
	}
	*/
});
function initFillTool() {
	var leftOffset = $(window).width() - 120 ;
	$("#fill-tool").css("left" , leftOffset + "px");
}
window.onresize = function() {
	/*initFillTool();*/
}
</script>
<style>
@media screen and (max-width: 500px) {
	#form-body .q-body input[type="text"],
	#form-body .q-body input[type="password"],
	#form-body .q-body input[type="email"],
	#form-body .q-body input[type="url"],
	#form-body .q-body input[type="date"],
	#form-body .q-body input[type="month"],
	#form-body .q-body input[type="time"],
	#form-body .q-body input[type="datetime"],
	#form-body .q-body input[type="datetime-local"],
	#form-body .q-body input[type="week"],
	#form-body .q-body input[type="number"],
	#form-body .q-body input[type="tel"],
	#form-body .q-body input[type="search"],
	#form-body .q-body input[type="color"]{
		width:80%;
	}
	.free-multiline .q-body textarea {
		width:90%;
	}
	#form-body .q-number {
		width:2em;
	}
	#form-body .q-whole {
		padding:5px 0 5px 38px;
	}
	.q-body label {
		width:95%;
		border-bottom:solid 1px #ccc;
		border-radius:0px 0px;
	}
}

</style>
<?php 
        require 'includes/functions.inc.php';
        	//else {
        	//	echo "<script>alert('请将必填项填写完整'); </script>";
        	//}
           	  /*$new = explode("-", $question);
              if(($old == null && $answers=='on') || $old == $new[0]){
		             $answer_array[$num][$i++]=$question;
		             $old = $new[0];
		             continue;
              }
              else{
              	$num++;
              }
              if($answers!='on'){
              $answer_array[$num][0]=$answers;
              }
              $old=null;
              $i=0;
           }
           print_r($answer_array);
           $submit = null;
           $i=1;
           $b=1;
           $string = null;
           foreach($answer_array as $answers){
           	 if(count($answers)>1){
           	 	foreach ($answers as $value){
           	 		$string .= $value.'&';
           	 	}
           	 }
           	 else{
           	 	$string = $answers[0];
           	 }
           	 $submit[$b++]= $string;
           	 $string = null;
           }
           //print_r($submit);
           //$query="insert into survey values('".$submit[1]."','".$submit[2]."','".$submit[3]."','".$submit[4]."','".$submit[5]."','".$submit[6]."','".$submit[7]."','".$submit[8]."','".$submit[9]."','".$submit[10]."')";
           //mysql_query($query) or die(mysql_error());
        }*/
          	 				
?>
</head>

<body>
	<div id="form-field">
    	<div id="form-title-wrapper">
            <div id="form-title">
                <h3>社团需求调查表</h3>
            </div>
        </div>
        <div id="form-wrapper">
            <div id="form-intro" >
            加入我们，让创业成为你的生活方式！加入我们，让创业成为你的生活方式！加入我们，让创业成为你的生活方式！加入我们，让创业成为你的生活方式！加入我们，让创业成为你的生活方式！加入我们，让创业成为你的生活方式！加入我们，让创业成为你的生活方式！加入我们，让创业成为你的生活方式！加入我们，让创业成为你的生活方式！
                注：标 * 的题目为必填
            </div>
            <form enctype="multipart/form-data" method="post" action="formaction.php?action=answer&id=8">
            <ul id="form-body">
            		<li class="q1 q-field logic-name">
                            <div class="q-number"><span>1</span></div>
                            <div class="q-whole"><div class="q-title">姓名</div><div class="q-alternative">*</div><div class="q-body"><input type="text" name="q1-body" class="body edit" required="required" /></div></div></li><li class="q2 q-field logic-sex">
                            <div class="q-number"><span>2</span></div>
                            <div class="q-whole"><div class="q-title">性别</div><div class="q-alternative">*</div><div class="q-body"><label><input name="q2-body" type="radio" required="required" value="男"/>男</label><label><input name="q2-body" type="radio" required="required" value="女"/>女</label></div></div></li><li class="q3 q-field logic-studentID">
                            <div class="q-number"><span>3</span></div>
                            <div class="q-whole"><div class="q-title">学号</div><div class="q-alternative">*</div><div class="q-body"><input type="number" name="q3-body" class="body edit" required="required" /></div></div></li><li class="q4 q-field logic-address">
                            <div class="q-number"><span>4</span></div>
                            <div class="q-whole"><div class="q-title">住址</div><div class="q-alternative">*</div><div class="q-body"><input type="text" name="q4-body" class="body edit" required="required" /></div></div></li><li class="q5 q-field logic-tel">
                            <div class="q-number"><span>5</span></div>
                            <div class="q-whole"><div class="q-title">电话长短号</div><div class="q-alternative">*</div><div class="q-body"><input type="tel" name="q5-body" class="body edit" required="required" /></div></div></li><li class="q6 q-field logic-email">
                            <div class="q-number"><span>6</span></div>
                            <div class="q-whole"><div class="q-title">邮箱</div><div class="q-alternative">*</div><div class="q-body"><input type="email" name="q6-body" class="body edit" required="required" /></div></div></li><li class="q7 q-field logic-class">
                            <div class="q-number"><span>7</span></div>
                            <div class="q-whole"><div class="q-title">专业班级</div><div class="q-alternative">*</div><div class="q-body"><input type="text" name="q7-body" class="body edit" required="required" /></div></div></li><li class="q8 q-field free-singleline">
                            <div class="q-number"><span>8</span></div>
                            <div class="q-whole"><div class="q-title">的撒范德萨</div><div class="q-alternative">*</div><div class="q-body"><input type="text" name="q8-body" class="body edit" required="required" /></div></div></li><li class="q9 q-field free-multiline">
                            <div class="q-number"><span>9</span></div>
                            <div class="q-whole"><div class="q-title">范德萨发的说法</div><div class="q-alternative">*</div><div class="q-body"><textarea name="q9-body" class="body edit" required="required" ></textarea></div></div></li><li class="q10 q-field free-singlechoice">
                            <div class="q-number"><span>10</span></div>
                            <div class="q-whole"><div class="q-title">范德萨发大水</div><div class="q-alternative">*</div><div class="q-body"><label><input name="q10-body" type="radio" required="required" value="佛挡杀佛"/>佛挡杀佛</label><label><input name="q10-body" type="radio" required="required" value="额外风水"/>额外风水</label><label><input name="q10-body" type="radio" required="required" value="额外确认该死的"/>额外确认该死的</label><label><input name="q10-body" type="radio" required="required" value="房顶上"/>房顶上</label></div></div></li>
        </ul>
        <div id="form-tip">
            <p class="title edit raw">请在这里输入报名表的注意事项</p>
        </div>
        	<input id="submit" class="btn red" name="submit" type="submit" value="提交" onClick="SetFillCookie(); SetAnswerCookie();"/>
        </form>
    </div>
    <div id="fill-tool" onload="initFillTool();">
    	<div class="login-reg square " title="注册/登录后可享受一键填表、保存填表进度等福利！">
            <?php if(isset($_COOKIE['srtp-username'])) {
					echo '<a class="tool">';
				}
				else {
					echo '<a class="tool" onclick="registerMsgPopOver();">';	
				}
			 ?>
            	<span class="tool-name" title="注册 登录">注册 登录</span>
            </a>
        </div>
        <div class="quick-fill square " title="根据表格内容智能填入个人信息">
            <?php if(isset($_COOKIE['srtp-username'])) {
					echo '<a class="tool">';
				}
				else {
					echo '<a class="tool" onclick="registerMsgPopOver();">';	
				}
			 ?>
            	<span class="tool-name" title="一键 填表">一键 填表</span>
            </a>
        </div>
        <div class="save square " title="保存进度，表格可在 我的 中找到">
            <?php if(isset($_COOKIE['srtp-username'])) {
					echo '<a class="tool">';
				}
				else {
					echo '<a class="tool" onclick="registerMsgPopOver();">';	
				}
			 ?>
            	<span class="tool-name" title="保存">保存 进度</span>
            </a>
        </div>    
    </div>
    <div id="back-tool">
    	<div class="circle">
            <a class="tool" onclick="javascript:window.history.back();" >
                <span class="tool-name" title="返回">返回</span>
            </a>
        </div>
    </div>
	<div id="footer" class="form-footer">
		<p>Powered by <a href="index.php">报名吧</a></p>
	</div>
</body>
</html>
