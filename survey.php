<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--下面这meta意思是告知浏览器的宽度是设备的宽度，缩放值为1.0-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>社团需求调查表</title>
<link rel="stylesheet" href="style/form/paper.css" />
<!--<link rel="stylesheet" href="style/form/form-responsive.css"/>-->
<link rel="stylesheet" href="style/form/validationEngine.jquery.css"/>
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="js/answerCookie.js"></script>
<script>
/*$(function(){
	$('input[value=请注明]').focus(function(){
        if($(this).val()=="请注明"){
            $(this).val('');
        }
   })
})*/
$(document).ready(function() {
    
});
</script>
<style>
@media screen and (max-width: 500px) {
#form-field {
	width:90%;
}
#form-body .q-number {
	width:2em;
}
#form-body .q-whole {
	padding:5px 0 5px 38px;
}
}

</style>
<?php 
        require 'includes/functions.inc.php';
        	//else {
        	//	echo "<script>alert('请将必填项填写完整'); </script>";
        	//}
           	  /*$new = explode("-", $question);
              if(($old == null && $answers=='on') || $old == $new[0]){
		             $answer_array[$num][$i++]=$question;
		             $old = $new[0];
		             continue;
              }
              else{
              	$num++;
              }
              if($answers!='on'){
              $answer_array[$num][0]=$answers;
              }
              $old=null;
              $i=0;
           }
           print_r($answer_array);
           $submit = null;
           $i=1;
           $b=1;
           $string = null;
           foreach($answer_array as $answers){
           	 if(count($answers)>1){
           	 	foreach ($answers as $value){
           	 		$string .= $value.'&';
           	 	}
           	 }
           	 else{
           	 	$string = $answers[0];
           	 }
           	 $submit[$b++]= $string;
           	 $string = null;
           }
           //print_r($submit);
           //$query="insert into survey values('".$submit[1]."','".$submit[2]."','".$submit[3]."','".$submit[4]."','".$submit[5]."','".$submit[6]."','".$submit[7]."','".$submit[8]."','".$submit[9]."','".$submit[10]."')";
           //mysql_query($query) or die(mysql_error());
        }*/
          	 				
?>
</head>

<body>
	<div id="form-field">
        <div id="form-title">
            <h3>社团需求调查表</h3>
        </div>
        <div id="form-intro" >
        加入我们，让创业成为你的生活方式！加入我们，让创业成为你的生活方式！加入我们，让创业成为你的生活方式！加入我们，让创业成为你的生活方式！加入我们，让创业成为你的生活方式！加入我们，让创业成为你的生活方式！加入我们，让创业成为你的生活方式！加入我们，让创业成为你的生活方式！加入我们，让创业成为你的生活方式！
            注：标 * 的题目为必填
        </div>
        <ul id="form-body">
        	<form id="formID" method="post" action="#">
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
                        <span class="note-position"><label><input name="q3-body" value="其他方式" type="radio" class="note-title" />其他</label><input name="q3-body-note" class="note" type="text" value="请注明"/></span>
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
                    <div class="q-alternative" name="required" >*</div>
                    <div class="q-body">
                        <textarea name="q10-body" class="body edit" ></textarea>
                    </div>
                </div>
            </li>
			<li id="" class="q11 q-field free-singleline">
                <div class="q-number"><span>11</span></div>
                <div class="q-whole">
                    <div class="q-title">你的姓名是？</div>
                    <div class="q-alternative" name="required" >*</div>
                    <div class="q-body">
                        <input type="text" name="q11-body" class="body edit" ></input>
                    </div>
                </div>
            </li>
			<li id="" class="q12 q-field free-file">
                <div class="q-number"><span>12</span></div>
                <div class="q-whole">
                    <div class="q-title">请上传相应文件</div>
                    <div class="q-alternative" name="required" >*</div>
                    <div class="q-body">
                        <input type="file" name="q12-body" class="body edit" ></input>
                    </div>
                </div>
            </li>
			<li id="" class="q13 q-field free-file">
                <div class="q-number"><span>13</span></div>
                <div class="q-whole">
                    <div class="q-title">请上传您的个人照片</div>
                    <div class="q-alternative" name="required" >*</div>
                    <div class="q-body">
                        <input type="file" name="q13-body" class="body edit" ></input>
                    </div>
                </div>
            </li>
            <input id="submit" class="btn red" name="submit" type="submit" value="提交" onClick="SetFillCookie(); SetAnswerCookie();alert(document.cookie)"/>
			<input id="submit" class="btn red" name="submit" value="重填" onClick="ReFill()"/>
         </form>
        </ul>
	</div>
    
    <div id="fill-tool">
    	<div class="login/reg box " title="注册/登录后可享受一键填表、保存填表进度等福利！">
        	<a class="tool">
            	<span class="tool-name">注册 登录</span>
            </a>
        </div>
        <div class="quick-fill box " title="根据表格内容智能填入个人信息">
        	<a class="tool">
            	<span class="tool-name">一键 填表</span>
            </a>
        </div>
        <div class="save box " title="保存进度，表格可在 我的 中找到">
        	<a class="tool">
            	<span class="tool-name">保存 进度</span>
            </a>
        </div>    
    </div>
    <div id="back-tool">
    	<a class="tool">
        	<span class="tool-name">返回</span>
        </a>
    </div>
	<div id="footer" class="form-footer">
		<p>Powered by 报名吧</p>
		<p>由于网站还在开发，不能提供最佳的用户体验，希望您能理解！</p>
	</div>
	
		

</body>
</html>