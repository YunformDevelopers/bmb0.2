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
<script>
	$(document).ready(function(){
		alert($('body').find('#test').html());
	})
</script>
<?php
    require 'includes/header.inc.php';
    
?>
</head>
<body>
    <a href="test2.php" id="test">跳转到我</a>
<?php
     include 'includes/footer.inc.php';
?>
</body>
</html>