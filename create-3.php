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
	/* create-3 */
	.form-release-status {
		width:100%;
		line-height:2em;
		border-radius:5px;
	}
	.form-release-status.success {
		border:solid 1px #a7ffab;
		background:#e5ffe6;
	}
	#form-field {
		width:100%;	
	}
	#tool-field {
		width:300px;
	}
	.release-method {
		margin-bottom:2em;
	}
	.release-method .link-select label {
		margin-right:1em;
	}
	.release-method .method-tip {
		font-size:14px;
		color:#999;
	}
	.release-method.outer-link .link-container {
		width:400px;
	}
	.release-method.QR-code .image-holder {
		width:100px;
		height:100px;
	}
	.release-method.QR-code input.QR-width-customize, .release-method.QR-code input.QR-height-customize {
		text-align:center;
		width:4em;
		border:none;
		outline:none;
		border-bottom:solid 1px #ccc;
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
	
	/* create-3 */
	#tool-field .card {
		margin:18px 20px 50px 49px;
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
			<div class="card" > 
				<a href='#'>
					<div class="img-holder">
						<div class="fader">
							<img src="images/1.jpg" alt="" />
						</div>
						<div class="form-name">
							刚刚创建的纳新报名表
						</div>
						<div class="img-counter">
							<div class="counter">
								<span class="time-left">还有30天</span>
								<span class="written">0次</span>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div id="form-construct-field" unselectable="false" >
        	<div class="form-release-status success">
            	<span>&nbsp;&nbsp;</span>
            	恭喜您，您的“xx社团报名表”创建成功！
            </div>
            <br />
			<div id="form-release">
            	<div class="release-method outer-link">
                	<h3>1.
                    	<b>外链</b>
                    </h3>
                    <div class="link-select">
	                    <label  title="(推荐)经过百度短网址转码，链接短，可读性不佳"><input name="link-type" type="radio" checked="checked" value="短链接">短链接</input></label>
    	                <label  title="(不推荐)未经过百度短网址转码，链接长，可读性好"><input name="link-type" type="radio" value="长链接">长链接</input></label>
                    </div>
                    <div class="link-holder">
                    	<input type="text" class="link-container" value="http://127.0.0.1/formcloud/create-3.php" />
                        <input type="button" class="btn green" value="复制" />
                    </div>
                </div>
                <div class="release-method QR-code">
                	<h3>2.
                    	<b>二维码</b>
                    </h3>
                    <div class="link-select">
	                    <label title="适用于移动端" ><input name="QR-type" type="radio" checked="checked" value="">200*200</input></label>
    	                <label title="适用于传单" ><input name="QR-type" type="radio" value="">400*400</input></label>
                        <label title="适用于海报" ><input name="QR-type" type="radio" value="">800*800</input></label>
                        <label title="自定义（长宽须相等）" ><input name="QR-type" type="radio" value="">
                        	<span>
                            	<input class="QR-width-customize" onfocus="$(this).prev().attr('checked','checked');" type="text" />*<input class="QR-height-customize" type="text" />
                            </span>自定义（长宽须相等）
                        </input></label>
                    </div>
                    <div class="link-holder">
                    	<!--<div class="image-holder">
							<image type="text" class="link-container" value="http://127.0.0.1/formcloud/create-3.php" />
						</div>-->
                        <input type="button" class="btn green" value="下载" />
                    </div>
                </div>
                <div class="release-method embed">
                	<h3>3.
                    	<b>嵌入式</b>
                    </h3>
                    <div class="method-tip">
                    	请将代码粘贴到你想要出现的位置。
                    </div>
                    <div class="link-select">
	                    <label  title=""><input name="embed-type" type="radio" checked="checked" value="卡片">卡片</input></label>
    	                <label  title=""><input name="embed-type" type="radio" value="iframe窗口">iframe窗口</input></label>
                    </div>
                    <div class="link-holder">
                    	<div class="link-container" value="http://127.0.0.1/formcloud/create-3.php">
                        	<blockquote>http://127.0.0.1/formcloud/create-3.php</blockquote>
                        </div>
                        <input type="button" class="btn green" value="复制" />
                    </div>
                </div>
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