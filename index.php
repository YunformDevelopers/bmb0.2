<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--下面这meta意思是告知浏览器的宽度是设备的宽度，缩放值为1.0-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>首页</title>
<link rel="stylesheet" href="style/index.css"></link>
<link rel="stylesheet" href="style/msg.css"></link>
<link rel="stylesheet" href="style/responsive.css"></link>
<!--下面这个样式是提示框的一个样式-->
<link rel="stylesheet" href="style/test.css" />
<!--下面这个js文件是为了兼容IE的媒体查询而准备的-->
<script src="js/css3-mediaqueries.js"></script>
<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="js/showtips.js"></script>
<script type="text/javascript" src="test for Liang/test.js"></script>
<script type="text/javascript" src="js/msg.js"></script>
<?php
    require 'includes/header.inc.php';
?>
</head>
<body>
<div id='slideshow'>
	
</div>
<div id='hottest' class="section">
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
</div>
<div id='newest' class="section">
	<div class="section-header">
        <h2>新上架</h2>
        <div class="h2-line">
        </div>
    </div>
    <div class="section-body">
    	<?php 
    		connect();
    		$result=mysql_query("select * from question order by Date desc limit 4") or die(mysql_error());
    		while($row=mysql_fetch_assoc($result)){
    			echo '<div class="card newest" >';
				echo '<a href="reform.php?id='.$row['form_id'].'&data='.$row['question_string'].'">';
				echo '<div class="img-holder">
			    		<div class="fader">
			    		<img src="images/5.jpg" alt="" />
			    	</div>
    		<div class="form-name">
    		'.$row['form_title'].'
    		</div>
    		<div class="img-counter">
    		<div class="counter">
    		<span class="time-left">还有两天</span>
    				<span class="written">14次</span>
    				</div>
    				</div>
    				</div>';
    		}
    		
    		
    	?>
        <!--<div class="card newest" > 
            <a href='#'>
                <div class="img-holder">
                    <div class="fader">
                        <img src="images/5.jpg" alt="" />
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
        <div class="card newest" > 
            <a href='#'>
                <div class="img-holder">
                    <div class="fader">
                        <img src="images/6.jpg" alt="" />
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
        <div class="card newest" > 
            <a href='#'>
                <div class="img-holder">
                    <div class="fader">
                        <img src="images/7.jpg" alt="" />
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
        <div class="card newest" > 
            <a href='#'>
                <div class="img-holder">
                    <div class="fader">
                        <img src="images/8.jpg" alt="" />
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
        </div>  -->
    <!-- 这里是用来使元素左端对齐的 -->
        <div class='card left-fix'>&nbsp;</div>
        <div class='card left-fix'>&nbsp;</div>
        <div class='card left-fix'>&nbsp;</div>
        <div class='card left-fix'>&nbsp;</div>
    </div>
</div>
<div class='reminder'>
	<p>没找到想要的？试试搜索</p>
	<div class='search'>
		<form id="search" action="#">
 			<input class="search-text" type="text" placeholder="search" name="q"></input>
		</form>
	</div>
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