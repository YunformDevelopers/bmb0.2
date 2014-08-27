<?php
header('Content-Type:text/html; charset=utf-8');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>创建</title>
<link rel="stylesheet" href="style/index.css"></link>
<link rel="stylesheet" href="style/create.css"></link>
<link rel="stylesheet" href="style/form/paper.css"></link>
<link rel="stylesheet" href="style/form/form-responsive.css"></link>
<link rel="stylesheet" type="text/css" href="style/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="style/simditor.css" />
<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.4.js"></script>
<script type="text/javascript" src="js/simditor-all.js"></script>
<script type="text/javascript" src="js/msg.js"></script>
<style >
	#form-construct-field {
		overflow:auto;
	}
	#form-field {
		width:100%;
		overflow-y:auto;	
		overflow-x:hidden;
	}
	#next-step {
		width:100%;
	}
	#submit {
		margin:5px auto;
	}
	#tool-field {
		width:300px;
	}
	.tool-personalize-list #form-expire-time, .tool-personalize-list #form-number-limit {
		text-align:center;
		width:5.5em;
		border:none;
		outline:none;
		border-bottom:solid 1px #ccc;
	}
	.tool-personalize-list #form-number-limit {
		width:8.5em;
	}
.ui-datepicker {
	padding: .2em .2em 0;
	display: none;
	font-size:12px;
}
.ui-datepicker .ui-datepicker-header {
	position: relative;
	padding: .2em 0;
}
.ui-datepicker .ui-datepicker-prev,
.ui-datepicker .ui-datepicker-next {
	position: absolute;
	top: 2px;
	width: 1.8em;
	height: 1.8em;
}
.ui-datepicker .ui-datepicker-prev-hover,
.ui-datepicker .ui-datepicker-next-hover {
	top: 1px;
}
.ui-datepicker .ui-datepicker-prev {
	left: 2px;
}
.ui-datepicker .ui-datepicker-next {
	right: 2px;
}
.ui-datepicker .ui-datepicker-prev-hover {
	left: 1px;
}
.ui-datepicker .ui-datepicker-next-hover {
	right: 1px;
}
.ui-datepicker .ui-datepicker-prev span,
.ui-datepicker .ui-datepicker-next span {
	display: block;
	position: absolute;
	left: 50%;
	margin-left: -8px;
	top: 50%;
	margin-top: -8px;
}
.ui-datepicker .ui-datepicker-title {
	margin: 0 2.3em;
	line-height: 1.8em;
	text-align: center;
}
.ui-datepicker .ui-datepicker-title .ui-datepicker-year, .ui-datepicker .ui-datepicker-title .ui-datepicker-month {
	font-weight:bold;
	color:#000;
}
.ui-datepicker .ui-datepicker-title select {
	font-size: 1em;
	margin: 1px 0;
}
.ui-datepicker select.ui-datepicker-month,
.ui-datepicker select.ui-datepicker-year {
	width: 45%;
}
.ui-datepicker table {
	width: 100%;
	font-size: .9em;
	border-collapse: collapse;
	margin: 0 0 .4em;
}
.ui-datepicker th {
	padding: .7em .3em;
	text-align: center;
	font-weight: bold;
	border: 0;
}
.ui-datepicker td {
	border: 0;
	padding: 1px;
	text-align:center;
	valign:middle;	
}
.ui-datepicker td span,
.ui-datepicker td a {
	display: block;
	padding: .2em;
	text-align: center;
	text-decoration: none;
	width: 24px; height:24px; line-height:24px;
}
.ui-datepicker .ui-datepicker-buttonpane {
	background-image: none;
	margin: .7em 0 0 0;
	padding: 0 .2em;
	border-left: 0;
	border-right: 0;
	border-bottom: 0;
}
.ui-datepicker .ui-datepicker-buttonpane button {
	float: right;
	margin: .5em .2em .4em;
	cursor: pointer;
	padding: .2em .6em .3em .6em;
	width: auto;
	overflow: visible;
}
.ui-datepicker .ui-datepicker-buttonpane button.ui-datepicker-current {
	float: left;
}

