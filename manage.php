<?php
header('Content-Type:text/html; charset=utf-8');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--下面这meta意思是告知浏览器的宽度是设备的宽度，缩放值为1.0-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>管理——某次活动报名表</title>
<link rel="stylesheet" href="style/index.css"></link>
<link rel="stylesheet" href="style/msg.css"></link>
<link rel="stylesheet" href="style/manage.css"></link>
<link rel="stylesheet" href="style/responsive.css"></link>
<!--下面这个样式是提示框的一个样式-->
<link rel="stylesheet" href="style/test.css" />
<!--下面这个js文件是为了兼容IE的媒体查询而准备的-->
<script src="js/css3-mediaqueries.js"></script>
<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.4.js"></script>
<script type="text/javascript" src="js/showtips.js"></script>
<!--<script type="text/javascript" src="test for Liang/test.js"></script>
--><script type="text/javascript" src="js/msg.js"></script>
<script type="text/javascript" src="js/manage.js"></script>
<!--<script type="text/javascript">
var pre_scrollTop=0;//滚动条事件之前文档滚动高度
var pre_scrollLeft=0;//滚动条事件之前文档滚动宽度
var obj_th;
 
window.onload =function () {
    pre_scrollTop=(document.documentElement.scrollTop || document.body.scrollTop);
    pre_scrollLeft=(document.documentElement.scrollLeft || document.body.scrollTop);
    obj_th=document.getElementById("th");
};
window.onscroll = function(){
    if(pre_scrollTop != (document.documentElement.scrollTop || document.body.scrollTop)){
        //滚动了竖直滚动条
        pre_scrollTop=(document.documentElement.scrollTop || document.body.scrollTop);
        if(obj_th){
            obj_th.style.top=(document.documentElement.scrollTop || document.body.scrollTop)+"px";
        }
    }
    else if(pre_scrollLeft != (document.documentElement.scrollLeft || document.body.scrollLeft)){
        //滚动了水平滚动条
        pre_scrollLeft=(document.documentElement.scrollLeft || document.body.scrollLeft);
    }
};
</script>
-->
</head>
<?php include 'includes/header.inc.php';?>

<div id='manage-tool' class="section">
	<div class="section-header">
        <h2>管理工具箱</h2>
        <div class="h2-line">
        </div>
    </div>
    <div class="section-body" unselectable="on" onselectstart="return false;" style="-moz-user-select:none;">
    	<div class="tool" id="manage-xls">
        	<a href="#" title="下载已填写的数据的表格">
            	XLS
            </a>
        </div>
    	<div class="tool" id="manage-rar">
        	<a href="#" title="下载打包的Word文档">
            	RAR
            </a>
        </div>
    	<div class="tool" id="manage-txt">
        	<a href="#" title="向联系人群发短信">
            	短信
            </a>
        </div>
    	<div class="tool" id="manage-zongsu">
        	<a href="#" title="发送申请综素表格">
            	综素
            </a>
        </div>
    	<div class="tool" id="manage-erke">
        	<a href="#" title="发送申请二课表格">
            	二课
            </a>
        </div>
        <div class="tool" id="manage-add">
        	<a href="#" title="发送申请二课表格" id="manage-add-msg">
            	+
            </a>
        </div>

    	    <!-- 这里是用来使元素左端对齐的 -->
        <div class='tool left-fix'>&nbsp;</div>
        <div class='tool left-fix'>&nbsp;</div>
        <div class='tool left-fix'>&nbsp;</div>
        <div class='tool left-fix'>&nbsp;</div>
	</div>
