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
<script type="text/javascript" src="js/jquery.zclip.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.4.js"></script>
<script type="text/javascript" src="js/msg.js"></script>
<script type="text/javascript" src="js/create-3.js"></script>

<?php
    require 'includes/header.inc.php';
	
    //if(!isset($_COOKIE['srtp-username'])){
    	//do_js_alert('请先登录');
    	//do_js_link('index.php');
    //}
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
	                    <label  title="(推荐)经过百度短网址转码，链接短，可读性不佳"><input id="short-outer-link" name="link-type" type="radio" checked="checked" value="短链接">短链接</input></label>
    	                <label  title="(不推荐)未经过百度短网址转码，链接长，可读性好"><input id="long-outer-link" name="link-type" type="radio" value="长链接">长链接</input></label>
                    </div>
                    <div class="link-holder">
                    	<!-- 长短链接放在这里 -->
                    	<input type="hidden" id="php-short-link" value="<?php echo make_short_url("http://www.dmedia.zju.edu.cn/srtp/lzx/reform.php?id=".$_GET['id']) ?>"/>
                        <input type="hidden" id="php-long-link" value="<?php echo 'http://www.dmedia.zju.edu.cn/srtp/lzx/reform.php?id='.$_GET['id']; ?>" />
                        <!-- 长短链接结束 -->
                    	<input type="text" class="link-container" value="http://127.0.0.1/formcloud/create-3.php" />
                        <input type="button" id="outer-link-copy" class="btn green" value="复制" />
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
                            	<input class="QR-width-customize" onfocus="$(this).prev().attr('checked','checked'); $(this).focus();" type="text" />*<input class="QR-height-customize" type="text" />
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
<!--                <div class="release-method embed">
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
                    	<div class="code-container embed" value="http://127.0.0.1/formcloud/create-3.php">
                        	<textarea style="width:400px;">http://127.0.0.1/formcloud/create-fdsfsdfsdfsdf.php</textarea>
                        </div>
                        <input type="button" id="embed-copy" class="btn green" value="复制" />
                    </div>
                </div>
-->            </div>
		</div>
	</div>
</div>
<?php
     include 'includes/footer.inc.php'
?>
</body>
<script type="text/javascript" src="js/jquery.pin.min.js"></script>
</html>