/* with multiple calendars */
.ui-datepicker.ui-datepicker-multi {
	width: auto;
}
.ui-datepicker-multi .ui-datepicker-group {
	float: left;
}
.ui-datepicker-multi .ui-datepicker-group table {
	width: 95%;
	margin: 0 auto .4em;
}
.ui-datepicker-multi-2 .ui-datepicker-group {
	width: 50%;
}
.ui-datepicker-multi-3 .ui-datepicker-group {
	width: 33.3%;
}
.ui-datepicker-multi-4 .ui-datepicker-group {
	width: 25%;
}
.ui-datepicker-multi .ui-datepicker-group-last .ui-datepicker-header,
.ui-datepicker-multi .ui-datepicker-group-middle .ui-datepicker-header {
	border-left-width: 0;
}
.ui-datepicker-multi .ui-datepicker-buttonpane {
	clear: left;
}
.ui-datepicker-row-break {
	clear: both;
	width: 100%;
	font-size: 0;
}

/* RTL support */
.ui-datepicker-rtl {
	direction: rtl;
}
.ui-datepicker-rtl .ui-datepicker-prev {
	right: 2px;
	left: auto;
}
.ui-datepicker-rtl .ui-datepicker-next {
	left: 2px;
	right: auto;
}
.ui-datepicker-rtl .ui-datepicker-prev:hover {
	right: 1px;
	left: auto;
}
.ui-datepicker-rtl .ui-datepicker-next:hover {
	left: 1px;
	right: auto;
}
.ui-datepicker-rtl .ui-datepicker-buttonpane {
	clear: right;
}
.ui-datepicker-rtl .ui-datepicker-buttonpane button {
	float: left;
}
.ui-datepicker-rtl .ui-datepicker-buttonpane button.ui-datepicker-current,
.ui-datepicker-rtl .ui-datepicker-group {
	float: right;
}
.ui-datepicker-rtl .ui-datepicker-group-last .ui-datepicker-header,
.ui-datepicker-rtl .ui-datepicker-group-middle .ui-datepicker-header {
	border-right-width: 0;
	border-left-width: 1px;
}
.ui-helper-clearfix:before,
.ui-helper-clearfix:after {
	content: "";
	display: table;
	border-collapse: collapse;
}
.ui-helper-clearfix:after {
	clear: both;
}
.ui-helper-clearfix {
	min-height: 0; /* support: IE7 */
}
.ui-widget-content {
	border: 1px solid #aaaaaa;
	background: #fff ;
	color: #222222;
}
.ui-widget-content a {
	color: #222222;
}
/* Corner radius 
.ui-corner-all,
.ui-corner-top,
.ui-corner-left,
.ui-corner-tl {
	border-top-left-radius: 4px;
}
.ui-corner-all,
.ui-corner-top,
.ui-corner-right,
.ui-corner-tr {
	border-top-right-radius: 4px;
}
.ui-corner-all,
.ui-corner-bottom,
.ui-corner-left,
.ui-corner-bl {
	border-bottom-left-radius: 4px;
}
.ui-corner-all,
.ui-corner-bottom,
.ui-corner-right,
.ui-corner-br {
	border-bottom-right-radius: 4px;
}
*/
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
    font-weight: normal;
    color: #555;
}
.ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight {
	border-radius:24px;
    background: #E1331C;
    color: #fff;
}
.ui-state-hover,
.ui-widget-content .ui-state-hover,
.ui-widget-header .ui-state-hover,
.ui-state-focus,
.ui-widget-content .ui-state-focus,
.ui-widget-header .ui-state-focus {
	font-weight: normal;
	color: #DE473A;
}
.ui-state-hover a,
.ui-state-hover a:hover,
.ui-state-hover a:link,
.ui-state-hover a:visited,
.ui-state-focus a,
.ui-state-focus a:hover,
.ui-state-focus a:link,
.ui-state-focus a:visited {
	color: #DE473A;
	text-decoration: none;
}
.ui-datepicker .ui-state-active,
.ui-datepicker .ui-widget-content .ui-state-active,
.ui-datepicker .ui-widget-header .ui-state-active {
	border: 1px solid #E1331C;
	border-radius:24px;
    background: #fff;
    color: #E1331C;
}
.ui-datepicker .ui-state-active a,
.ui-datepicker .ui-state-active a:link,
.ui-datepicker .ui-state-active a:visited {
	color: #E1331C;
	text-decoration: none;
}
	
