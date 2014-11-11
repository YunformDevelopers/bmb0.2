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
								当时间到达<input id="form-expire-time" name="form-expire-time" placeholder="默认不限期" required="required"></input>时，或者
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
		<!--
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
							<span class="note-position"><label><!--<input name="q3-body" value="其他方式" type="radio" class="note-title" />其他</label><input name="q3-body-note" class="note" type="text" value="请注明"/></span>
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
		</div>  -->
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