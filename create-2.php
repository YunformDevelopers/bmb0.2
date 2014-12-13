<?php
header('Content-Type:text/html; charset=utf-8');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>创建</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
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
<script type="text/javascript" src="js/form-fill.js"></script>
<script type="text/javascript" src="js/commonNoIscroll.js"></script>
<style >
	#step-status-set .step-status2 {
		background:none;
	}
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
	
</style>

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
			<!--<div id="tool-save-container">
				<div class="loading-64" style="display:none">
				</div>
				<div class="bg blue"> 
					<a class="tool save" onclick="toolSaveAct(this);" >
					</a>
				</div>
			</div>-->
			<div id="tool-construct-container">
				<div id="tool-personalize">
					<h4>个性化设置</h4>
					<ul class="tool-personalize-list">
					<form id="formPersonalize" name="formPersonalize" action="formdecoration.php?<?php echo "id=".$_GET['id']?>" method='post' enctype="multipart/form-data">
						<li class="tool-personalize-item">
							<h6>
								<b>1.</b>
								请设置报名表的下架要求
							</h6>
							<p class="personalize-tip" >
								两者满足其一即下架。
							</p>
							<div class="personalize-main">
								当时间到达<input id="form-expire-time" name="form-expire-time" placeholder="默认不限期"></input>时，或者
								当回收的份数达到<input id="form-number-limit" name="form-number-limit" placeholder="默认不限份数" required="required">时。
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
								<input type="file" name="bg"></input>
							</div>
						</li>
						<li class="tool-personalize-item">
							<h6>
								<b>3.</b>
								请为报名表添加标签<i>建设中</i>
							</h6>
							<p class="personalize-tip" >
								标签之间请用空格分隔
							</p>
							<div class="personalize-main">
								<input id="form-tag" name="form-tag"></input>
							</div>
						</li>
						<input class="btn blue" style="width:auto; padding:0 5px;" type="submit" value="提交相应要求"/>
					</form>
					</ul>
			  
				</div>
				<div id="tool-container-bg">
				</div>
			</div>
		</div>
		<div id="form-construct-field">
		<?php
		connect();
		if(isset($_GET['id'])){
			$result=mysql_query("select * from question where form_id ='".$_GET['id']."'");
			while($rows=mysql_fetch_assoc($result)){
				create_to_db($rows);
			}
		}else{
			do_js_alert('请从正确路径访问该页');
			do_js_link('index.php');
		}
		?>
        </div>
	</div>
</div>
<?php
     include 'includes/footer.inc.php'
?>
</body>
<script type="text/javascript" src="js/jquery.pin.min.js"></script>
<script>
	initFormConstructFieldWidth();
	initFormFieldHeight();
	initPin ();
	$(window).resize(function(){
		initFormConstructFieldWidth();
		initFormFieldHeight();
		initPin ();
	});
	function initFormConstructFieldWidth (){
		var fieldWrapperWidth = $("#field-wrapper").width();
		var toolFieldWidth = $("#tool-field").width();
		var formConstructFieldWidth = fieldWrapperWidth - toolFieldWidth - 230;
		//alert (formConstructFieldWidth);
		$("#form-construct-field").css("width",formConstructFieldWidth);
	}
	
	function initFormFieldHeight (){
		var windowHeight = $(window).height();
		var headerHeight = $("#header").height();
		var createFormStepsHeight = $("#create-form-steps").height();
		//alert(windowHeight);
		var formFieldHeight = windowHeight - headerHeight - createFormStepsHeight-200 ;
		//alert(formConstructFieldHeight);
		$("#form-field").css("height",formFieldHeight);
	}
	
	//初始化pin
	function initPin (){
		$("#tool-field").pin({
		  containerSelector: "#field-wrapper",
		});
	}
</script>
</html>