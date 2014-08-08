<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--下面这meta意思是告知浏览器的宽度是设备的宽度，缩放值为1.0-->
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<title>首页</title>
<link rel="stylesheet" href="style/index.css"></link>
<link rel="stylesheet" href="style/msg.css"></link>
<link rel="stylesheet" href="style/responsive.css"></link>
<!--下面这个js文件是为了兼容IE的媒体查询而准备的-->
<script src="js/css3-mediaqueries.js"></script>
<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="js/showtips.js"></script>
<script type="text/javascript" src="test for Liang/test.js"></script>
<script type="text/javascript" src="js/msg.js"></script>
<script src='js/iscroll.js'></script>
<?php
    require 'includes/header.inc.php';
?>
</head>
<body>
<div id='slideshow' style="display:none;">
	
</div>


<div id="wrapper" class="content-container">		
	<ul id="scroller" class="content">
		<li class="innerWrapper">
			<div id='newest' class="section">
				<br />
				<div class="section-header">
					<h2>最新上架</h2>
					<div class="h2-line">
					</div>
				</div>
				<div class="section-body">
					<div class="card hottest" > 
						<a href='reform.php?id=1'>
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
					<div class="card hottest" > 
						<a href='#'>
							<div class="img-holder">
								<div class="fader">
									<img src="images/2.jpg" alt="" />
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
					<div class="card hottest" > 
						<a href='#'>
							<div class="img-holder">
								<div class="fader">
									<img src="images/3.jpg" alt="" />
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
					<div class="card hottest" > 
						<a href='#'>
							<div class="img-holder">
								<div class="fader">
									<img src="images/4.jpg" alt="" />
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
				<div id='content-footer'>
					<a class = "load-more btn white">点击加载更多</a>
					<p class = "reminder">你也可以切换到<a class="btn white" onClick= "slideTo(1)">榜单</a><a class="btn white" onClick="slideTo(2)">筛选</a>标签页</p>
				</div>

			</div>
		</li>
		<li class="innerWrapper2">
			<div id='hottest' class="section">
				<br />
				<div class="section-header">
					<h2>最热门</h2>
					<div class="h2-line">
					</div>
				</div>
				<div class="section-body">
					<div class="card hottest" > 
						<a href='reform.php?id=1'>
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
					<div class="card hottest" > 
						<a href='#'>
							<div class="img-holder">
								<div class="fader">
									<img src="images/2.jpg" alt="" />
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
					<div class="card hottest" > 
						<a href='#'>
							<div class="img-holder">
								<div class="fader">
									<img src="images/3.jpg" alt="" />
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
					<div class="card hottest" > 
						<a href='#'>
							<div class="img-holder">
								<div class="fader">
									<img src="images/4.jpg" alt="" />
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
				<div id='content-footer'>
					<a class = "load-more btn white">点击加载更多</a>
					<p class = "reminder">你也可以切换到<a class="btn white" onClick= "slideTo(0)">推荐</a><a class="btn white" onClick= "slideTo(2)">筛选</a>标签页</p>
				</div>
			</div>
		</li>
		<li class="innerWrapper3">
			<div id='hottest' class="section">
				<br />
				<div class="section-header">
					<h2>标签云</h2>
					<div class="h2-line">
				</div>
				<div id='content-footer'>
					<a class = "load-more btn white">点击加载更多</a>
					<p class = "reminder">你也可以切换到<a class="btn white" onClick= "slideTo(0)">推荐</a><a class="btn white" onClick= "slideTo(1)">榜单</a>标签页</p>
				</div>
			</div>
		</div>
		</li>
	</ul>
</div>

			
<div class='msg'>
    <div class='msg-border'>
        <div class='msg-content'>
        <!--内容是动态获得的-->			
        </div>
    </div>
</div>
<?php
     include 'includes/footer.inc.php';
?>
</body>

<script src='js/common.js'></script>
</html>