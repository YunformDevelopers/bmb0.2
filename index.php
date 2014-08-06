<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--下面这meta意思是告知浏览器的宽度是设备的宽度，缩放值为1.0-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>首页</title>
<link rel="stylesheet" href="style/index.css"></link>
<link rel="stylesheet" href="style/msg.css"></link>
<link rel="stylesheet" href="style/responsive.css"></link>
<!--下面这个js文件是为了兼容IE的媒体查询而准备的-->
<script src="js/css3-mediaqueries.js"></script>
<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="js/showtips.js"></script>
<script type="text/javascript" src="test for Liang/test.js"></script>
<script type="text/javascript" src="js/msg.js"></script>
<?php
    require 'includes/header.inc.php';
?>
</head>
<body>
<div id='slideshow' style="display:none;">
	
</div>

<div id="content-container">
	<div id="content">
    	<div id="wrapper">
		<div id="mySwipe" id='slider'  class='swipe'>
				<div class='swipe-wrap'>
					<div>
					<div id='newest' class="section">
							<div class="section-header">
								<h2>最新上架</h2>
								<div class="h2-line">
								</div>
							</div>
							<div class="section-body">
								<div class="card hottest" > 
									<a href='reform.php?id=1'>
										<div class="img-holder">
											<div class="fader">
												<img src="images/1.jpg" alt="" />
											</div>
											<div class="form-name">
												浙大某个社团网站纳新报名表
											</div>
											<div class="img-counter">
												<div class="counter">
													<span class="time-left">还有两天</span>
													<span class="written">14次</span>
												</div>
											</div>
										</div>
									</a>
								</div>
								<div class="card hottest" > 
									<a href='#'>
										<div class="img-holder">
											<div class="fader">
												<img src="images/2.jpg" alt="" />
											</div>
											<div class="form-name">
												浙大某个社团网站纳新报名表
											</div>
											<div class="img-counter">
												<div class="counter">
													<span class="time-left">还有两天</span>
													<span class="written">14次</span>
												</div>
											</div>
										</div>
									</a>
								</div>
								<div class="card hottest" > 
									<a href='#'>
										<div class="img-holder">
											<div class="fader">
												<img src="images/3.jpg" alt="" />
											</div>
											<div class="form-name">
												浙大某个社团网站纳新报名表
											</div>
											<div class="img-counter">
												<div class="counter">
													<span class="time-left">还有两天</span>
													<span class="written">14次</span>
												</div>
											</div>
										</div>
									</a>
								</div>
								<div class="card hottest" > 
									<a href='#'>
										<div class="img-holder">
											<div class="fader">
												<img src="images/4.jpg" alt="" />
											</div>
											<div class="form-name">
												浙大某个社团网站纳新报名表
											</div>
											<div class="img-counter">
												<div class="counter">
													<span class="time-left">还有两天</span>
													<span class="written">14次</span>
												</div>
											</div>
										</div>
									</a>
								</div>
							<!-- 这里是用来使元素左端对齐的 -->
								<div class='card left-fix'>&nbsp;</div>
								<div class='card left-fix'>&nbsp;</div>
								<div class='card left-fix'>&nbsp;</div>
								<div class='card left-fix'>&nbsp;</div>
							</div>
						</div>
					</div>
					<div>
											<div id='hottest' class="section">
							<div class="section-header">
								<h2>最热门</h2>
								<div class="h2-line">
								</div>
							</div>
							<div class="section-body">
								<div class="card hottest" > 
									<a href='reform.php?id=1'>
										<div class="img-holder">
											<div class="fader">
												<img src="images/1.jpg" alt="" />
											</div>
											<div class="form-name">
												浙大某个社团网站纳新报名表
											</div>
											<div class="img-counter">
												<div class="counter">
													<span class="time-left">还有两天</span>
													<span class="written">14次</span>
												</div>
											</div>
										</div>
									</a>
								</div>
								<div class="card hottest" > 
									<a href='#'>
										<div class="img-holder">
											<div class="fader">
												<img src="images/2.jpg" alt="" />
											</div>
											<div class="form-name">
												浙大某个社团网站纳新报名表
											</div>
											<div class="img-counter">
												<div class="counter">
													<span class="time-left">还有两天</span>
													<span class="written">14次</span>
												</div>
											</div>
										</div>
									</a>
								</div>
								<div class="card hottest" > 
									<a href='#'>
										<div class="img-holder">
											<div class="fader">
												<img src="images/3.jpg" alt="" />
											</div>
											<div class="form-name">
												浙大某个社团网站纳新报名表
											</div>
											<div class="img-counter">
												<div class="counter">
													<span class="time-left">还有两天</span>
													<span class="written">14次</span>
												</div>
											</div>
										</div>
									</a>
								</div>
								<div class="card hottest" > 
									<a href='#'>
										<div class="img-holder">
											<div class="fader">
												<img src="images/4.jpg" alt="" />
											</div>
											<div class="form-name">
												浙大某个社团网站纳新报名表
											</div>
											<div class="img-counter">
												<div class="counter">
													<span class="time-left">还有两天</span>
													<span class="written">14次</span>
												</div>
											</div>
										</div>
									</a>
								</div>
							<!-- 这里是用来使元素左端对齐的 -->
								<div class='card left-fix'>&nbsp;</div>
								<div class='card left-fix'>&nbsp;</div>
								<div class='card left-fix'>&nbsp;</div>
								<div class='card left-fix'>&nbsp;</div>
							</div>
						</div>

					</div>
					<div>
						<div id='hottest' class="section">
							<div class="section-header">
								<h2>标签云</h2>
								<div class="h2-line">
							</div>
						</div>
					</div>
                </div>
				</div>
            </div>
			<div style='text-align:center;padding-top:20px;'>
  
			  <button onclick='mySwipe.prev()'>prev</button> 
			  <button onclick='mySwipe.next()'>next</button>

			</div>

		</div>
	</div>