.ui-datepicker-prev, .ui-datepicker-next {
	cursor:pointer;
}
.ui-datepicker-prev span, .ui-datepicker-next span {
	font-weight:900;
}

.ui-spinner {
	position: relative;
	display: inline-block;
	overflow: hidden;
	padding: 0;
	vertical-align: middle;
	border:none;
}
.ui-spinner-input {
	border: none;
	background: none;
	color: inherit;
	padding: 0;
	margin: 0;
	vertical-align: middle;
}
.ui-spinner-button {
	width: 16px;
	height: 50%;
	font-size: .5em;
	padding: 0;
	margin: 0;
	text-align: center;
	position: absolute;
	cursor: default;
	display: block;
	overflow: hidden;
	right: 0;
}
/* more specificity required here to override default borders */
.ui-spinner a.ui-spinner-button {
	border-top: none;
	border-bottom: none;
	border-right: none;
}
/* vertically center icon */
.ui-spinner .ui-icon {
	position: absolute;
	margin-top: -8px;
	top: 50%;
	left: 0;
	line-height:100%;
	text-align:center;
	vertical-align:central;
}
.ui-spinner-up {
	top: 0;
}
.ui-spinner-down {
	bottom: 0;
}
/* TR overrides */
.ui-spinner .ui-icon-triangle-1-s {
	/* need to fix icons sprite */
	background-position: -65px -16px;
}










</style>

<?php
    require 'includes/header.inc.php';/*
    if(!isset($_COOKIE['srtp-username'])){
    	do_js_alert('请先登录');
    	do_js_link('index.php');
    }*/
