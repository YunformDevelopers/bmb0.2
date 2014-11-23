<?php
header('Content-Type:text/html; charset=utf-8');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>发布</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link rel="stylesheet" href="style/index.css"></link>
<link rel="stylesheet" href="style/create.css"></link>
<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="js/jquery.zclip.min.js"></script>
<script type="text/javascript" src="js/msg.js"></script>
<script type="text/javascript" src="js/create-3.js"></script>
<script type="text/javascript" src="js/commonNoIscroll.js"></script>

<style>
#step-status-set .step-status3 {
	background:none;
}
/*#form-release .QR-code .link-select label {
	width:50%;
}*/
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
			<div class="card" > 
				<a target="new" href="<?php echo 'http://www.123bmb.com/reform.php?id='.$_GET['id']; ?>">
					<div class="img-holder">
						<div class="fader">
							<?php
							connect();
							$result=mysql_query("select * from decoration where form_id=".$_GET['id']);
							$rows=mysql_fetch_assoc($result);
							if($rows['bg']){
								echo '<img src="uploads/'.$rows['bg'].'" alt="" />';
							}else{
								echo '<img src="images/1.jpg" alt="" />';
							}
							?>
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
			<h3>三种推广方式</h3>
			<br />
			<div id="form-release">
            	<div class="release-method share-link">
					<div class="section-header">
                        <h2><b>一键分享</b>&nbsp;&nbsp;<i class="method-intro">点击图标将活动一键发布到社交平台上</i></h2>
                        <div class="h2-line">
                        </div>
					</div>
                    <div class="bdsharebuttonbox" style="color:#00f">
                        <a title="分享到一键分享" href="#" class="bds_mshare" data-cmd="mshare">多个平台</a>
                        <a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren">人人</a>
                        <a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin">微信</a>
                        <a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina">微博</a>
                        <a title="分享到QQ好友" href="#" class="bds_sqq" data-cmd="sqq">QQ好友</a>
                        <a title="分享到邮件分享" href="#" class="bds_mail" data-cmd="mail">邮件</a>
                    	<a href="#" class="bds_more" data-cmd="more">更多</a>
                        <span id="bdshare-loading"><b>加载中……</b></span>
                     </div>
                </div>
				<div class="release-method outer-link">
                    <div class="section-header">
                        <h2><b>发布链接</b>&nbsp;&nbsp;<i class="method-intro">将链接编辑到人人日志、98专楼、微信消息里</i></h2>
                        <div class="h2-line">
                        </div>
					</div>
                    <div class="link-select">
	                    <label  title="(推荐)经过百度短网址转码，链接短，可读性不佳"><input id="short-outer-link" name="link-type" type="radio" checked="checked" value="短链接" onfocus="fillLink('short');">短链接</input></label>
    	                <label  title="(不推荐)未经过百度短网址转码，链接长，可读性好"><input id="long-outer-link" name="link-type" type="radio" value="长链接" onfocus="fillLink('long');">长链接</input></label>
                    </div>
                    <div class="link-holder">
                    	<!-- 长短链接放在这里 -->
                    	<input type="hidden" id="php-short-link" value="<?php //echo make_short_url("http://www.123bmb.com/reform.php?id=".$_GET['id']); ?>"/>
                        <input type="hidden" id="php-long-link" value="<?php echo 'http://www.123bmb.com/reform.php?id='.$_GET['id']; ?>" />
                        <!-- 长短链接结束 -->
                    	<input type="text" class="link-container" value="<?php //echo make_short_url("http://www.123bmb.com/reform.php?id=".$_GET['id']); ?>" />
                        <input type="button" id="outer-link-copy" class="btn green" value="复制" />
                    </div>
                </div>
                <div class="release-method QR-code">
                	<div class="section-header">
                        <h2><b>二维码</b>&nbsp;&nbsp;<i class="method-intro">将二维码放到横幅、海报上</i></h2>
                        <div class="h2-line">
                        </div>
					</div>
                    <div class="link-select">
	                    <label title="适用于移动端" ><input name="QR-type" type="radio" checked="checked" onfocus="fillQR(200);" value="200"><b>200*200</b> (适用于移动端)</input></label>
    	                <label title="适用于传单" ><input name="QR-type" type="radio" onfocus="fillQR(400);" value="400"><b>400*400</b> (适用于传单)</input></label>
                        <label title="适用于海报" ><input name="QR-type" type="radio" onfocus="fillQR(800);" value="800"><b>800*800</b> (适用于海报)</input></label>
                        <!--<label title="自定义（长宽须相等）" style='margin:0;' ><input name="QR-type" type="radio" value=""></label>
                        	<span>
                            	<input class="QR-width-customize" onfocus="" type="text" />*<input class="QR-height-customize" type="text" />
                                <input type="hidden" id="formIdContainer" value="<?php echo $_GET['id'];?>" />
                                <script>
                                	function checkNfocus (id) {
										$id = $(id);
										if (!($id.prev().attr('checked'))){
											$id.prev().attr('checked','checked');
										}
									}
                                </script>
                            </span><b>自定义</b>(长宽须相等)
                        </input>-->
                    </div>
                    <div class="link-holder">
                        <span id="QR-loading"><b>加载中……</b></span>
                    	<div class="image-holder">
							<a id="QRlink" target="new" >
                            <image onload="$('#QR-loading').hide();" id="QRimg" type="text" class="link-container" /></a>
						</div>
                        <!--<input type="button" class="btn green" value="下载" />-->
                    </div>
                </div>
<!--                <div class="release-method embed">
                	<h3>3.
                    	嵌入式
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
<script>
//一键分享部分
var shareUrl = $("#php-long-link").val();
var shareText = "";
var shareDesc = "测试";
var shareComment = "这个活动超级赞，小伙伴们快来报名吧!";
window._bd_share_config={"common":{"bdSnsKey":{},"bdText":shareText,"bdUrl":shareUrl,"bdDes":shareDesc,"bdComment":shareComment,"bdMini":"1","bdMiniList":["qzone","tieba","copy","tqq","douban","fx","linkedin"],"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
//加载完成后将一键分享部分的loading隐藏
document.onreadystatechange = subSomething;//当页面加载状态改变的时候执行这个方法.
function subSomething()
{
if(document.readyState == "complete") //当页面加载状态
$("#bdshare-loading").hide();
} 
</script>
</html>