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
    <ul class="header-list clear-float">
    	<li class="head-item logo left">
        	<a class="head-link" href='index.php' title="报名吧首页" >
            	<span class="head-name">首页</span>
            </a>
			<div class="reddot"></div>
        </li>
		<li class="head-item nav more right">
        	<a class="head-link">
            	<span class="head-name">更多</span>
            </a>
			<div class="reddot"></div>
        </li>
        <li class="head-item nav personal right">
        	<a class="head-link" href='personal.php' >
				<?php if(!(isset($_COOKIE['srtp-username']))) 
				echo "<span class=\"head-name\">我的</span>";
            	else
				echo "<span class=\"head-name\">".$_COOKIE['srtp-username']."</span>";?><!-- 这里将用户名打印出来，退出放在下方的“more”里面 -->
            </a>
			<div class="reddot"></div>
        </li>
        <li class="head-item nav create right">
        	<a class="head-link" href='create.php' >
            	<span class="head-name">创建</span>
            </a>
			<div class="reddot"></div>
        </li>
        <li class="head-item search-input right">	
        	<a class="head-link">
				<span class="head-name">搜索</span>
                <form id="search" action="#">
                    <input class="search-text" type="text"  placeholder="搜索组织/活动" name="q"></input>
                </form>
            </a>
			<div class="reddot"></div>
        </li>
    </ul>
    <!--<div class='search-mobile search'>
        <form id="search" action="#">
            <input class="search-text" type="text"  placeholder="输入你要找的组织或活动名" name="q"></input>
        </form>
    </div>-->
		<div id="more-dropDown" class="dropDown" >
			<ul class="more-list" >
				<li class="more-item">
					<a><span>账号管理</span></a>
				</li>
				<br />
				<li class="more-item">
					<a><span>提醒与通知</span></a>
				</li>
				<li class="more-item">
					<a><span>省流量模式</span></a>
				</li>
				<li class="more-item">
					<a><span>夜间模式</span></a>
				</li>
				<li class="more-item">
					<a><span>关闭音效</span></a>
				</li>
				<br />
				<li class="more-item">
					<a><span>意见反馈</span></a>
				</li>
				<li class="more-item">
					<a><span>关于报名吧</span></a>
				</li>
				<br />
				<li class="more-item">
					<?php if(!(isset($_COOKIE['srtp-username']))) 
					echo "<a href='#' id=\"login-msg\"><span>请先登录</span></a>";
					else
					echo "<a href='logout.php'><span>退出当前账号</span></a>";?><!-- 这里有退出或登录 -->
				</li>
			</ul>
		</div>
		<div id="search-dropDown" class="dropDown" >
			<ul class="search-list" >
				<p class="search-header">活动</p>
				<li class="search-item">
					<a><span>某某社团报名表</span></a>
				</li>
				<li class="search-item">
					<a><span>某某社团报名表</span></a>
				</li>
				<p class="search-header">组织</p>
				<li class="search-item">
					<a><span>某某社团</span></a>
				</li>
				<li class="search-item">
					<a><span>某某社团</span></a>
				</li>
				<p class="search-header">我的</p>
				<li class="search-item">
					<a><span>某某社团报名表</span></a>
				</li>
				<p class="reminder">没有了</p>
			</ul>
		</div>
		
		
</div>
<div id="tab-container">
	<ul class="tab-list clear-float">
    	<li class="tab-item left active">
        	<a class="tab-link" onClick="slideTo(0);">
        		<span class="tab-name">推荐</span>
            </a>
        </li>
        <li class="tab-item left">
        	<a class="tab-link" onClick="slideTo(1);">
        		<span class="tab-name">榜单</span>
            </a>
        </li>
        <li class="tab-item left">
        	<a class="tab-link" onClick="slideTo(2);">
        		<span class="tab-name">筛选</span>
            </a>
        </li>
    </ul>
</div>
