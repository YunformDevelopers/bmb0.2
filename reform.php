<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--下面这meta意思是告知浏览器的宽度是设备的宽度，缩放值为1.0-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>社团需求调查表</title>
<link rel="stylesheet" href="style/form/paper.css" />
<link rel="stylesheet" href="style/form/form-responsive.css"/>
<script src="js/jquery-2.1.1.min.js"></script>
<?php require 'includes/includes.inc.php';?>
</head>
<body>
	<div id="form-field">
	        <div id="form-title">
	            <h3>社团需求调查表</h3>
	        </div>
	        <div id="form-intro" >
	            注：标 * 的题目为必填
	        </div>
	        <div id="form-body">
	        	<form method="post" action="formaction.php">
	        	    <input type="hidden" name="action" value="answer"/>
	        	    <input type="hidden" name="id" value="1"/>
		        	<?php create_to_db();?>
		        	<input id="submit" class="btn red" name="submit" type="submit" value="提交" />
                </form>   
            </div>
	</div>
	<div id="footer">
		<p>Powered by 报名吧</p>
		<p>由于网站还在开发，不能提供最佳的用户体验，希望您能理解！</p>
	</div>
</body>
</html>