</div>
			
<div class='reminder'>
	<p>没找到想要的？试试搜索</p>
	<div class='search'>
		<form id="search" action="#">
 			<input class="search-text" type="text" placeholder="search" name="q"></input>
		</form>
	</div>
</div>
<!--
						<div id='hottest' class="section">
							<div class="section-header">
								<h2>热门活动</h2>
								<div class="h2-line">
								</div>
							</div>
							<div class="section-body">
								<div class="card hottest" > 
									<a href='reform.php?id=1'>
										<div class="img-holder">
											<div class="fader">
												<img src="images/1.jpg" alt="" />
											</div>
											<div class="form-name">
												浙大某个社团网站纳新报名表
											</div>
											<div class="img-counter">
												<div class="counter">
													<span class="time-left">还有两天</span>
													<span class="written">14次</span>
												</div>
											</div>
										</div>
									</a>
								</div>
								<div class="card hottest" > 
									<a href='#'>
										<div class="img-holder">
											<div class="fader">
												<img src="images/2.jpg" alt="" />
											</div>
											<div class="form-name">
												浙大某个社团网站纳新报名表
											</div>
											<div class="img-counter">
												<div class="counter">
													<span class="time-left">还有两天</span>
													<span class="written">14次</span>
												</div>
											</div>
										</div>
									</a>
								</div>
								<div class="card hottest" > 
									<a href='#'>
										<div class="img-holder">
											<div class="fader">
												<img src="images/3.jpg" alt="" />
											</div>
											<div class="form-name">
												浙大某个社团网站纳新报名表
											</div>
											<div class="img-counter">
												<div class="counter">
													<span class="time-left">还有两天</span>
													<span class="written">14次</span>
												</div>
											</div>
										</div>
									</a>
								</div>
								<div class="card hottest" > 
									<a href='#'>
										<div class="img-holder">
											<div class="fader">
												<img src="images/4.jpg" alt="" />
											</div>
											<div class="form-name">
												浙大某个社团网站纳新报名表
											</div>
											<div class="img-counter">
												<div class="counter">
													<span class="time-left">还有两天</span>
													<span class="written">14次</span>
												</div>
											</div>
										</div>
									</a>
								</div>
							<!-- 这里是用来使元素左端对齐的 -->
								<div class='card left-fix'>&nbsp;</div>
								<div class='card left-fix'>&nbsp;</div>
								<div class='card left-fix'>&nbsp;</div>
								<div class='card left-fix'>&nbsp;</div>
							</div>
						</div>
					
-->	
<div class='msg'>
    <div class='msg-border'>
        <div class='msg-content'>
        <!--内容是动态获得的-->			
        </div>
    </div>
</div>
<?php
     include 'includes/footer.inc.php';
