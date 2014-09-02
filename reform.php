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
		        	if(isset($_COOKIE['srtp-username'])){
		        		if(isset($_GET['id'])){
							connect();
							$result3=mysql_query("select * from answer where form_id = '".$_GET['id']."'");
							if(mysql_affected_rows()){
								do_js_alert("您填写过该表，转向您之前填写的表格进行修改");
								do_js_link('fillanswer.php?id='.$_GET['id']);
							}else{
								$result=mysql_query("select * from question where form_id = '".$_GET['id']."'");
								$result1=mysql_query("select * from decoration where form_id = '".$_GET['id']."'");
								while($rows=mysql_fetch_assoc($result)){
									$rows1=mysql_fetch_assoc($result1);
									$old=strtotime($rows1['form_expire_time']);
									date_default_timezone_set("Asia/Shanghai");
									$new=strtotime(date("Y-m-d h:i:s"));
									if($new>$old){
										do_js_alert("该表已超过建表者规定的填表时间！");
										do_js_link('index.php');
									}else if($rows['answer_times']>=$rows1['form_number_limit']){
										do_js_alert("该表的填写人数已超过限制");
										do_js_link('index.php');
									}else{
										create_to_db($rows);
										$array=$rows;
										$array['click_times']=intval($array['click_times'])+1;
										update('question', $array,"form_id='".$_GET['id']."'");
									}
								}
							}
						}else{
						do_js_alert('请从正确路径访问该页');
						do_js_link('index.php');
						}
					}else{
						do_js_alert("请先登录");
						do_js_link('index.php');	
					}
							        	
		        	?>
</body>
</html>