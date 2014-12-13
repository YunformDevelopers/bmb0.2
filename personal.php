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
<script>
	$(document).ready(function(){
		$('.delete-button').click(function(){
			var con = confirm('确定要删除吗？');
			if(con){
				var idarray=$(this).attr('id').split('-');
				window.location.href="delete.php?id="+idarray[1];
			}
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
					<h2><b>我的内测</b></h2>
					<div class="h2-line">
					</div>
				</div>
				<div class="section-body">
					<div style="background:#fff; border:solid 2px #CCC; border-radius:4px; padding:5px; margin:10px 0;">
                    	<div id="beta-unauthorized">
                            <p>
                                <b>状态：</b><span class="status red">未认证</span>
                            </p>
                            <p>
                                <b>提示：</b>内测阶段认证可以获得200张免费二维码名片！<a style="text-decoration:none;" href="beta-intro.php"><input type="button" class="btn green" value="内测介绍"></input></a>
                            </p>
                            <p>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;将<b>社团名称、职位、姓名、报名吧注册邮箱</b>通过任何方式发送到我们的运营部门，12小时内回复！
                                <input type="button" class="btn blue" value="联系认证" onClick='msgPopOver("msg.php #contact-msg-content");'></input>
                            </p>
                        </div>
                        <div id="beta-authorized" style="display:none;">
                            <p>
                                <b>状态：</b><span class="status green">已认证！</span>
                            </p>
                            <p>
                                <b>提示：</b>将你需要生成二维码名片的<b>报名表链接</b>通过任何方式发送到我们的运营部门，我们12小时内回复处理情况！
                                <input type="button" class="btn blue" value="发送链接" onClick='msgPopOver("msg.php #contact-msg-content");'></input>
                            </p>
                            <p>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;详细规则及注意事项请戳<a style="text-decoration:none;" href="beta-intro.php"><input type="button" class="btn green" value="规则介绍"></input></a>
                            </p>
                        </div>
                    </div>
				</div>
				<div class="section-header">
					<h2>我创建的</h2>
					<div class="h2-line">
					</div>
				</div>
				<div class="section-body clear-float">
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
			echo '<div class="section-col" >';
    		echo '<div class="card my-release" > 
            			 	<div class="form-op">
								<a href="#" class="toggleOnline-btn-container"><input class="toggleOnline-btn ';
								//这里判断上下架
								if($days>=0){
									echo 'down-shelf';
								}else{
									echo 'up-shelf';
								}
			echo '" id="delete-'.$rows['form_id'].'" title="上架" type="button" value="    " onclick="toggleOnline(this);"/></a>
		                    	<a href="create.php?action=edit&id='.$rows['form_id'].'" class="btn-container"><input class="btn red" type="button" value="修改"/></a>
		                    	<a href="manage.php?id='.$rows['form_id'].'" class="btn-container"><input class="btn blue" type="button" value="管理"/></a>
	                    		<a href="reform.php?id='.$rows['form_id'].'" class="btn-container"><input class="btn green" type="button" value="查看"/></a>
  								<a href="#" class="delete-btn-container"><input class="delete-btn" id="delete-'.$rows['form_id'].'" title="删除" type="button" value="    "/></a>
	                		</div>
	                		<div class="form-status">';
    		if($days>=0){
    			echo '<img src="images/form-status-on.png" alt="已上架" />';
    		}else{
    			echo '<img src="images/form-status-off.png" alt="已下架" />';
    		}
	        echo '
	                		</div>
	                		<div class="img-holder">
	                    		<div class="fader">';
	                        		if(!$rows1['bg']) {
										echo '<img src="images/2.jpg" alt="" />';
										}
	                        		else {
										echo '<img src="uploads/'.$rows1['bg'].'"'.'alt="" />';
										}
	                    		echo '</div>
	                    		<div class="form-name">
	                        		'.$rows['form_title'].'
	                    		</div>
	                    		<div class="img-counter">
	                        		<div class="counter">';
	                            		if($day>=0) echo '<span class="time-left">还有'.$day.'天'.$hour.'小时'.$minute.'分钟</span>';
	                            		else echo '<span class="time-left">已到期</span>';
										echo '<span class="written">'.$rows['answer_times'].'</span>
	                        		</div>
	                    		</div>
	                		</div>
            			</a>
					</div>
        			</div>';
    		}
					?>
					<div class="section-col">
                        <div class="card my-release create-new" > 
                            <a href="create.php">
                                <div class="img-holder">
                                    <b>+</b>
                                    <p>点此创建新表</p>
                                </div>
                            </a>	
                        </div>
                    </div>
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
				<div class="section-body clear-float">
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
				</div>
			</div>
		</li>
		<li class="innerWrapper3">
			<div id='my-browse' class="section">
				<div class="section-header">
					<h2>我浏览的<i>(建设中)</i></h2>
					<div class="h2-line">
					</div>
				</div>
				<div class="section-body clear-float">
                    <div class="section-col">
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
        </div>
    </div>
</div>

<?php
     include 'includes/footer.inc.php';
?>
</body>
<script src='js/iscroll.js'></script>
<script src='js/common.js'></script>
<script>
function toggleOnline(id) {
	$id = $(id);
	if($id.hasClass("up-shelf")){
		//上架操作
		$id.removeClass("up-shelf").addClass("down-shelf").attr("title","下架");
	}else {
		//下架操作
		$id.removeClass("down-shelf").addClass("up-shelf").attr("title","上架");
	}
}
</script>
</html>