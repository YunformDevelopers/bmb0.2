<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--下面这meta意思是告知浏览器的宽度是设备的宽度，缩放值为1.0-->
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<title>首页</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link rel="stylesheet" href="style/index.css"></link>
<link rel="stylesheet" href="style/msg.css"></link>
<link rel="stylesheet" href="style/responsive.css"></link>
<!--下面这个js文件是为了兼容IE的媒体查询而准备的-->
<script src="js/css3-mediaqueries.js"></script>
<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="js/showtips.js"></script>
<script type="text/javascript" src="js/msg.js"></script>
<script type="text/javascript" src="js/jquery.pin.min.js"></script>
<script src='js/iscroll.js'></script>
<script src='js/common.js'></script>
<?php
    require 'includes/header.inc.php';
?>
</head>
<body>																																																					
<div id='slideshow' style="" >
	<div class="slideshow-inner">
        <h2><b>见证一个新的时代</b></h2>
        <i>Witness a new era.</i>
        <br /><br />
        <p class="banner-content">欢迎参加报名吧首次内测！</p>
        <p><a style="color:#F30; border-color:#F30;" href="beta-intro.html">内测福利戳这里！</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="create.php">开始创建第一张报名表</a></p>
    </div>
</div>
<div id="tab-container">
	<ul class="tab-list clear-float">
    	<li class="tab-item left active">
        	<a class="tab-link" onClick="slideTo(0);">
        		<span class="tab-name">推荐</span>
            </a>
        </li>
        <li class="tab-item left">
        	<a class="tab-link" onClick="slideTo(1);">
        		<span class="tab-name">榜单</span>
            </a>
        </li>
        <li class="tab-item left">
        	<a class="tab-link" onClick="slideTo(2);">
        		<span class="tab-name">筛选</span>
            </a>
        </li>
    </ul>
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
				<div class="section-body clear-float">
                <!-- 我写的css对新生成的DOM元素不能起作用，很奇怪 -->
					<?php 
						connect();
						$result=mysql_query("select * from question order by form_id desc limit 4") or die(mysql_error());
						while($row=mysql_fetch_assoc($result)){
							$result2=mysql_query("select * from decoration where form_id ='".$row['form_id']."'");
							while ($row2=mysql_fetch_assoc($result2)){
								make_form_card($row, $row2);
							}
						}	
					?>
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
				<div class="section-body clear-float">
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

<div id="whole-msg-bg" onclick="msgSlideDn();">
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
</html>