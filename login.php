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
<div id="login-msg-content">
	<div class="left">
        <h3>登录</h3>
            <form name="" method="post" action="index.php">
                <dl>
                    <dd>邮　　箱：<input type="text" name="username" class="text" /></dd>
                    <dd>密　　码：<input type="password" name="password" class="text" /></dd>
                    <dd><input type="checkbox" />记住我（在公共计算机上请勿勾选）</dd>
                    <dd><input type="submit"  class="submit btn red" value="登录" /></dd>
                </dl>
            </form>
     </div>
     <div class="right">
         <div class="zju-passport">
            <a href="#">浙大通行证登录</a>
         </div>
         <a href="#" id="register-msg" onclick="registerMsgPopOver()" >还没有账号？10秒快速注册</a>
     </div>
</div>
<?php
     include 'includes/footer.inc.php';
?>
</body>

<script src='js/common.js'></script>
</html>