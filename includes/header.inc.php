<?php
include 'includes.inc.php';
if(isset($_POST['username'])&&isset($_POST['password'])){
     @mysql_connect('localhost','srtp-lzx','srtp-lzx');
	 @mysql_select_db('srtp-lzx') or die(mysql_error());
     $result = fetchOne("select * from _user where username='".$_POST['username']."'");
	 if(count($result)!=0){
	     if($result['password']==$_POST['password']){
             setcookie('srtp-username',$_POST['username'],0);
             header("location:index.php");
	     }
		 else{
		     do_js_alert('密码错误');
		 }
    }
	 else{
	     do_js_alert('不存在该用户名');
	 }
}
?>
<div id='header'>
	<ul>
		<li><a href='index.php' title="访问首页，看看新鲜事物">报名吧</a></li>
		<li><a href='create.php'>创建</a></li>
		<?php if(!(isset($_COOKIE['srtp-username'])&&isset($_COOKIE['srtp-password']))) 
		echo "<li><a href='#' id=\"register-msg\">注册</a>/<a href='#' id=\"login-msg\">登录</a></li>";
		else
		echo "<li><a href='#'>欢迎你</a>/<a href='logout.php'>退出</a></li>";?>
		<li><a href='personal.php'>我的</a></li>
		<li class="search">
	       	<div class='search'>
                <form id="search" action="#">
                    <input class="search-text" type="text"  placeholder="search" name="q"></input>
                </form>
			</div>
		</li>
		<li  class='justify-helper'></li>
	</ul>
    <div class='search-mobile search'>
        <form id="search" action="#">
            <input class="search-text" type="text"  placeholder="输入你要找的组织或活动名" name="q"></input>
        </form>
    </div>
</div>
