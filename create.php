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
<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.4.js"></script>
<script type="text/javascript" src="js/create.js"></script>
<script type="text/javascript" src="js/cookie.js"></script>
<script type="text/javascript" src="js/msg.js"></script>
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
    <div id="tool-field" unselectable="on" onselectstart="return false;" style="-moz-user-select:none;">
        <div id="tool-save-container">
            <div class="loading-64" style="display:none">
            </div>
            <div class="bg blue">
                <a class="tool save" onclick="SetCookie();" >
                </a>
            </div>
		</div>
        <div id="tool-construct-container">
            <div id="tool-construct-perserved">
                <h4>预留题型</h4>
                <ul>
                    <li id="personality">
                        <a href="javascript:;">
                            <span class="tool-float-left"></span>个人信息组<span class="tool-construct-icon-name"></span>
                        </a>
                    </li>
                </ul>
                
          
            </div>
            <div id="tool-construct-free">
                <h4>自由题型</h4>
                <ul>
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
                    <li id="personalphoto" class="" name="">
                        <a href="javascript:;">
                            <span class="tool-float-left"></span>个人照片<span class="tool-construct-icon-personalphoto"></span>
                        </a>
                    </li>
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
                    <li id="ratejudge">
                        <a href="javascript:;">
                            <span class="tool-float-left"></span>评级<span class="tool-construct-icon-rate"></span>
                        </a>
                    </li>
                    <li id="rader">
                        <a href="javascript:;">
                            <span class="tool-float-left"></span>雷达图<span class="tool-construct-icon-radar"></span>
                        </a>
                    </li>
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
        <div id="form-title">
            <h3><input type="text" value="CC98社团纳新报名表" class="title edit"  /></h3>
        </div>
        <div id="form-intro">
            <textarea class="title edit" contentEditable="true" rows="1">为了促进社团发展，我们进行纳新。</textarea>
        </div>

        <ul id="form-body">
        
        

        </ul>
        <br />
        <br />
        <br />
        <br />
		<div id="form-tip">
            <textarea class="title edit" contentEditable="true" rows="1">欢迎填写这张表，希望您能关注我们的其他活动。</textarea>
        </div>

        <div id="next-step">
    		<input class="btn blue" value="保存并下一步" type="submit" id="step1-step2" onclick="SetCookie(); window.location.href='formaction.php?action=save'"/>
	    </div>

    </div>
</div>
<?php
     include 'includes/footer.inc.php'
?>
</body>
</html>