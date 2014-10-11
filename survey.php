<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--下面这meta意思是告知浏览器的宽度是设备的宽度，缩放值为1.0-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>社团需求调查表</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link rel="stylesheet" href="style/form/paper.css" />
<!--<link rel="stylesheet" href="style/form/form-responsive.css"/>-->
<link rel="stylesheet" href="style/form/validationEngine.jquery.css"/>
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="js/answerCookie.js"></script>
<script src="js/msg.js" type="text/javascript" charset="utf-8"></script>
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
	initFillTool();
}
</script>
<style>
@media screen and (max-width: 500px) {
#form-field {
	width:90%;
}
#form-body .q-number {
	width:2em;
}
#form-body .q-whole {
	padding:5px 0 5px 38px;
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
        <div id="form-title">
            <h3>社团需求调查表</h3>
        </div>
        <div id="form-intro" >
        加入我们，让创业成为你的生活方式！加入我们，让创业成为你的生活方式！加入我们，让创业成为你的生活方式！加入我们，让创业成为你的生活方式！加入我们，让创业成为你的生活方式！加入我们，让创业成为你的生活方式！加入我们，让创业成为你的生活方式！加入我们，让创业成为你的生活方式！加入我们，让创业成为你的生活方式！
            注：标 * 的题目为必填
        </div>
        <ul id="form-body">
        	<form id="formID" method="post" action="#">
            	<li class="q1 q-field logic-name">
                    <div class="q-number">
                        <span>1</span>
                    </div>
                    <div class="q-whole">
                        <div class="q-title">姓名</div>
                        <div class="q-alternative">*</div>
                        <div class="q-body">
                            <input type="text" name="q1-body" class="body edit" required="required" />
                        </div>
                    </div>
                </li>
                <li class="q2 q-field logic-sex">
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
						<div class="q-whole"><div class="q-title">专业班级</div><div class="q-alternative">*</div><div class="q-body"><input type="text" name="q7-body" class="body edit" required="required" /></div></div></li><li class="q8 q-field free-file">
						<div class="q-number"><span>8</span></div>
						<div class="q-whole"><div class="q-title">fe</div><div class="q-alternative">*</div><div class="q-body"><input type="file" name="user" class="body edit" required="required" ></input></div></div></li><div id="form-tip">

            <li id="" class="q9 q-field free-multichoice">
                <div class="q-number"><span>9</span></div>
                <div class="q-whole">
                    <div class="q-title">对于网站主色调，您偏好哪种颜色？（多选）</div>
                    <div class="q-alternative" name="required" >*</div>
                    <div class="q-body">
                        <label><input name="q9-红" type="checkbox" value="红" />红</label>
                        <label><input name="q9-绿" type="checkbox" value="绿" />绿</label>
                        <label><input name="q9-黄" type="checkbox" value="黄" />黄</label>
                        <label><input name="q9-蓝" type="checkbox" value="蓝" />蓝</label>
                        <label><input name="q9-紫" type="checkbox" value="紫" />紫</label>
                        <span  class="note-position"><label><input name="q9-mul6" type="checkbox" class="note-title" value="其他" />其他</label><input name="q9-body-note" class="note" type="text" value="请注明"/></span>
                    </div>
                </div>
            </li>
            <li id="" class="q10 q-field free-multiline">
                <div class="q-number"><span>10</span></div>
                <div class="q-whole">
                    <div class="q-title">你对报名吧网站还有什么建议或意见？</div>
                    <div class="q-alternative" name="required" >*</div>
                    <div class="q-body">
                        <textarea name="q10-body" class="body edit" ></textarea>
                    </div>
                </div>
            </li>
			<li id="" class="q11 q-field free-singleline">
                <div class="q-number"><span>11</span></div>
                <div class="q-whole">
                    <div class="q-title">你的姓名是？</div>
                    <div class="q-alternative" name="required" >*</div>
                    <div class="q-body">
                        <input type="text" name="q11-body" class="body edit" ></input>
                    </div>
                </div>
            </li>
			<li id="" class="q12 q-field free-file">
                <div class="q-number"><span>12</span></div>
                <div class="q-whole">
                    <div class="q-title">请上传相应文件</div>
                    <div class="q-alternative" name="required" >*</div>
                    <div class="q-body">
                        <input type="file" name="q12-body" class="body edit" ></input>
                    </div>
                </div>
            </li>
			<li id="" class="q13 q-field free-file">
                <div class="q-number"><span>13</span></div>
                <div class="q-whole">
                    <div class="q-title">请上传您的个人照片</div>
                    <div class="q-alternative" name="required" >*</div>
                    <div class="q-body">
                        <input type="file" name="q13-body" class="body edit" ></input>
                    </div>
                </div>
            </li>
            <input id="submit" class="btn red" name="submit" type="submit" value="提交" onClick="SetFillCookie(); SetAnswerCookie();alert(document.cookie)"/>
			<input id="submit" class="btn red" name="submit" value="重填" onClick="ReFill()"/>
         </form>
        </ul>
	</div>
    
    <div id="fill-tool" onload="initFillTool();">
    	<div class="login-reg box " title="注册/登录后可享受一键填表、保存填表进度等福利！">
        	<a class="tool">
            	<span class="tool-name" title="注册 登录" onclick="msgPopOver('msg.php #login-msg-content')">注册 登录</span>
            </a>
        </div>
        <div class="quick-fill box " title="根据表格内容智能填入个人信息">
        	<a class="tool">
            	<span class="tool-name" title="一键 填表" onclick="autoFill();">一键 填表</span>
            </a>
        </div>
        <div class="save box " title="保存进度，表格可在 我的 中找到">
        	<a class="tool">
            	<span class="tool-name" title="保存" onclick="SetFillCookie();">保存 进度</span>
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
		<p>Powered by 报名吧</p>
		<p>由于网站还在开发，不能提供最佳的用户体验，希望您能理解！</p>
	</div>
    <div id="whole-msg-bg" onclick="msgSlideDn();">
    </div>
    <div class='msg'>
        <div class='msg-border'>
            <div class='msg-content'>
            <!--内容是动态获得的-->			
            </div>
        </div>
    </div>
</body>
</html>