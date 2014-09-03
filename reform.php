<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--下面这meta意思是告知浏览器的宽度是设备的宽度，缩放值为1.0-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>表格填写</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link rel="stylesheet" href="style/form/paper.css" />
<link rel="stylesheet" href="style/msg.css" />
<!--<link rel="stylesheet" href="style/form/form-responsive.css"/>
-->
<!--<link rel="stylesheet" href="style/index.css"></link>
<link rel="stylesheet" href="style/msg.css"></link>
<link rel="stylesheet" href="style/responsive.css"></link>
-->
<link rel="stylesheet" href="style/form/validationEngine.jquery.css"/>
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="js/msg.js" type="text/javascript" charset="utf-8"></script>
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




<?php require 'includes/includes.inc.php';?>
</head>
<body>

		        	<?php 
		        	if(isset($_COOKIE['srtp-username'])){
		        		if(isset($_GET['id'])){
							connect();
							$result3=mysql_query("select * from answer where form_id = '".$_GET['id']."'");
							if(mysql_affected_rows()){
								do_js_alert("您填写过该表，转向您之前填写的表格进行修改");
								do_js_link('fillanswer.php?id='.$_GET['id']);
							}else{
								$result=mysql_query("select * from question where form_id = '".$_GET['id']."'");
								$result1=mysql_query("select * from decoration where form_id = '".$_GET['id']."'");
								while($rows=mysql_fetch_assoc($result)){
									$rows1=mysql_fetch_assoc($result1);
									$old=strtotime($rows1['form_expire_time']);
									date_default_timezone_set("Asia/Shanghai");
									$now=strtotime(date("Y-m-d h:i:s"));
									if($now>$old){
										do_js_alert("该表已超过建表者规定的填表时间！");
										do_js_link('index.php');
									}else if($rows['answer_times']>=$rows1['form_number_limit']){
										do_js_alert("该表的填写人数已超过限制");
										do_js_link('index.php');
									}else{
										create_to_db($rows);
										$array=$rows;
										$array['click_times']=intval($array['click_times'])+1;
										update('question', $array,"form_id='".$_GET['id']."'");
									}
								}
							}
						}else{
						do_js_alert('请从正确路径访问该页');
						do_js_link('index.php');
						}
					}else{
						do_js_alert("请先登录");
						do_js_link('index.php');	
					}
							        	
		        	?>
    <div id="fill-tool" onload="initFillTool();">
    	<div class="login-reg box " title="注册/登录后可享受一键填表、保存填表进度等福利！">
        	<a class="tool">
            	<span class="tool-name" title="注册 登录">注册 登录</span>
            </a>
        </div>
        <div class="quick-fill box " title="根据表格内容智能填入个人信息">
        	<a class="tool">
            	<span class="tool-name" title="一键 填表">一键 填表</span>
            </a>
        </div>
        <div class="save box " title="保存进度，表格可在 我的 中找到">
        	<a class="tool">
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
    <div class='msg'>
        <div class='msg-border'>
            <div class='msg-content'>
            <!--内容是动态获得的-->			
            </div>
        </div>
    </div>
    <script> afterFillRegisterMsgPopOver(); </script><!-- 这行供测试，可以删去 -->
	<div id="footer" class="form-footer">
		<p>Powered by 报名吧</p>
		<p>由于网站还在开发，不能提供最佳的用户体验，希望您能理解！</p>
	</div>
    
</body>
</html>