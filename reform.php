<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--下面这meta意思是告知浏览器的宽度是设备的宽度，缩放值为1.0-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>表格填写</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link rel="stylesheet" href="style/form/paper.css" />
<link rel="stylesheet" href="style/form/form-responsive.css"/>
<link rel="stylesheet" href="style/index.css"></link>
<link rel="stylesheet" href="style/msg.css"></link>
<link rel="stylesheet" href="style/responsive.css"></link>
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/answerCookie.js"></script>
<?php require 'includes/includes.inc.php';?>
</head>
<body>

		        	<?php 
		        	if(isset($_GET['id'])){
						connect();
						$result=mysql_query("select * from question where form_id = '".$_GET['id']."'");
						while($rows=mysql_fetch_assoc($result)){
							create_to_db($rows);
						}
                    }else{
                    	do_js_alert('请从正确路径访问该页');
                    	do_js_link('index.php');
                    }
		        	?>
</body>
</html>