?>
</body>
<script src='js/swipe.js'></script>
<script>
		/* 初始化宽高 */
		$(document).ready(function(){
			initSectionWidth ();
			initContentHeight ();
			initHeader();
			
		});
		/* 改变窗口宽高时重新初始化宽高 */
		window.onresize=function(){
			initSectionWidth ();
			initContentHeight ();
			initHeader();
			
			
			
			
		}
		/* 初始化head里面的部分class */
		function initHeader () {
			/* 这段比较复杂 */
			/* header里面第一个有logo和index两种状态，背景图片是不同的，一个是报名吧logo，一个是首页icon。同时index呈现的是nav的样式 */
			/* header里面第四个是搜索，有两种状态，一种是输入框search-input，一种则是链接search。同时search呈现的是nav的样式 */
			/* nav的背景图片位置，padding都在css文件中给出 */
			var windowWidth = $(window).width();
			if (windowWidth < 500) {
				$("#header .header-list").children().eq(0).addClass("index");
				$("#header .header-list").children().eq(0).addClass("nav");
				$("#header .header-list").children().eq(0).removeClass("logo");
				$("#header .header-list").children().eq(4).addClass("nav");
				$("#header .header-list").children().eq(4).addClass("search");
				$("#header .header-list").children().eq(4).removeClass("search-input");
			}
			else if (windowWidth < 750 ) {
				$("#header .header-list").children().eq(0).addClass("logo");
				$("#header .header-list").children().eq(0).removeClass("nav");
				$("#header .header-list").children().eq(0).removeClass("index");
				$("#header .header-list").children().eq(4).addClass("nav");
				$("#header .header-list").children().eq(4).addClass("search");
				$("#header .header-list").children().eq(4).removeClass("search-input");
			}
			else {
				$("#header .header-list").children().eq(0).addClass("logo");
				$("#header .header-list").children().eq(0).removeClass("nav");
				$("#header .header-list").children().eq(0).removeClass("index");
				$("#header .header-list").children().eq(4).removeClass("nav");
				$("#header .header-list").children().eq(4).removeClass("search");
				$("#header .header-list").children().eq(4).addClass("search-input");	
			};
			/*var navNameArr = new Array( "index", "search", "create", "personal", "more") ;
			for(var i=0;i<navNameArr.length;i++) {
				var navIth = $("#header .header-list").find("." + navNameArr[i] + " a");
				var navIthHover = $("#header .header-list").find("." + navNameArr[i] + " a:hover");
				var navIthActive = $("#header .header-list").find("." + navNameArr[i] + " a:active");
				var navIthActiveClass = $("#header .header-list").find("." + navNameArr[i] + ".active a");
				navIth.css({
					"background-image":"url(images/header-icon/" + navNameArr[i] + ".png)"
				});
				navIthHover.css({
					"background-image":"url(images/header-icon/" + navNameArr[i] + "-hover.png)",
					"background-color":"red"
				});
				navIthActive.css({
					"background-image":"url(images/header-icon/" + navNameArr[i] + "-active.png)"
				});
				navIthActiveClass.css({
					"background-image":"url(images/header-icon/" + navNameArr[i] + "-active.png)"
				});
			}
			*/
		}
		
		/* 初始化section宽度 */
		function initSectionWidth () {
			var sectionWidth = $(".swipe").css("width");//获得.swipe的宽
			$(".section").css("width",sectionWidth);//给section宽度
		}
		/* 初始化content-container高度 */
		function initContentHeight () {
			var contentHeight = ($(window).height()-$("#header").height()-$("#tab-container").height());//计算除去header和tab-container外的高度
			$("#content-container").css("height",contentHeight);//给content-container高度
		}
		/* 标签页的swipe切换 */
		function slideTo (herePos){
			window.mySwipe.slide(herePos);
		}
		/* 点击后activate的函数 */
		$('#tab-container .tab-link, #header .head-link').click(function(){
			$(this).parent("li").parent("ul").find(".active").removeClass("active");//移除已经存在的active的class
			$(this).parent("li").addClass("active");//被点击的父级元素添加active class
				
		});
			
		// 初始化swipe设置
		var elem = document.getElementById('mySwipe');
		window.mySwipe = Swipe(elem, {
				startSlide: 0,
				auto: 300000,
				continuous: true,
				disableScroll: true,
				stopPropagation: true,
				callback: function(){
					var currentPos = window.mySwipe.getPos();
					$("#tab-container ul.tab-list").children().removeClass("active");//移除已经存在的active的class
					$("#tab-container ul.tab-list").children().eq(currentPos).addClass("active");//被点击的父级元素添加active class
				}
		});

		// with jQuery
		// window.mySwipe = $('#mySwipe').Swipe().data('Swipe');

/* 去除触摸300ms延迟的对象 */		
function NoClickDelay(el) {
    this.element = typeof el == 'object' ? el: document.getElementById(el);       
    if (window.Touch)  this.element.addEventListener('touchstart', this, false);
}
NoClickDelay.prototype = {
    handleEvent: function(e) {               
        switch (e.type) {                       
        case 'touchstart':
            this.onTouchStart(e);
            break;                       
        case 'touchmove':
            this.onTouchMove(e);
            break;                       
        case 'touchend':
            this.onTouchEnd(e);
            break;               
        }       
    },
    onTouchStart: function(e) {
        e.preventDefault(); this.moved = false;
        this.theTarget = document.elementFromPoint(e.targetTouches[0].clientX, e.targetTouches[0].clientY);               
        if (this.theTarget.nodeType == 3) this.theTarget = theTarget.parentNode;
        this.theTarget.className += ' pressed';
        this.element.addEventListener('touchmove', this, false);
        this.element.addEventListener('touchend', this, false);       
    },
    onTouchMove: function(e) {
        this.moved = true;
        this.theTarget.className = this.theTarget.className.replace(/ ?pressed/gi, '');       
    },
    onTouchEnd: function(e) {
        this.element.removeEventListener('touchmove', this, false);
        this.element.removeEventListener('touchend', this, false);                     
        if (!this.moved && this.theTarget) {
            this.theTarget.className = this.theTarget.className.replace(/ ?pressed/gi, '');                        
            var theEvent = document.createEvent('MouseEvents');
            theEvent.initEvent('click', true, true);
            this.theTarget.dispatchEvent(theEvent);                
        }
        this.theTarget = undefined;       
    }
};		
//实例化去除延迟的对象
new NoClickDelay(document.getElementById('header'));
new NoClickDelay(document.getElementById('tab-container'));
new NoClickDelay(document.getElementById('newest'));		
new NoClickDelay(document.getElementById('hottest'));


	
		
</script>
</html>