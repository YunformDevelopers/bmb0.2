<?php
header('Content-Type:text/html; charset=utf-8');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
	<?php 
    require 'includes/includes.inc.php';
    if(ActionIsEdit()){
        echo "修改(1/3)";
    }
	else {
		echo "创建(1/3)";
	}
    ?>
</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link rel="stylesheet" href="style/index.css"></link>
<link rel="stylesheet" href="style/create.css"></link>
<link rel="stylesheet" href="style/msg.css"></link>
<link rel="stylesheet" type="text/css" href="style/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="style/simditor.css" />
<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.4.js"></script>
<script type="text/javascript" src="js/simditor-all.js"></script>
<script type="text/javascript" src="js/commonNoIscroll.js"></script>
<script type="text/javascript" src="js/create.js"></script>
<script type="text/javascript" src="js/cookie.js"></script>
<script type="text/javascript" src="js/msg.js"></script>


<style >
	#step-status-set .step-status1 {
		background:none;
	}
	#tool-field {
		width:160px;
	}
/*	#tool-construct-container {
		width:160px;
	}
*/</style>

<?php
    require 'includes/header.inc.php';
    if(!isset($_COOKIE['srtp-username'])){
    	do_js_alert('请先登录');
    	do_js_link('index.php');
    }
?>
</head>
<body>
<div id="wrapper">
	<?php 
	connect();
	$result=mysql_query("select * from _user where username='".$_COOKIE['srtp-username']."'");
	$rows=mysql_fetch_assoc($result);
	if($rows['is_firstcreate']){
		echo '<input type="hidden" value="1" id="is-firstcreate"/>';
	}else{
		echo '<input type="hidden" value="0" id="is-firstcreate"/>';
	}
	?>
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
            	<div class="slide-msg">
                	<p>保存成功！</p>
                    <a>撤销</a>
                    <a class="slide-msg-close">X</a>
                </div>
				<div class="loading-64" style="display:none">
				</div>
				<div class="bg blue">
					<a class="tool save" onclick="toolSaveAct(this);" >
					</a>
				</div>
          
			</div>
			<div id="tool-construct-container">
				<div id="tool-construct-perserved">
					<h4>预留题型</h4>
					<ul class="tool-construct-list">
						<li id="personality">
							<a href="javascript:;">
								<span class="tool-float-left"></span>个人信息组<span class="tool-construct-icon-name"></span>
							</a>
						</li>
                        <div id="personality-tip" class="create-tip">
                        	<p><b>↑↑↑注意↑↑↑</b><br />只有<b>个人信息组</b>里的“姓名”“电话”等信息才能被程序识别以生成<b>批量添加飞信好友</b>的文件！如果个人信息组里有你不需要的信息，可以删除，不影响程序识别联系信息。</p>
                            <input onclick="tipDisappear(this);" type="submit" class="btn green" value="知道了" style="text-align:center;" />
                        </div>
					</ul>
					
			  
				</div>
				<div id="tool-construct-free">
					<h4>自由题型</h4>
					<ul class="tool-construct-list">
						<li id="singleline" class="" name="">
							<a href="javascript:;">
								<span class="tool-float-left"></span>单行文本<span class="tool-construct-icon-singleline"></span>
							</a>
						</li>
						<li id="multiline">
							<a href="javascript:;">
								<span class="tool-float-left"></span>多行文本<span class="tool-construct-icon-multiline"></span>
							</a>
						</li>
						<li id="file">
							<a href="javascript:;">
								<span class="tool-float-left"></span>文件<span class="tool-construct-icon-file"></span>
							</a>
						</li>
						<!--<li id="personalphoto" class="" name="">
							<a href="javascript:;">
								<span class="tool-float-left"></span>个人照片<span class="tool-construct-icon-personalphoto"></span>
							</a>
						</li>-->
						<li id="singlechoice">
							<a href="javascript:;">
								<span class="tool-float-left"></span>单选<span class="tool-construct-icon-singlechoice"></span>
							</a>
						</li>
						<li id="multichoice">
							<a href="javascript:;">
								<span class="tool-float-left"></span>多选<span class="tool-construct-icon-multichoice"></span>
							</a>
						</li>
						<!--<li id="ratejudge">
							<a href="javascript:;">
								<span class="tool-float-left"></span>评级<span class="tool-construct-icon-rate"></span>
							</a>
						</li>-->
						<!--<li id="rader">
							<a href="javascript:;">
								<span class="tool-float-left"></span>雷达图<span class="tool-construct-icon-radar"></span>
							</a>
						</li>-->
					</ul>
				</div>
				<div id="tool-container-bg">
					
				</div>
				<div id="tool-container-side">
					
				</div>
			</div>
		</div>
		
		<div id="form-construct-field">
		<p></p>
        	<?php
				EditRefillCreate();
				//函数位于functions.inc.php
			?>
		</div>
	</div>
</div>
<div id="whole-msg-bg" onclick="msgSlideDn();">
</div>
<div class='msg'>
    <div class='msg-border'>
        <div class='msg-content'>
        <!--内容是动态获得的-->			
        </div>
    </div>
</div>
<?php
     include 'includes/footer.inc.php'
?>
</body>
<script type="text/javascript" src="js/jquery.pin.min.js"></script>
</html>