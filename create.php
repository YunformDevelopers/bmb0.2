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
                <a class="tool save">
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
            <h3><input type="text" value="求是潮社团纳新报名表" class="title edit"  /></h3>
        </div>
        <div id="form-intro">
            <textarea class="title edit" contentEditable="true" rows="1">为了促进社团发展，我们进行纳新。</textarea>
        </div>
        <ul id="form-body">
        	<li>
            	<div id='q' class='q1 q-field-before' onmousemove='onshow(this)' onmouseout='offshow(this)'>
                	<div class='q-number'><span>Q</span></div>
                    <div class='q-whole'>
                    	<div class='q-title'>
                        	<textarea type='text' name='q1-title' rows='1' class='title edit' >姓名</textarea>
                        </div>
                        <div id='alt' class='q-alternative'>
                        	<a onclick='changeState(this)'>改为选答</a>
                        </div>
                        	<div class='q-body'>
                            	<input type='text' name='q1-body1' class='body no-edit'/>
                            </div>
                     </div>
                     <a href="javascript:;" id="q-del" style="display:none;" class="q-del" title="删除">
                     	
                     </a>
                 </div>
             </li>
             <li><div id='q' class='q1 q-field-before' onmouseover='onshow(this)' onmouseout='offshow(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'>          <div class='q-title'><textarea type='text' name='q1-title' rows='1' class='title edit' >姓名</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)'>改为选答</a></div><div class='q-body'><input type='text' name='q1-body1' class='body no-edit'/></div></div></div></li>
            <!--<div id="" class="q1 q-field free-singleline preserved-name">
                <div class="q-number"><span>Q1</span></div>
                <div class="q-whole">
                    <div class="q-title"><textarea type="text" name="q1-title" rows="1" class="title edit" >姓名</textarea></div>
                    <div class="q-alternative"><a>改为选答</a></div>
                    <div class="q-body">
                    <input type="text" name="q1-body1" class="body no-edit"/>
                    </div>
                </div>
            </div>
            <div id="" class="q2 q-field free-multiline">
                <div class="q-number"><span>Q2</span></div>
                <div class="q-whole">
                    <div class="q-title"><textarea type="text" name="q2-title" rows="1" class="title edit" >请问你的理想是什么？</textarea></div>
                    <div class="q-alternative"><a>改为选答</a></div>
                    <div class="q-body">
                        <textarea name="q2-body1" class="body no-edit"></textarea>
                    </div>
                </div>
            </div>
            <div id="" class="q3 q-field free-multichoice">
                <div class="q-number"><span>Q3</span></div>
                <div class="q-whole">
                    <div class="q-title"><textarea type="text" name="q3-title" rows="1" class="title edit" >请问你的志愿是哪几个？</textarea></div>
                    <div class="q-alternative"><a>改为选答</a></div>
                    <div class="q-body">
                        <input type="checkbox" /><input type="text" name="q3-body1" class="body edit" value="项目部"/>
                        <input type="checkbox" /><input type="text" name="q3-body2" class="body edit" value="外联部"/>
                        <input type="checkbox" /><input type="text" name="q3-body3" class="body edit" value="技术部"/>
                        <br />
                        <input type="checkbox" /><input type="text" name="q3-body3" class="body edit" value="点击这里添加选项"/>
                    </div>
                </div>
            </div>
            <div id="" class="q4 q-field free-singlechoice">
                <div class="q-number"><span>Q4</span></div>
                <div class="q-whole">
                    <div class="q-title"><textarea type="text" name="q4-title" rows="1" class="title edit" >请问年级是？</textarea></div>
                    <div class="q-alternative"><a>改为选答</a></div>
                    <div class="q-body">
                        <input type="radio" /><input type="text" name="q4-body1" class="body edit" value="大一"/>
                        <input type="radio" /><input type="text" name="q4-body2" class="body edit" value="大二"/>
                        <input type="radio" /><input type="text" name="q4-body3" class="body edit" value="大三"/>
                        <br />
                        <input type="radio" /><input type="text" name="q4-body3" class="body edit" value="点击这里添加选项"/>
                    </div>
                </div>
            </div>
            <div id="" class="q5 q-field free-personalphoto">
                <div class="q-number"><span>Q5</span></div>
                <div class="q-whole">
                    <div class="q-title"><textarea type="text" name="q5-title" rows="1" class="title edit" >请上交你的个人照片</textarea></div>
                    <div class="q-alternative"><a>改为选答</a></div>
                    <div class="q-body">
                        <input type="file" />
                    </div>
                </div>
            </div>
            <div id="" class="q6 q-field free-file">
                <div class="q-number"><span>Q6</span></div>
                <div class="q-whole">
                    <div class="q-title"><textarea type="text" name="q6-title" rows="1" class="title edit" >请上传你的个人作品</textarea></div>
                    <div class="q-alternative"><a>改为选答</a></div>
                    <div class="q-body">
                        <input type="file" />
                    </div>
                </div>
            </div>-->
            
            
        </ul>
    </div>
    
</div>
<?php
     include 'includes/footer.inc.php'
?>
</body>
</html>