</div>
<div id='manage-table' class="section">
	<div class="section-header">
        <h2>实时数据</h2>
        <div class="h2-line">
        </div>
    </div>
    <div class="section-body">
		<div id="table-menu"  unselectable="on" onselectstart="return false;" style="-moz-user-select:none;">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<th id="table-tool" class="col-1">
						<span id="table-view">
							<a id="dfdfd" class="list-view active" title="列表视图"  >
							<b></b>
							
							</a><a class="matrix-view" title="矩阵视图" >
							<b></b>
							
							</a>
						</span>
						<span class="quick-search">
							<a>
								<input type="text" class="search" placeholder="搜索答案" >
								</input>
								<input type="submit" class="btn red" name="quick-search" value="搜索" />
							</a>
						</span>
						
					</th>
					<th id="table-select" class="col-2">
						<span class="quick-select">
							<select id="select">
							 <?php
							 	if(isset($_GET['id'])){
										connect();
										$result = mysql_query("select * from question where form_id='".$_GET['id']."'");
										$row = mysql_fetch_array($result);
										$title_string=explode('ζ', $row['question_string']);
										$title=$title_string[0];
										$string=explode('δ', $title_string[1]);
										for($i=0;$i<count($string)-1;$i++){
											$explode1 = explode('α', $string[$i]);
											$question = $explode1[0];
											echo '<option value="'.($i+1).'-'.$_GET['id'].'">'.($i+1).':'.$question.'</option>';
										}
									}
									else{
										do_js_alert('请从正确路径访问该页');
									}
						    ?>
							</select>
						</span>
					
					</th>
					<th id="" class="col-3" style="display:none;">
						<a>对应问题</a>
					
					</th>
					<th id="time-toggle" class="col-4">
						<a>填写时间<span class="now2past">↓</span><span class="past2now">↑</span></a>
					
					</th>
				</tr>
			</table>
		</div>
        
        <div id="answer-field">
			<table class="list-table" cellpadding="0" cellspacing="0" >
				<!-- <tr class="a-all-msg">
					<td class="col-1 a-order">
					1
					</td>
					<td class="col-2 a-content">请问你的梦想是什么呢？你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎
					</td>
					<td class="col-3 q-number">
					</td>
					<td class="col-4 a-time">
					2014-6-17
					</td>
				</tr>
				<tr class="a-all-msg">
					<td class="col-1 a-order">
					2
					</td>
					<td class="col-2 a-content">请问你的梦想是什么呢？你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎
					</td>
					<td class="col-3 q-number">
					</td>
					<td class="col-4 a-time">
					2014-09-27
					</td>
				</tr>
				<tr class="a-all-msg">
					<td class="col-1 a-order">
					3
					</td>
					<td class="col-2 a-content">请问你的梦想是什么呢？你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎
					</td>
					<td class="col-3 q-number">
					</td>
					<td class="col-4 a-time">
					2014-6-17
					</td>
				</tr>
				<tr class="a-all-msg">
					<td class="col-1 a-order">
					4
					</td>
					<td class="col-2 a-content">请问你的梦想是什么呢？你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎
					</td>
					<td class="col-3 q-number">
					</td>
					<td class="col-4 a-time">
					2014-09-27
					</td>
				</tr>
				<tr class="a-all-msg">
					<td class="col-1 a-order">
					5
					</td>
					<td class="col-2 a-content">请问你的梦想是什么呢？你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎
					</td>
					<td class="col-3 q-number">
					</td>
					<td class="col-4 a-time">
					2014-09-27
					</td>
				</tr>
				<tr class="a-all-msg">
					<td class="col-1 a-order">
					6
					</td>
					<td class="col-2 a-content">请问你的梦想是什么呢？你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎
					</td>
					<td class="col-3 q-number">
					</td>
					<td class="col-4 a-time">
					2014-09-27
					</td>
				</tr>
				<tr class="a-all-msg">
					<td class="col-1 a-order">
					7
					</td>
					<td class="col-2 a-content">请问你的梦想是什么呢？你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎
					</td>
					<td class="col-3 q-number">
					</td>
					<td class="col-4 a-time">
					2014-09-27
					</td>
				</tr>
				<tr>
					<td class="col-1 a-order">
					8
					</td>
					<td class="col-2 a-content">请问你的梦想是什么呢？你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎
					</td>
					<td class="col-3 q-number">
					</td>
					<td class="col-4 a-time">
					2014-09-27
					</td>
				</tr>
				<tr>
					<td class="col-1 a-order">
					9
					</td>
					<td class="col-2 a-content">请问你的梦想是什么呢？你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎
					</td>
					<td class="col-3 q-number">
					</td>
					<td class="col-4 a-time">
					2014-09-27
					</td>
				</tr> -->

			</table>
        	<table class="matrix-table" cellpadding="0" cellspacing="0" >
				<tr>
					<td class="answer-container a-all-msg">
						<p class="a-content">
							<a href="#" title="" id="">
								请问你的梦想是什。欢迎
							</a>
						</p>
						<p class="a-time">2014-6-17 18:45 填写</p>
					</td>
					<td class="answer-container a-all-msg">
						<p class="a-content">
							<a href="#" title="" id="">
								请问你的梦想是什么呢？你是怎么走到这我培养过一个冠军。欢迎
							</a>
						</p>
						<p class="a-time">2014-6-17 18:45 填写</p>
					</td>
					<td class="answer-container a-all-msg">
						<p class="a-content">
							<a href="#" title="" id="">
								请问你的梦想是什么呢？你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎
							</a>
						</p>
						<p class="a-time">2014-6-17 18:45 填写</p>
					</td>
					<td class="answer-container a-all-msg">
						<p class="a-content">
							<a href="#" title="" id="">
								请
							</a>
						</p>
						<p class="a-time">2014-6-17 18:45 填写</p>
					</td>
					<td class="answer-container a-all-msg">
						<p class="a-content">
							<a href="#" title="" id="">
								请问过一个冠军。欢迎
							</a>
						</p>
						<p class="a-time">2014-6-17 18:45 填写</p>
					</td>
				</tr>
				<tr>
					<td class="answer-container a-all-msg">
						<p class="a-content">
							<a href="#" title="" id="">
								请问你的梦想是什么呢？你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎
							</a>
						</p>
						<p class="a-time">2014-6-17 18:45 填写</p>
					</td>
					<td class="answer-container a-all-msg">
						<p class="a-content">
							<a href="#" title="" id="">
								请问你的梦想是什么呢？你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎
							</a>
						</p>
						<p class="a-time">2014-6-17 18:45 填写</p>
					</td>
				</tr>
             </table>
        </div>
		</div>
	</div>
</div>

<!--以下的bojs的弹出函数，但表现形式有所不同，在需要用到这个box的页面才需要，例如需要预览图片、表格等等-->
<div class='box'>
	<div class='box-border'>
		<div class='box-content'>
    
    
    	</div>
    </div>
</div>

<div class='msg'>
    <div class='msg-border'>
        <div class='msg-content'>
        <!--内容是动态获得的-->			
        </div>
    </div>
</div>

<div id='footer'>
	<div id='footer-logo'>
		YunFORM
	</div>
	<div id='footer-info'>
		<p>版权所有 YunFORM小组 2014-2014</p>
		<p>浙ICP备05074421号 Copyright © 2014-2014</p>
		<p>设计制作:Lu | Liang | Su</p>
		<p>技术指导:Li | Yu</p>
		<p>友情链接：CC98 | 飘渺水云间 | 缘网 | NexusHD | 浙大学习网</p>
	</div>
	<div id='footer-contact'>
		<ul>
			<li>建议反馈</li>
			<li>关于本站</li>
			<li><a id="contact-msg">联系方式</a></li>
			<li><a id="work-msg">任务流程</li>
			<li>合作服务</li>
		</ul>
	</div>
	<div class='justify-helper'></div>
</div>

</body>
</html>