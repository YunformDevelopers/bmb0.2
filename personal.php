<?php
header('Content-Type:text/html; charset=utf-8');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--下面这meta意思是告知浏览器的宽度是设备的宽度，缩放值为1.0-->
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<title>我的</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link rel="stylesheet" href="style/index.css"></link>
<link rel="stylesheet" href="style/msg.css"></link>
<link rel="stylesheet" href="style/personal.css"></link>
<link rel="stylesheet" href="style/responsive.css"></link>
<!--下面这个js文件是为了兼容IE的媒体查询而准备的-->
<script src="js/css3-mediaqueries.js"></script>
<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="js/jquery.pin.min.js"></script>
<script>
$(".msg").hide();
$(document).ready(function(){	
  	//对每个需要调用message的链接应用下面的click函数
  	$("#contact-msg").click(function(){
		//load一个从别的地方拿到的数据
		$(".msg-content").load("msg.php #contact-msg-content",
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
			});
	 })

  	$("#work-msg").click(function(){
		//load一个从别的地方拿到的数据
		$(".msg-content").load("msg.php #work-msg-content",
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
			});
	 })
	 
  	$("#register-msg").click(function(){
		//load一个从别的地方拿到的数据
		$(".msg-content").load("msg.php #register-msg-content",
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
			});
	 })

  	$("#login-msg").click(function(){
		//load一个从别的地方拿到的数据
		$(".msg-content").load("msg.php #login-msg-content",
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
			});
	 })
})
</script>

</head>
<body>
<?php
    require 'includes/header.inc.php';
    if(!isset($_COOKIE['srtp-username'])){
    	do_js_alert('请先登录');
    	do_js_link('index.php');
    }
?>
<div id="tab-container">
	<ul class="tab-list clear-float">
    	<li class="tab-item left active">
        	<a class="tab-link" onClick="slideTo(0);">
        		<span class="tab-name">我创建的</span>
            </a>
        </li>
        <li class="tab-item left">
        	<a class="tab-link" onClick="slideTo(1);">
        		<span class="tab-name">我收藏的</span>
            </a>
        </li>
        <li class="tab-item left">
        	<a class="tab-link" onClick="slideTo(2);">
        		<span class="tab-name">我浏览的</span>
            </a>
        </li>
    </ul>
</div>
<div id="wrapper" class="content-container">		
	<ul id="scroller" class="content">
		<li class="innerWrapper">
			<div id='my-release' class="section">
			<br />
				<div class="section-header">
					<h2>我发布的</h2>
					<div class="h2-line">
					</div>
				</div>
				<div class="section-body">
					<?php 
						connect();
						$result = mysql_query("select * from question where username='".$_COOKIE['srtp-username']."' order by Date desc") or die(mysql_error());
						while($row=mysql_fetch_assoc($result)){
							$result2=mysql_query("select * from decoration where form_id ='".$row['form_id']."'");
							while ($row2=mysql_fetch_assoc($result2)){
								make_form_card($row, $row2);
							}
						}	
					?>
					
					<div class="card my-release create-new" > 
						<a href="create.php">
							<div class="img-holder">
								<b>+</b>
								<p>点此创建新表</p>
							</div>
						</a>	
					</div>
				<!-- 这里是用来使元素左端对齐的 -->
					<div class='card left-fix'>&nbsp;</div>
					<div class='card left-fix'>&nbsp;</div>
					<div class='card left-fix'>&nbsp;</div>
					<div class='card left-fix'>&nbsp;</div>
				</div>
			</div>
		</li>
		<li class="innerWrapper2">
			<div id='my-fill' class="section">
				<div class="section-header">
					<h2>我填写的</h2>
					<div class="h2-line">
					</div>
				</div>
				<div class="section-body">
					<?php 
					connect();
					$result3=mysql_query("select * from answer where username='".$_COOKIE['srtp-username']."'") or die(mysql_error());
					while($rows3=mysql_fetch_assoc($result3)){
						$result=mysql_query("select * from question where form_id='".$rows3['form_id']."'");
						while($row=mysql_fetch_assoc($result)){
							$result2=mysql_query("select * from decoration where form_id ='".$row['form_id']."'");
							while ($row2=mysql_fetch_assoc($result2)){
								make_form_card($row, $row2);
							}
						}
					}
					?>
				<!-- 这里是用来使元素左端对齐的 -->
					<div class='card left-fix'>&nbsp;</div>
					<div class='card left-fix'>&nbsp;</div>
					<div class='card left-fix'>&nbsp;</div>
					<div class='card left-fix'>&nbsp;</div>
				</div>
			</div>
		</li>
		<li class="innerWrapper3">
			<div id='my-browse' class="section">
				<div class="section-header">
					<h2>我浏览的</h2>
					<div class="h2-line">
					</div>
				</div>
				<div class="section-body">
					<div class="card my-browse" > 
						<a href='#'>
							<div class="img-holder">
								<div class="fader">
									<img src="images/1.jpg" alt="" />
								</div>
								<div class="form-name">
									浙大某个社团网站纳新报名表
								</div>
								<div class="img-counter">
									<div class="counter">
										<span class="time-left">还有两天</span>
										<span class="written">14次</span>
									</div>
								</div>
							</div>
						</a>
					</div>
				<!-- 这里是用来使元素左端对齐的 -->
					<div class='card left-fix'>&nbsp;</div>
					<div class='card left-fix'>&nbsp;</div>
					<div class='card left-fix'>&nbsp;</div>
					<div class='card left-fix'>&nbsp;</div>
				</div>
			</div>
		</li>
	</ul>
</div>
<div class='msg'>
    <div class='msg-border'>
        <div class='msg-content'>			
        </div>
    </div>
</div>

<?php
     include 'includes/footer.inc.php';
?>
</body>
<script src='js/iscroll.js'></script>
<script src='js/common.js'></script>
</html>