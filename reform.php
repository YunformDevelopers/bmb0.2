<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--下面这meta意思是告知浏览器的宽度是设备的宽度，缩放值为1.0-->
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<title>表格填写</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link rel="stylesheet" href="style/form/material.css" />
<link rel="stylesheet" href="style/msg.css" />
<!--<link rel="stylesheet" href="style/form/form-responsive.css"/>
-->
<!--<link rel="stylesheet" href="style/index.css"></link>
<link rel="stylesheet" href="style/msg.css"></link>
<link rel="stylesheet" href="style/responsive.css"></link>
-->
<link rel="stylesheet" href="style/form/validationEngine.jquery.css"/>
<script src="js/jQuery.js"></script>
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
	#form-body .q-body input[type="color"],
	#form-body .q-body textarea{
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




<?php require 'includes/includes.inc.php';?>
</head>
<body>

		        	<?php 
	        		if(isset($_GET['id'])){
						connect();
						$result=mysql_query('select * from decoration where form_id='.$_GET['id']);
						$rows=mysql_fetch_assoc($result);
						date_default_timezone_set("Asia/Shanghai");
						$now = date("Y-m-d h:i:s");
						if(strtotime($rows['form_expire_time'])==null){
						}else if(strtotime($rows['form_expire_time'])<=strtotime($now)){
							do_js_alert('该表填写日期已经到了哦');
							do_js_link('index.php');
						}
						if(isset($_COOKIE['srtp-username'])){
							$result3=mysql_query("select * from answer where form_id = '".$_GET['id']."' and username='".$_COOKIE['srtp-username']."'");
							if(mysql_affected_rows()){
								do_js_alert("您填写过该表，转向您之前填写的表格进行修改");
								do_js_link('fillanswer.php?id='.$_GET['id']);
							}else{
								$array['id']=null;
								date_default_timezone_set("Asia/Shanghai");
								$array['time'] = date("Y-m-d");
								$array['form_id']=$_GET['id'];
								insert('click', $array);
								if(isset($_GET['source'])){
									$last_page=$_GET['source'];
								}else{
									if(isset($_SERVER['HTTP_REFERER'])){
										$last_page=$_SERVER['HTTP_REFERER'];
										if(preg_match("/renren/",$last_page)){
											$last_page='renren';
										}else if(preg_match("/cc98/",$last_page)){
											$last_page='cc98';
										}
										else{
											$last_page='other';
										}
									}else{
										$last_page='newpage';
									}
								}
								setcookie('fromwhere',$last_page);
								$result=mysql_query("select * from question where form_id = '".$_GET['id']."'");
								$result1=mysql_query("select * from decoration where form_id = '".$_GET['id']."'");
								while($rows=mysql_fetch_assoc($result)){
									$rows1=mysql_fetch_assoc($result1);
									$old=strtotime($rows1['form_expire_time']);
									date_default_timezone_set("Asia/Shanghai");
									$now=strtotime(date("Y-m-d h:i:s"));
									if(strtotime($old)==''){
										create_to_db($rows);
										$array=$rows;
										$array['click_times']=intval($array['click_times'])+1;
										update('question', $array,"form_id='".$_GET['id']."'");
									}else if($now>$old){
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
						}
						else{
							echo '<script>/*var con=confirm("不注册提交报名表您的报名信息将无法再被找回，确认要继续填写吗？");
							if(!con){window.location.href="index.html"}*/</script>';
							$result=mysql_query("select * from question where form_id = '".$_GET['id']."'");
							$result1=mysql_query("select * from decoration where form_id = '".$_GET['id']."'");
							while($rows=mysql_fetch_assoc($result)){
								$rows1=mysql_fetch_assoc($result1);
								$old=strtotime($rows1['form_expire_time']);
								date_default_timezone_set("Asia/Shanghai");
								$now=strtotime(date("Y-m-d h:i:s"));
								if(strtotime($old)==''){
									create_to_db($rows);
									$array=$rows;
									$array['click_times']=intval($array['click_times'])+1;
									update('question', $array,"form_id='".$_GET['id']."'");
								}else if($now>$old){
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
		        	?>
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
		<p>Powered by <a href="index.php">报名吧@ZJU</a></p>
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