<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--下面这meta意思是告知浏览器的宽度是设备的宽度，缩放值为1.0-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>社团需求调查表</title>
<link rel="stylesheet" href="style/form/paper.css" />
<link rel="stylesheet" href="style/form/form-responsive.css"/>
<script src="js/jquery-2.1.1.min.js"></script>
<script>
/*$(function(){
	$('input[value=请注明]').focus(function(){
        if($(this).val()=="请注明"){
            $(this).val('');
        }
   })
})*/
</script>
<?php 
        require 'includes/functions.inc.php';
        if(isset($_GET['action']) && $_GET['action']=='submit'){
	           @$result=mysql_connect('localhost','srtp-lzx','srtp-lzx') or die(mysql_error());
	           mysql_query("set names utf8") or die(mysql_error());
	           mysql_select_db('srtp-lzx') or die(mysql_error());
	           $num=1;
	           $answer_array = null;
	           $i=0;
	           $old = null;
	           foreach ($_POST as $question => $answers){
		           	$new = explode("-", $question);
		           	if($old == $new[0]){
		           		if(isset($new[2])&&$new[2]=='note'){
		           			$answer_array[$num][$i++]=$answers;
		           			$old = $new[0];
		           			continue;
		           		}
		           		else{
		           			$answer_array[$num][$i++]=$question;
		           			$old = $new[0];
		           			continue;
		           		}
		           	}
		           	else{
		           		$i=0;
		           		if($old==null){
			           		if($answers=="on"){
			           			if(isset($new[2])&&$new[2]=='note'){
			           				$answer_array[1][$i++]=$answers;
			           				$old = $new[0];
			           			}
			           			else{
				           		$answer_array[1][$i++]=$question;
				           		$old = $new[0];
			           			}
			           		}
			           		else{
			           			$answer_array[1][$i++]=$answers;
			           			$old = $new[0];
			           		}
		           		}
		           		else{
		           			if($answers=="on"){
		           				$num++;
		           				$answer_array[$num][$i++]=$question;
		           				$old = $new[0];
		           			}
		           			else{
		           				$num++;
		           				$answer_array[$num][$i++]=$answers;
		           				$old = $new[0];
		           			}
		           		}
		           	}
		        }
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
		        	$submit['q'.$b++]= $string;
		        	$string = null;
		        }
		        $test=$_POST;
		        $number= array();
		        foreach ($_POST as $question => $answers){
		        	$string=explode('-', $question);
		        	if(in_array($string[0], $number)||$string[0]=='q10'||$answers=='提交'||$answers='');
		        	else {
		        		array_push($number, $string[0]);
		        	}
		        }
		        
		        if(count($number)==9){
		        	do_js_alert('感谢您的认真填写！');
		        	//$query="insert into survey values('".$submit[1]."','".$submit[2]."','".$submit[3]."','".$submit[4]."','".$submit[5]."','".$submit[6]."','".$submit[7]."','".$submit[8]."','".$submit[9]."','".$submit[10]."')";
		        	//mysql_query($query) or die(mysql_error());
		        	mysql_connect('localhost','srtp-lzx','srtp-lzx');
		        	@mysql_select_db('srtp-lzx') or die(mysql_error());
		        	insert('survey', $submit);
		        	$query="insert into survey values('".$submit[1]."','".$submit[2]."','".$submit[3]."','".$submit[4]."','".$submit[5]."','".$submit[6]."','".$submit[7]."','".$submit[8]."','".$submit[9]."','".$submit[10]."')";
		        	mysql_query($query) or die(mysql_error());
		        }
		        else{
		        	do_js_alert('还有些必选题没有回答哦！');
		        }
        	}
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
            注：标 * 的题目为必填
        </div>
        <div id="form-body">
        	<form method="post" action="survey.php?action=submit">
            <div id="" class="q1 q-field free-multichoice">
                <div class="q-number"><span>1</span></div>
                <div class="q-whole">
                    <div class="q-title">贵社团在纳新宣传时会使用下列哪些宣传方式？(多选)</div>
                    <div class="q-alternative">*</div>
                    <div class="q-body">
                        <label><input name="q1-mul1" type="checkbox" />98专楼</label>
                        <label><input name="q1-mul1" type="checkbox" />人人日志</label>
                        <label><input name="q1-mul3" type="checkbox" />人人相册</label>
                        <label><input name="q1-mul4" type="checkbox" />文广摆摊</label>
                        <label><input name="q1-mul5" type="checkbox" />纸质宣传单（背面无报名表）</label>
                        <label><input name="q1-mul6" type="checkbox" />纸质宣传单（背面有报名表）</label>
                        <label><input name="q1-mul7" type="checkbox" />寝室楼道海报</label>
                        <label><input name="q1-mul8" type="checkbox" />青年通</label>
                        <label><input name="q1-mul9-*" type="checkbox" />横幅</label>
                    </div>
                </div>
            </div>
            <div id="" class="q2 q-field free-singlechoice">
                <div class="q-number"><span>2</span></div>
                <div class="q-whole">
                    <div class="q-title">贵社团是否有开通微信公众号？</div>
                    <div class="q-alternative">*</div>
                    <div class="q-body">
                        <label><input name="q2-body" value="是，并且在纳新过程中使用" type="radio" />是，并且在纳新过程中使用</label>
                        <label><input name="q2-body" value="是，但纳新时不怎么用" type="radio" />是，但纳新时不怎么用</label>
                        <label><input name="q2-body" value="否，但之后可能会开通" type="radio" />否，但之后可能会开通</label>
                        <label><input name="q2-body" value="否，暂无此类打算" type="radio" />否，暂无此类打算</label>
                    </div>
                </div>
            </div>
            <div id="" class="q3 q-field free-singlechoice">
                <div class="q-number"><span>3</span></div>
                <div class="q-whole">
                    <div class="q-title">贵社团在通知人员参与活动时，是采取下列哪种方式？</div>
                    <div class="q-alternative">*</div>
                    <div class="q-body">
                        <label><input name="q3-body" value="发飞信" type="radio" />发飞信</label>
                        <label><input name="q3-body" value="手机发短信" type="radio" />手机发短信</label>
                        <label><input name="q3-body" value="电脑手机助手发短信" type="radio" />电脑手机助手发短信</label>
                        <span class="note-position"><label><input name="q3-body" value="其他方式（请注明）" type="radio" />其他</label><input name="q3-body-note" class="note" type="text" value="请注明"/></span>
                    </div>
                </div>
            </div>
            <div id="" class="q4 q-field free-singlechoice">
                <div class="q-number"><span>4</span></div>
                <div class="q-whole">
                    <div class="q-title">你认为创建线上报名表需要为问题添加备注吗？</div>
                    <div class="q-alternative">*</div>
                    <div class="q-body">
                        <label><input name="q4-body" value="很需要" type="radio" />很需要</label>
                        <label><input name="q4-body" value="可有可无" type="radio" />可有可无</label>
                        <label><input name="q4-body" value="不需要" type="radio" />不需要</label>
                    </div>
                </div>
            </div>
            <div id="" class="q5 q-field free-singlechoice">
                <div class="q-number"><span>5</span></div>
                <div class="q-whole">
                    <div class="q-title">你认为线上报名表里的社团说明部分是否需要添加图片？</div>
                    <div class="q-alternative">*</div>
                    <div class="q-body">
                        <label><input name="q5-body" value="很需要" type="radio" />很需要</label>
                        <label><input name="q5-body" value="可有可无" type="radio" />可有可无</label>
                        <label><input name="q5-body" value="不需要" type="radio" />不需要</label>
                    </div>
                </div>
            </div>
            <div id="" class="q6 q-field free-singlechoice">
                <div class="q-number"><span>6</span></div>
                <div class="q-whole">
                    <div class="q-title">你需要在线发送通知短信功能（该功能需要网站支付通信费）吗？</div>
                    <div class="q-alternative">*</div>
                    <div class="q-body">
                        <label><input name="q6-body" value="收费（一条九分钱或包年）也愿意使用" type="radio" />收费（一条九分钱或包年）也愿意使用</label>
                        <label><input name="q6-body" value="免费才愿意用" type="radio" />免费才愿意用</label>
                        <label><input name="q6-body" value="我不想用" type="radio" />我不想用</label>
                    </div>
                </div>
            </div>
            <div id="" class="q7 q-field free-singlechoice">
                <div class="q-number"><span>7</span></div>
                <div class="q-whole">
                    <div class="q-title">如果创建的线上报名表需要贵社团专门为其设计一种尺寸的宣传图，您————？</div>
                    <div class="q-alternative">*</div>
                    <div class="q-body">
                        <label><input name="q7-body" value="会设计" type="radio" />会设计</label>
                        <label><input name="q7-body" value="会考虑" type="radio" />会考虑</label>
                        <label><input name="q7-body" value="不感兴趣" type="radio" />不感兴趣</label>
                    </div>
                </div>
            </div>
            <div id="" class="q8 q-field free-multichoice">
                <div class="q-number"><span>8</span></div>
                <div class="q-whole">
                    <div class="q-title">信息统计中，除基本统计外，您还需要其他什么功能？(多选)</div>
                    <div class="q-alternative">*</div>
                    <div class="q-body">
                        <label><input name="q8-mul1" type="checkbox" />趋势图</label>
                        <label><input name="q8-mul2" type="checkbox" />参加人员比例分析</label>
                        <label><input name="q8-mul3" type="checkbox" />标记参加人员不同状态（晋级与未晋级）</label>
                        <span class="note-position"><label><input name="q8-mul4" type="checkbox" />其他</label><input name="q8-body-note" class="note" type="text" value="请注明"/></span>
                    </div>
                </div>
            </div>
            <div id="" class="q9 q-field free-multichoice">
                <div class="q-number"><span>9</span></div>
                <div class="q-whole">
                    <div class="q-title">对于网站主色调，您偏好哪种颜色？（多选）</div>
                    <div class="q-alternative">*</div>
                    <div class="q-body">
                        <label><input name="q9-mul1" type="checkbox" />红</label>
                        <label><input name="q9-mul2" type="checkbox" />绿</label>
                        <label><input name="q9-mul3" type="checkbox" />黄</label>
                        <label><input name="q9-mul4" type="checkbox" />蓝</label>
                        <label><input name="q9-mul5" type="checkbox" />紫</label>
                        <span  class="note-position"><label><input name="q9-mul6" type="checkbox" />其他</label><input name="q9-body-note" class="note" type="text" value="请注明"/></span>
                    </div>
                </div>
            </div>
            <div id="" class="q10 q-field free-multiline">
                <div class="q-number"><span>10</span></div>
                <div class="q-whole">
                    <div class="q-title">你对报名吧网站还有什么建议或意见？</div>
                    <div class="q-alternative" style="display:none">*</div>
                    <div class="q-body">
                        <textarea name="q10-body" class="body edit" ></textarea>
                    </div>
                </div>
            </div>
            <input id="submit" class="btn red" name="submit" type="submit" value="提交" />
         </form>   
        </div>
	</div>
	<div id="footer">
		<p>Powered by 报名吧</p>
		<p>由于网站还在开发，不能提供最佳的用户体验，希望您能理解！</p>
	</div>
	
		

</body>
</html>