<?php
include 'includes.inc.php';
if(isset($_POST['username'])&&isset($_POST['password'])){
     @mysql_connect('localhost','srtp-lzx','srtp-lzx');
	 @mysql_select_db('srtp-lzx') or die(mysql_error());
     $result = fetchOne("select * from _user where username='".$_POST['username']."'");
	 if(count($result)!=0){
	     if($result['password']==$_POST['password']){
             setcookie('srtp-username',$_POST['username'],0);
             setcookie('srtp-password',$_POST['password'],0);
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
    <ul class="header-list clear-float">
    	<li class="head-item index logo left">
        	<a class="head-link" href='index.php' title="报名吧首页" >
            	<span class="head-name">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            </a>
        </li>
		<li class="head-item more right">
        	<a class="head-link">
            	<span class="head-name">更多</span>
            </a>
        </li>
        <li class="head-item personal right">
        	<a class="head-link" href='personal.php' >
            	<span class="head-name">我的</span>
            </a>
        </li>
        <li class="head-item create right">
        	<a class="head-link" href='create.php' >
            	<span class="head-name">创建</span>
            </a>
        </li>
        <li class="head-item search right">
        	
        	<a class="head-link">
                <form id="search" action="#">
                    <input class="search-text" type="text"  placeholder="搜索组织/活动" name="q"></input>
                </form>
            </a>
        </li>
    </ul>
    <div class='search-mobile search'>
        <form id="search" action="#">
            <input class="search-text" type="text"  placeholder="输入你要找的组织或活动名" name="q"></input>
        </form>
    </div>
</div>
<div id="tab-container">
	<ul class="tab-list clear-float">
    	<li class="tab-item left active">
        	<a class="tab-link">
        		<span class="tab-name">推荐</span>
            </a>
        </li>
        <li class="tab-item left">
        	<a class="tab-link">
        		<span class="tab-name">榜单</span>
            </a>
        </li>
        <li class="tab-item left">
        	<a class="tab-link">
        		<span class="tab-name">筛选</span>
            </a>
        </li>
    </ul>
</div>
