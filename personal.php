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
<script type="text/javascript" src="js/msg.js"></script>

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
        		<span class="tab-name">我填写的</span>
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
    		$result = mysql_query("select * from question where username='".$_COOKIE['srtp-username']."'") or die(mysql_error());
			while($rows=mysql_fetch_assoc($result)){
			$result1=mysql_query("select * from decoration where form_id='".$rows['form_id']."'");
			$rows1=mysql_fetch_assoc($result1);
			$old=strtotime($rows1['form_expire_time']);
			date_default_timezone_set("Asia/Shanghai");
			$now=strtotime(date("Y-m-d h:i:s"));
			$seconds=$old-$now;
			$days=$seconds/(24*60*60);
			$day=intval($days);
			$hours=($days-$day)*24;
			$hour=intval($hours);
			$minutes=($hours-$hour)*24;
			$minute=intval($minutes);
    		echo '<div class="card my-release" > 
            			<a href="#">
	                		<div class="form-op">
		                    	<a href="#"><input class="btn red" type="button" value="编辑"/></a>
		                    	<a href="manage.php?id='.$rows['form_id'].'"><input class="btn blue" type="button" value="管理"/></a>
	                    		<a href="#"><input class="btn green" type="button" value="查看"/></a>
	                		</div>
	                		<div class="form-status">
	                   			<img src="images/form-status-on.png" alt="已下架" />
	                		</div>
	                		<div class="img-holder">
	                    		<div class="fader">';
	                        		if(!$rows1['bg'])echo '<img src="images/2.jpg" alt="" />';
	                        		else echo '<img src="uploads/'.$rows1['bg'].'.jpg" alt="" />';
	                    		echo '</div>
	                    		<div class="form-name">
	                        		'.$rows['form_title'].'
	                    		</div>
	                    		<div class="img-counter">
	                        		<div class="counter">';
	                            		if($day>=0) echo '<span class="time-left">还有'.$day.'天'.$hour.'小时'.$minute.'分钟</span>';
	                            		else echo '<span class="time-left">已到期</span>';
										echo '<span class="written">'.$rows['click_times'].'</span>
	                        		</div>
	                    		</div>
	                		</div>
            			</a>
        			</div>';
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