<?php
header('Content-Type:text/html; charset=utf-8');
if(isset($_POST['username'])&&isset($_POST['password'])){
     @mysql_connect('localhost','srtp-lzx','srtp-lzx');
	 @mysql_select_db('srtp-lzx') or die(mysql_error());
     $sql = "SELECT * from _user where username='404764607@qq.com'";
	 $result = mysql_query($sql) or die(mysql_error());
	 if(@mysql_num_rows($result)!=0){
	     @$row = mysql_fetch_array($result) or die(mysql_error());
	     if($row['password']==$_POST['password']){
             setcookie('srtp-username',$_POST['username'],0);
             setcookie('srtp-password',$_POST['password'],0);
             header("location:index.php");
	     }
		 else{
		     echo "<script>alert('密码错误'); </script>";
		 }
    }
	 else{
	     echo "<script>alert('不存在该用户名'); </script>";
	 }
}
?>
<div id='header'>
	<ul>
		<li><a href='index.php' title="访问首页，看看新鲜事物">YunFORM</a></li>
		<li><a href='create.php'>创建</a></li>
		<?php if(!(isset($_COOKIE['srtp-username'])&&isset($_COOKIE['srtp-password']))) 
		echo "<li><a href='#' id=\"register-msg\">注册</a>/<a href='#' id=\"login-msg\">登录</a></li>";
		else
		echo "<li><a href='#' id=\"register-msg\">欢迎你苏州</a>/<a href='logout.php'>退出</a></li>";?>
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