?>
</head>
<body>
<div id="wrapper">

    <div id="create-form-steps" unselectable="on" onselectstart="return false;" style="-moz-user-select:none;">
        <div id="create-form-step1" class="step">第一步：基本内容</div>
            <div class="step-div"></div>
        <div id="create-form-step2" class="step">第二步：个性化</div>
            <div class="step-div"></div>
        <div id="create-form-step3" class="step">第三步：发布</div>
        <div class="justify-helper"></div>
        <div id="step-status-set">
            <div class="step-status1"></div>
            <div class="step-status2"></div>
            <div class="step-status3"></div>
            <div class="justify-helper"></div>
        </div>
    </div>
	<div id="field-wrapper">
		<div id="tool-field" unselectable="on" onselectstart="return false;" style="-moz-user-select:none;">
			<div id="tool-save-container">
				<div class="loading-64" style="display:none">
				</div>
				<div class="bg blue"> 
					<a class="tool save" onclick="toolSaveAct(this);" >
					</a>
				</div>
			</div>
			<div id="tool-construct-container">
				<div id="tool-personalize">
					<h4>个性化设置</h4>
					<ul class="tool-personalize-list">
					<form id="formPersonalize" name="formPersonalize" action="#" method='post'>
						<li class="tool-personalize-item">
							<h6>
								<b>1.</b>
								请设置报名表的下架要求
							</h6>
							<p class="personalize-tip" >
								两者满足其一即下架。
							</p>
							<div class="personalize-main">
								当时间到达<input id="form-expire-time" placeholder="默认不限期"></input>时，或者
								当回收的份数达到<input id="form-number-limit" name="form-number-limit" placeholder="默认不限份数">时。
							</div>
						</li>
						<li class="tool-personalize-item">
							<h6>
								<b>2.</b>
								请上传卡片的背景图
							</h6>
							<p class="personalize-tip" ><!-- 该图片同时将出现在报名表的标题背景中，并将影响报名表的配色。 -->
								分辨率为320*200px，格式为jpg。如果不上传，系统将随机分配默认图片。
							</p>
							<div class="personalize-main">
								<input type="file"></input>
							</div>
						</li>
						<li class="tool-personalize-item">
							<h6>
								<b>3.</b>
								请为报名表添加标签
							</h6>
							<p class="personalize-tip" >
								标签之间请用空格分隔
							</p>
							<div class="personalize-main">
								<input id="form-tag"></input>
							</div>
						</li>
					</form>
					</ul>
			  
				</div>
				<div id="tool-container-bg">
					
				</div>
			</div>
		</div>
		<div id="form-construct-field">
		<div id="form-field">
			<div id="form-title">
				<h3>社团需求调查表</h3>
			</div>
			<div id="form-intro" >
				注：标 * 的题目为必填
			</div>
			<ul id="form-body">
				<form method="post" action="#">
				<li id="" class="q1 q-field free-multichoice">
					<div class="q-number"><span>1</span></div>
					<div class="q-whole">
						<div class="q-title">贵社团在纳新宣传时会使用下列哪些宣传方式？(多选)</div>
						<div class="q-alternative" name="required" >*</div>
						<div class="q-body">
							<label><input name="q1-98专楼" type="checkbox" value="98专楼" />98专楼</label>
							<label><input name="q1-人人日志" type="checkbox" value="人人日志" />人人日志</label>
							<label><input name="q1-人人相册" type="checkbox" value="人人相册" />人人相册</label>
							<label><input name="q1-文广摆摊" type="checkbox" value="文广摆摊" />文广摆摊</label>
							<label><input name="q1-纸质宣传单（背面无报名表）" type="checkbox" value="纸质宣传单（背面无报名表）" />纸质宣传单（背面无报名表）</label>
							<label><input name="q1-纸质宣传单（背面有报名表）" type="checkbox" value="纸质宣传单（背面有报名表）" />纸质宣传单（背面有报名表）</label>
							<label><input name="q1-寝室楼道海报" type="checkbox" value="寝室楼道海报" />寝室楼道海报</label>
							<label><input name="q1-青年通" type="checkbox" value="青年通" />青年通</label>
							<label><input name="q1-横幅" type="checkbox" value="横幅" />横幅</label>
						</div>
					</div>
				</li>
				<li id="" class="q2 q-field free-singlechoice">
					<div class="q-number"><span>2</span></div>
					<div class="q-whole">
						<div class="q-title">贵社团是否有开通微信公众号？</div>
						<div class="q-alternative" name="required" >*</div>
						<div class="q-body">
							<label><input name="q2-body" value="是，并且在纳新过程中使用" type="radio" />是，并且在纳新过程中使用</label>
							<label><input name="q2-body" value="是，但纳新时不怎么用" type="radio" />是，但纳新时不怎么用</label>
							<label><input name="q2-body" value="否，但之后可能会开通" type="radio" />否，但之后可能会开通</label>
							<label><input name="q2-body" value="否，暂无此类打算" type="radio" />否，暂无此类打算</label>
						</div>
					</div>
				</li>
				<li id="" class="q3 q-field free-singlechoice">
					<div class="q-number"><span>3</span></div>
					<div class="q-whole">
						<div class="q-title">贵社团在通知人员参与活动时，是采取下列哪种方式？</div>
						<div class="q-alternative" name="required" >*</div>
						<div class="q-body">
							<label><input name="q3-body" value="发飞信" type="radio" />发飞信</label>
							<label><input name="q3-body" value="手机发短信" type="radio" />手机发短信</label>
							<label><input name="q3-body" value="电脑手机助手发短信" type="radio" />电脑手机助手发短信</label>
							<span class="note-position"><label><!--<input name="q3-body" value="其他方式" type="radio" class="note-title" />其他</label><input name="q3-body-note" class="note" type="text" value="请注明"/>--></span>
						</div>
					</div>
				</li>
				<li id="" class="q4 q-field free-singlechoice">
					<div class="q-number"><span>4</span></div>
					<div class="q-whole">
						<div class="q-title">你认为创建线上报名表需要为问题添加备注吗？</div>
						<div class="q-alternative" name="required" >*</div>
						<div class="q-body">
							<label><input name="q4-body" value="很需要" type="radio" />很需要</label>
							<label><input name="q4-body" value="可有可无" type="radio" />可有可无</label>
							<label><input name="q4-body" value="不需要" type="radio" />不需要</label>
						</div>
					</div>
				</li>
				<li id="" class="q5 q-field free-singlechoice">
					<div class="q-number"><span>5</span></div>
					<div class="q-whole">
						<div class="q-title">你认为线上报名表里的社团说明部分是否需要添加图片？</div>
						<div class="q-alternative" name="required" >*</div>
						<div class="q-body">
							<label><input name="q5-body" value="很需要" type="radio" />很需要</label>
							<label><input name="q5-body" value="可有可无" type="radio" />可有可无</label>
							<label><input name="q5-body" value="不需要" type="radio" />不需要</label>
						</div>
					</div>
				</li>
				<li id="" class="q6 q-field free-singlechoice">
					<div class="q-number"><span>6</span></div>
					<div class="q-whole">
						<div class="q-title">你需要在线发送通知短信功能（该功能需要网站支付通信费）吗？</div>
						<div class="q-alternative" name="required" >*</div>
						<div class="q-body">
							<label><input name="q6-body" value="收费（一条九分钱或包年）也愿意使用" type="radio" />收费（一条九分钱或包年）也愿意使用</label>
							<label><input name="q6-body" value="免费才愿意用" type="radio" />免费才愿意用</label>
							<label><input name="q6-body" value="我不想用" type="radio" />我不想用</label>
						</div>
					</div>
				</li>
				<li id="" class="q7 q-field free-singlechoice">
					<div class="q-number"><span>7</span></div>
					<div class="q-whole">
						<div class="q-title">如果创建的线上报名表需要贵社团专门为其设计一种尺寸的宣传图，您————？</div>
						<div class="q-alternative" name="required" >*</div>
						<div class="q-body">
							<label><input name="q7-body" value="会设计" type="radio" />会设计</label>
							<label><input name="q7-body" value="会考虑" type="radio" />会考虑</label>
							<label><input name="q7-body" value="不感兴趣" type="radio" />不感兴趣</label>
						</div>
					</div>
				</li>
				<li id="" class="q8 q-field free-multichoice">
					<div class="q-number"><span>8</span></div>
					<div class="q-whole">
						<div class="q-title">信息统计中，除基本统计外，您还需要其他什么功能？(多选)</div>
						<div class="q-alternative" name="required" >*</div>
						<div class="q-body">
							<label><input name="q8-趋势图" type="checkbox" value="趋势图" />趋势图</label>
							<label><input name="q8-参加人员比例分析" type="checkbox" value="参加人员比例分析" />参加人员比例分析</label>
							<label><input name="q8-标记参加人员不同状态（晋级与未晋级）" type="checkbox" value="标记参加人员不同状态（晋级与未晋级）" />标记参加人员不同状态（晋级与未晋级）</label>
							<span class="note-position"><label><input name="q8-mul4" type="checkbox" class="note-title" value="其他" />其他</label><input name="q8-body-note" class="note" type="text" value="请注明"/></span>
						</div>
					</div>
				</li>
				<li id="" class="q9 q-field free-multichoice">
					<div class="q-number"><span>9</span></div>
					<div class="q-whole">
						<div class="q-title">对于网站主色调，您偏好哪种颜色？（多选）</div>
						<div class="q-alternative" name="required" >*</div>
						<div class="q-body">
							<label><input name="q9-红" type="checkbox" value="红" />红</label>
							<label><input name="q9-绿" type="checkbox" value="绿" />绿</label>
							<label><input name="q9-黄" type="checkbox" value="黄" />黄</label>
							<label><input name="q9-蓝" type="checkbox" value="蓝" />蓝</label>
							<label><input name="q9-紫" type="checkbox" value="紫" />紫</label>
							<span  class="note-position"><label><input name="q9-mul6" type="checkbox" class="note-title" value="其他" />其他</label><input name="q9-body-note" class="note" type="text" value="请注明"/></span>
						</div>
					</div>
				</li>
				<li id="" class="q10 q-field free-multiline">
					<div class="q-number"><span>10</span></div>
					<div class="q-whole">
						<div class="q-title">你对报名吧网站还有什么建议或意见？</div>
						<div class="q-alternative" style="display:none" name="alternative" >*</div>
						<div class="q-body">
							<textarea name="q10-body" class="body edit" ></textarea>
						</div>
					</div>
				</li>
				<li id="" class="q11 q-field free-singleline">
					<div class="q-number"><span>11</span></div>
					<div class="q-whole">
						<div class="q-title">你的姓名是？</div>
						<div class="q-alternative" style="display:none" name="alternative" >*</div>
						<div class="q-body">
							<input type="text" name="q11-body" class="body edit" ></input>
						</div>
					</div>
				</li>
				<li id="" class="q12 q-field free-file">
					<div class="q-number"><span>12</span></div>
					<div class="q-whole">
						<div class="q-title">请上传相应文件</div>
						<div class="q-alternative" style="display:none" name="alternative" >*</div>
						<div class="q-body">
							<input type="file" name="q12-body" class="body edit" ></input>
						</div>
					</div>
				</li>
				<li id="" class="q13 q-field free-file">
					<div class="q-number"><span>13</span></div>
					<div class="q-whole">
						<div class="q-title">请上传您的个人照片</div>
						<div class="q-alternative" style="display:none" name="alternative" >*</div>
						<div class="q-body">
							<input type="file" name="q13-body" class="body edit" ></input>
						</div>
					</div>
				</li>
			 </form>
			</ul>
		</div>
	        <div id="next-step">
				<input id="submit" class="btn blue" name="submit" type="submit" style="width:auto" value="保存并下一步" onClick="formPersonalize.submit(); document.location.href='create-3.php';"/>
            </div>
		</div>
	</div>
