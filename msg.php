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
                    <li class="body"><input type="password" required="required" name="notpassword" class="text" /></li>
                    <li class=""><input type="submit"  class="submit btn red" value="登录" /></li>
                </ul>
            </form>
     </div>
     <div class="right">
         <!--<div class="zju-passport">
            <a href="#">浙大通行证登录</a>
         </div>-->
         <a href="#" id="login-msg" onclick="loginMsgPopOver()" >已有账号？快速登录</a>
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
         <a href="#" id="register-msg" onclick="registerMsgPopOver()" >还没有账号？10秒快速注册</a>
     </div>
</div>

<div id="after-fill-register-msg-content">
	<div class="left">
        <h3>注册</h3>
        	<p><b>恭喜您，报名表填写成功！</b></p>
            <p><i>现在注册您可以保存您这次填写的报名表信息，同时拥有快速填表、保存进度等功能！</i></p>
            <form name="" method="post" action="formaction.php?action=register_answer&id="<?php echo $_COOKIE['form_id']?>><!-- action注意更改 -->
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
         <a href="#" id="after-fill-login-msg" onclick="afterFillLoginMsgPopOver()" >已有账号？快速登录</a>
     </div>
</div>
<div id="a-all-msg-content">
	<div class="a-all-msg">
        <h3>某位同学的答案</h3>
        <p class="a-time">填写于2014/06/08</p>
        <table cellpadding="0" cellspacing="0" class="list-table">
        	<tr>
            	<td class="q-content">1.问你的梦想是什么呢？你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎</td>
                <td class="a-content">你的梦想是什么呢？你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军</td>
            </tr>
        	<tr>
            	<td class="q-content">2.问你的梦想是什么呢？你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎</td>
                <td class="a-content">你的梦想是什么呢？你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军</td>
            </tr>
        </table>
     </div>
     <input id="msg-ok-btn" class='btn red' type="button" value='关闭' />
</div>
