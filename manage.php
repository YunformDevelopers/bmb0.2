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
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link rel="stylesheet" href="style/index.css"></link>
<link rel="stylesheet" href="style/msg.css"></link>
<link rel="stylesheet" href="style/manage.css"></link>
<link rel="stylesheet" href="style/responsive.css"></link>
<!--下面这个样式是提示框的一个样式-->
<link rel="stylesheet" href="style/test.css" />
<!--下面这个js文件是为了兼容IE的媒体查询而准备的-->
<script src="js/css3-mediaqueries.js"></script>
<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="js/jquery.flot.min.js"></script>
<script type="text/javascript" src="js/jquery.flot.pie.min.js"></script>
<script type="text/javascript" src="js/jquery.zclip.min.js"></script>
<script type="text/javascript" src="js/msg.js"></script>
<script type="text/javascript" src="js/manage.js"></script>
<script type="text/javascript" src="js/jquery.pin.min.js"></script>
<script src='js/iscroll.js'></script>
</head>
<body>
<?php include 'includes/header.inc.php';
if(!isset($_COOKIE['srtp-username']))
	{
		do_js_alert("请先登录再访问该页");
		do_js_link('index.php');
	}?>
<div id="tab-container">
	<ul class="tab-list clear-float">
    	<li class="tab-item left active">
        	<a class="tab-link" onClick="slideTo(0);">
        		<span class="tab-name">统计图</span>
            </a>
        </li>
        <li class="tab-item left">
        	<a class="tab-link" onClick="slideTo(1);">
        		<span class="tab-name">实时数据</span>
            </a>
        </li>
        <li class="tab-item left">
        	<a class="tab-link" onClick="slideTo(2);">
        		<span class="tab-name">管理工具</span>
            </a>
        </li>
    </ul>