</div>
<?php
     include 'includes/footer.inc.php'
?>
</body>
<script type="text/javascript" src="js/jquery.pin.min.js"></script>
<script>
	var fieldWrapperWidth = $("#field-wrapper").width();
	var toolFieldWidth = $("#tool-field").width();
	var formConstructFieldWidth = fieldWrapperWidth - toolFieldWidth - 230;
	//alert (formConstructFieldWidth);
	$("#form-construct-field").css("width",formConstructFieldWidth);
	
	var windowHeight = $(window).height();
	var headerHeight = $("#header").height();
	var createFormStepsHeight = $("#create-form-steps").height();
	//alert(windowHeight);
	var formConstructFieldHeight = windowHeight - headerHeight - createFormStepsHeight-200 ;
	//alert(formConstructFieldHeight);
	$("#form-field").css("height",formConstructFieldHeight);
	
$("#tool-field").pin({
      containerSelector: "#field-wrapper",
});
$(function() {
	$( "#form-expire-time" ).datepicker();
	$(".ui-datepicker").attr("unselectable","on").attr("onselectstart","return false;").css("-moz-user-select","none");
	$( "#form-number-limit" ).spinner({
		step:50,
	});
});
jQuery(function($){  
	$.datepicker.regional['zh-CN'] = {  
		closeText: '关闭',  
		prevText: '<',  
		nextText: '>',  
		currentText: '今天',  
		monthNames: ['一月','二月','三月','四月','五月','六月',  
		'七月','八月','九月','十月','十一月','十二月'],  
		monthNamesShort: ['一','二','三','四','五','六',  
		'七','八','九','十','十一','十二'],  
		dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],  
		dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],  
		dayNamesMin: ['日','一','二','三','四','五','六'],  
		weekHeader: '周',  
		dateFormat: 'yy-mm-dd',  
		firstDay: 1,  
		isRTL: false,  
		showMonthAfterYear: true,  
		yearSuffix: '年'};  
	$.datepicker.setDefaults($.datepicker.regional['zh-CN']);  
});
$(".ui-datepicker").css("z-index","50");
</script>
</html>