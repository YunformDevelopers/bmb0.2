<div id="contact-msg-content">
	<h3>联系我们</h3>
        <p>您可以加我们的负责人QQ：12345678联系：）</p>
        <input id="msg-ok-btn" class='btn red' type="button" value='确定' />
</div>  

<div id="work-msg-content">
	<h3>任务流程</h3>
        <p><a href="YunForm网站结构.jpg">戳我</a></p>
        <input id="msg-ok-btn" class='btn red' type="button" value='确定' />
</div>

<div id="register-msg-content">
	<div class="left">
        <h3>注册</h3>
            <form name="" method="post" action="register.php">
                <ul>
                    <li class="title">邮箱<span class="tip">(*必填，至少两位)</span></li>
                    <li class="body"><input type="text" required="required" name="username" class="text" /></li>
                    <li class="title">密码<span class="tip">(*必填，至少六位)</span></li>
                    <li class="body"><input type="password" required="required" name="password" class="text" /></li>
                    <li class="title">确认密码<span class="tip">(*必填，至少六位)</span></li>
                    <li class="body"><input type="password" required="required" name="password" class="text" /></li>
                    <li class=""><input type="submit"  class="submit btn red" value="注册" /></li>
                </ul>
            </form>
     </div>
     <div class="right">
         <!--<div class="zju-passport">
            <a href="#">浙大通行证登录</a>
         </div>-->
         <a href="#" id="login-msg" onclick="msgPopOver('msg.php #login-msg-content')" >已有账号？快速登录</a>
     </div>
</div>
<div id="login-msg-content">
	<div class="left">
        <h3>登录</h3>
            <form name="" method="post" action="index.php">
                <ul>
                    <li class="title">邮箱</li>
                    <li class="body"><input type="text" required="required" name="username" class="text" /></li>
                    <li class="title">密码</li>
                    <li class="body"><input type="password" required="required" name="password" class="text" /></li>
                    <li class="remember-me"><label><input checked="checked" type="checkbox" />记住我</label><input type="submit"  class="submit btn red" value="登录" /></li>
                </ul>
            </form>
     </div>
     <div class="right">
         <!--<div class="zju-passport">
            <a href="#">浙大通行证登录</a>
         </div>-->
         <a href="#" id="register-msg" onClick="msgPopOver('msg.php #register-msg-content')" >还没有账号？10秒快速注册</a>
     </div>
</div>
<div id="feedback-msg-content">
	<div class="left">
        <h3>建议反馈</h3>
            <form name="" method="post" action="index.php">
                <ul>
                    <li class="title">标题</li>
                    <li class="body"><input type="text" style="width:96.5%" name="title" class="text" /></li>
                    <li class="title">正文 *</li>
                    <li class="body"><textarea style="width:97%;resize:vertical;" type="text" required="required" name="content" class="text" ></textarea></li>
                    <li class="title">QQ 微信 邮箱等<span style="font-size:12px;">(我们会将您的建议的处理情况告诉您，除此之外不会以别的方式使用您的信息)</span></li>
                    <li class="body"><input type="text" name="contact" class="text" /></li>
                    <li class="submit"><input  type="submit" onclick="msgPopOver('msg.php #feedbackSuccess-msg-content')"  class="submit btn red" value="提交" /></li>
                </ul>
            </form>
     </div>
</div>
<div id="feedbackSuccess-msg-content">
	<div class="left">
        <h3>多谢您的建议！</h3>
            <ul>
                <li class="submit"><input onclick="msgSlideDn();" type="submit"  class="submit btn red" value="好的" /></li>
            </ul>
     </div>
</div>
<div id="after-fill-register-msg-content">
	<div class="left">
        <h3>注册</h3>
        	<p><b>恭喜您，报名表填写成功！</b></p>
            <p><i>现在注册您可以保存您这次填写的报名表信息，同时拥有快速填表、保存进度等功能！</i></p>
            <?php 
            if(isset($_COOKIE['form_id']))echo '<form name="" method="post" action="formaction.php?action=register_answer&id="'.$_COOKIE['form_id'].'>';
            else exit();?><!-- action注意更改 -->
            	<!-- 在这里放hidden字段 -->
                <ul>
                    <li class="title">邮箱<span class="tip">(*必填，至少两位)</span></li>
                    <li class="body"><input type="text" required="required" name="username" class="text" /></li>
                    <li class="title">密码<span class="tip">(*必填，至少六位)</span></li>
                    <li class="body"><input type="password" required="required" name="password" class="text" /></li>
                    <li class="title">确认密码<span class="tip">(*必填，至少六位)</span></li>
                    <li class="body"><input type="password" required="required" name="notpassword" class="text" /></li>
                    <li class=""><input type="submit"  class="submit btn red" value="注册并登录" /></li>
                </ul>
            </form>
     </div>
     <div class="right">
         <!--<div class="zju-passport">
            <a href="#">浙大通行证登录</a>
         </div>-->
         <a href="#" id="after-fill-login-msg" onClick="afterFillLoginMsgPopOver()" >已有账号？快速登录</a>
     </div>
</div>
<div id="a-all-msg-content">
	<div class="a-all-msg">
        
     </div>
     <input id="msg-ok-btn" class='btn red' type="button" value='关闭' />
</div>