</div>
<div id="wrapper" class="content-container">		
	<ul id="scroller" class="content">
		<li class="innerWrapper">
			<div id='manage-graph' class="section">
				<div class="section-header">
					<h2>统计图</h2>
					<div class="h2-line">
					</div>
				</div>
				<div class="section-body">
					<div id="graph-card-container" class="clear-float">
						<div class="graph-col">
                            <div class="graph-card now">
                                <div class="card-content">
                                    <ul class="now-kpi-list">
                                        <li class="now-total-fill">
                                            <p class="column-head">当前填写总人数</p>
                                            <h3 class="column-body"><?php connect();
                                            $sql="select * from question where form_id=".$_GET['id'];
                                            $result=mysql_query($sql);
                                            while($row=mysql_fetch_array($result)){
                                            	echo $row['answer_times'];
                                            }?></h3>
                                        </li>
                                        <li class="new-fill">
                                            <span class="column-head">今日新增填写人数</span>
                                            <span class="column-body"><?php connect();
                                            $sql="select * from answer where form_id=".$_GET['id'];
                                            $result=mysql_query($sql);
                                            date_default_timezone_set("Asia/Shanghai");
                                            $date['today']=date("Y-m-d");
                                            $date['yesterday']=date("Y-m-d",strtotime("-1 day"));
                                            $number['today']=0;
                                            $number['yesterday']=0;
                                            while($row=mysql_fetch_array($result)){
												$pattern='/'.$date['today'].'/';
												$pattern2='/'.$date['yesterday'].'/';
												if(preg_match($pattern, $row['date'])){
													$number['today']++;
												}else if(preg_match($pattern2, $row['date'])){
													$number['yesterday']++;
												}
                                            }
                                            echo $number['today']?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="graph-col">
                            <div class="graph-card yesterday">
                                <div class="card-header">
                                    <h4>昨日关键指标</h4>
                                </div>
                                <div class="card-control"></div>
                                <div class="card-content">
                                    <ul class="yesterday-kpi-list clear-float">
                                        <li class="column">
                                            <p class="column-body has-border"><?php echo $number['yesterday'];getAllfill($_GET['id']);?></p>
                                            <p class="column-head">新增填写人数</p>
                                        </li>
                                        <li class="column">
                                            <p class="column-body has-border">
                                            <?php $sql='select * from click where time="'.date("Y-m-d",strtotime("-1 day")).'"'; 
                                            	$result=mysql_query($sql);
                                            	echo mysql_affected_rows();
                                            ?>
                                            </p>
                                            <p class="column-head">新增浏览人数</p>
                                        </li>
                                        <li class="column">
                                            <p class="column-body">0</p>
                                            <p class="column-head">新增收藏人数</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="graph-col">
                            <div class="graph-card source">
                                <div class="card-header">
                                    <h4>流量来源分布(<i>建设中</i>)</h4>
                                </div>
                                <div class="card-control">
                                <?php 
                                ?></div>
                                <div class="card-content">
                                    <div class="graph-container" id="source-graph" style="width:300px; height:130px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="graph-col trend">
                            <div class="graph-card trend">
                                <div class="card-header">
                                    <h4>总趋势折线图(<i>建设中</i>)</h4>
                                </div>
                                <div class="card-control"></div>
                                <div class="card-content">
                                    <div class="graph-container" id="trend-graph" style="width:800px; height:250px; margin:0 auto;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</li>
		<li class="innerWrapper2">
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
													$title=$row['form_title'];
													$string=explode('δ', $row['question_string']);
													for($i=0;$i<count($string)-1;$i++){
														$explode1 = explode('α', $string[$i]);
														$question = $explode1[0];
														echo '<option value="'.($i+1).'-'.$_GET['id'].'">'.($i+1).':'.$question.'</option>';
													}
												}
												else{
													//do_js_alert('请从正确路径访问该页');
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
							<?php 
							connect();
							$question_num=1;
							$id=$_GET['id'];
							$result=mysql_query("select * from answer where form_id='".$id."'");
							$j=1;
							while($rows=mysql_fetch_assoc($result)){
									$string="";
									$answer_array=explode('δ',$rows['answer_string']);
									$answer=explode('γ',$answer_array[intval($question_num)-1]);
									if(strpos($answer[0],'$_FILES-')===0){
										$filename=explode('$_FILES-', $answer[0]);
										echo '
										<tr class="a-all-msg" id="'.$rows['id'].'" onClick="aAllMsgPopOver();">
	 									<td class="col-1 a-order">
	 									'.($j++).'
	 									</td>
										<a href="uploads/'.$filename[1].'">
	 									<td class="col-2 a-content">';
										for($i=0;$i<count($answer)-1;$i++){
											$string.=$answer[$i].";";
										}
										echo '<a href="uploads/'.$filename[1].'">'.'点击我查看文件'.'</a>
										</td>
							 			<td class="col-3 q-number">
										'.$rows['id'].'
							 			</td>
							 			<td class="col-4 a-time">
							 			'.$rows['date'].'
							 			</td>
							 			</tr>
										';
									}else{
										$string="";
										$answer_array=explode('δ',$rows['answer_string']);
										$answer=explode('γ',$answer_array[intval($question_num)-1]);
										echo '<tr class="a-all-msg" id="'.$rows['id'].'" onClick="aAllMsgPopOver();">
	 									<td class="col-1 a-order">
	 									'.($j++).'
	 									</td>
	 									<td class="col-2 a-content">';
										for($i=0;$i<count($answer)-1;$i++){
											$string.=$answer[$i].";";
										}
										echo $string.'</td>
							 			<td class="col-3 q-number">
										'.$rows['id'].'
							 			</td>
							 			<td class="col-4 a-time">
							 			'.$rows['date'].'
							 			</td>
							 			</tr>';
									}
									
									
								
							}
							?>
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
							 -->

						</table>
						<table class="matrix-table" cellpadding="0" cellspacing="0" >
							<tr class="a-all-msg1">
								<?php 
								connect();
								$question_num=1;
								$id=$_GET['id'];
								$result=mysql_query("select * from answer where form_id='".$id."'");
								$j=1;
								while($rows=mysql_fetch_assoc($result)){
									$string="";
									$answer_array=explode('δ',$rows['answer_string']);
									$answer=explode('γ',$answer_array[intval($question_num)-1]);
									for($i=0;$i<count($answer)-1;$i++){
										$string.=$answer[$i].";";
									}
									echo '<td class="answer-container matrix-td"  onclick="aAllMsgPopOver();">
		 									<p class="a-content">
												<a href="#" title="" id="">';
													echo $string.'
												</a>
								 			</p>
								 			<p class="a-time">
								 				'.$rows["date"].'
								 			</p>
								 		</td>';
										} 
								
								?>
								<!--<td class="answer-container a-all-msg">
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
								</td>  -->
							</tr>
						 </table>
					</div>
					</div>
				</div>
		</li>
		<li class="innerWrapper3">
			<div id='manage-tool' class="section">
				<div class="section-header">
					<h2>管理工具</h2>
					<div class="h2-line">
					</div>
				</div>
				<div class="section-body" unselectable="on" onselectstart="return false;" style="-moz-user-select:none;">
					<div class="tool" id="manage-xls">
						<!--<a target="_blank" class="tool-btn" <?php echo 'href="makecsv.php?id='.$_GET['id'].'"'; ?> title="下载已填写的数据的表格">-->
						<a onclick="makeCsv();" class="tool-btn" href="#" title="下载已填写的数据的表格">
							XLS
						</a>
                        <p class="tool-info">
                        下载已填写的数据的表格<br /><br />
                        </p>
					</div>
					<div class="tool" id="manage-rar">
						<a class="tool-btn" href="#" title="下载打包的Word文档">
							RAR
						</a>
                        <p class="tool-info">
                        下载打包的Word文档<br /><br />
                        </p>
					</div>
					<div class="tool" id="manage-txt">
						<a class="tool-btn" <?php echo 'href="makefetioncsv.php?id='.$_GET['id'].'"'; ?> title="向联系人群发短信">
							短信
						</a>
                        <p class="tool-info">
                        向联系人群发短信<br /><a style="color:#F00;" href="fetion-tutorial.html" title="飞信批量加好友教程">飞信批量加好友教程</a><br />
                        </p>
					</div>
					<div class="tool" id="manage-zongsu">
						<a class="tool-btn" href="#" title="发送申请综素表格">
							综素
						</a>
                        <p class="tool-info">
                        发送申请综素表格<br /><br /><br />
                        </p>
					</div>
					<div class="tool" id="manage-erke">
						<a class="tool-btn" href="#" title="发送申请二课表格">
							二课
						</a>
                        <p class="tool-info">
                        发送申请二课表格<br /><br /><br />
                        </p>
					</div>
					<div class="tool" id="manage-add">
						<a class="tool-btn" href="#" title="发送申请二课表格" id="manage-add-msg">
							+
						</a>
                        <p class="tool-info">
                        你还需要什么功能？<a style="color:#F00;" onclick='msgPopOver("msg.php #feedback-msg-content");'>点击这里</a>告诉我们！<br />
                        </p>
					</div>
						<!-- 这里是用来使元素左端对齐的 -->
					<div class='tool left-fix'>&nbsp;</div>
					<div class='tool left-fix'>&nbsp;</div>
					<div class='tool left-fix'>&nbsp;</div>
					<div class='tool left-fix'>&nbsp;</div>
					<div class='tool left-fix'>&nbsp;</div>
					<div class='tool left-fix'>&nbsp;</div>
					<div class='tool left-fix'>&nbsp;</div>
					<div class='tool left-fix'>&nbsp;</div>
				</div>
			</div>
		</li>
	</ul>
</div>

<div id="whole-msg-bg" onclick="msgSlideDn();boxSlideUp();"><!-- 这里boxSlideUp只在有box的页面调用 -->
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
<?php
     include 'includes/footer.inc.php';
?>
</body>
<script src='js/common.js'></script>
</html>