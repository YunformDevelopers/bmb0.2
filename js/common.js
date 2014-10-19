// JavaScript Document
/* 初始化宽高 */
$(document).ready(function(){
	alert("fdsfsd");
	var myScroll;//负责横向滑动的iscroll对象
	var innerScroll;//负责移动端纵向滑动的iscroll对象
	var innerScroll2;
	var innerScroll3;//三个标签页意味着三个iscroll对象
	initSectionWidth ();
	initContentHeight ();
	initHeader();
	initSlideshow ();
	initDropDown ();
	loaded();
	pinTabContainer();
});
/* 改变窗口宽高时重新初始化宽高 */
window.onresize=function(){
	/*initSectionWidth ();
	initContentHeight ();
	initHeader();
	initSlideshow ();
	initDropDown ();
	pinTabContainer ();*/
	alert("fdsfsd");
	var myScroll;//负责横向滑动的iscroll对象
	var innerScroll;//负责移动端纵向滑动的iscroll对象
	var innerScroll2;
	var innerScroll3;//三个标签页意味着三个iscroll对象
	initSectionWidth ();
	initContentHeight ();
	initHeader();
	initSlideshow ();
	initDropDown ();
	loaded();
	pinTabContainer();
}
function loaded () {//在body load完之后执行
	/* 初始化iscroll对象 */
	myScroll = new IScroll('#wrapper', {
		scrollX: true,
		scrollY: false,
		mouseWheel: false,
		keyBindings: true,
		snap: 'li',
		snapSpeed: 400,
		momentum: false,
		freeScroll: false,
	});
	//滚动完之后执行的函数
	myScroll.on('scrollEnd', function () {
		var currentPos = myScroll.currentPage['pageX'];
		$("#tab-container ul.tab-list").children().removeClass("active");//移除已经存在的active的class
		$("#tab-container ul.tab-list").children().eq(currentPos).addClass("active");//被点击的父级元素添加active class
	});
	//为低版本IE进行优化
	var isIE = function(ver){
   		var b = document.createElement('b')
		b.innerHTML = '<!--[if IE ' + ver + ']><i></i><![endif]-->'
		return b.getElementsByTagName('i').length === 1//只有IE会读取此类注释里面的内容，导致i的length改变
	}
	if(isIE(6)||isIE(7)||isIE(8)||isIE(9)||isIE(11)){
		alert('ciwei IE!!');
		myScroll.options.useTransform = false;
	}
	//获取浏览器的信息
	var browser = {
		versions : function() {
				var u = navigator.userAgent, app = navigator.appVersion;
				return {//移动终端浏览器版本信息   
					mobile : !!u.match(/AppleWebKit.*Mobile.*/), //是否为移动终端  
				};
		}(),
		language : (navigator.browserLanguage || navigator.language).toLowerCase()
	}
	//为移动端做设置
	if (browser.versions.mobile){//是否为移动终端
		$("body").css("overflow","hidden");
		$("#slideshow").css("display","none");
		$("#footer").css("display","none");
		
		$("#scroller li").css("overflow","hidden");
		//为优化性能，去除盒子的阴影
		$(".card .img-holder").css("box-shadow","none");
		//为节省流量，去除图片
		$(".card .img-holder .fader ").css("display","none");
		$(".card").css("margin","0.5em 0.3em 0.2em 0.3em");
		$("#my-release .form-op").css("height","52px");
		$("#my-release .form-op .btn").css({
			"float":"left",
			"margin":"14px"
		});
		$("#my-release .form-status").css("height","52px");
		$("#my-release .form-status img").css({
			"width":"50px",
			"height":"50px",
			"margin":"-20px 210px"
			});
		/* 初始化content-container高度 */
		var contentHeight = ($(window).height()-$("#header").height()-$("#tab-container").height());//计算除去header和tab-container外的高度
		$(".content li").css("height",contentHeight);
		innerScroll = new IScroll('.innerWrapper',{
			scrollX: false,
			scrollY: true,
			mouseWheel: true,
			mouseWheelSpeed: 3000000,//测试中
			preventDefaultException: { className: /(^|\s)formfield(\s|$)/ },
		});
		innerScroll2 = new IScroll('.innerWrapper2',{
			scrollX: false,
			scrollY: true,
			mouseWheel: true,
			bounce:false,//测试中
			preventDefaultException: { className: /(^|\s)formfield(\s|$)/ },
		});
		innerScroll3 = new IScroll('.innerWrapper3',{
			scrollX: false,
			scrollY: true,
			mouseWheel: true,
			bounce:false,//测试中
			preventDefaultException: { tagName: /^(INPUT|TEXTAREA|BUTTON|SELECT)$/ },
		});
		
	}
	$('.section-body').css("text-align","justify");
}
document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);//iscroll的设置

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
	var sectionWidth = $(".content-container").css("width");//获得.swipe的宽
	//$(".section").css("width",sectionWidth);//给section宽度
	$(".content > li").css("width",sectionWidth);
}
/* 初始化content-container高度 */
function initContentHeight () {
	var contentHeight = ($(window).height()-$("#header").height()-$("#tab-container").height());//计算除去header和tab-container外的高度
	$(".content-container").css("height",contentHeight);//给content-container高度
	$(".content > li").css("height",contentHeight);
}
/* 标签页的左右切换 */
function slideTo (herePos){
	myScroll.goToPage(herePos, 0, 500);
}
//初始化slideshow高度
function initSlideshow (){
	if ($(window).width() < 500) {
		var slideshowHeight = $(window).height()-$("#header").height()-$("#tab-container").height();
		$("#slideshow").css("height",slideshowHeight);
		//定义topoff为slideshow高度减去slideshow-inner高度的一半，这是为了让slideshow-innner垂直居中
		var topoff = (slideshowHeight-$(".slideshow-inner").height())/ 2 + "px";
		$(".slideshow-inner").css("top",topoff);
	}
	else {
		var slideshowHeight = $(window).height()-$("#header").height();
		$("#slideshow").css("height",slideshowHeight);
		//定义topoff为slideshow高度减去slideshow-inner高度的一半，这是为了让slideshow-innner垂直居中
		var topoff = (slideshowHeight-$(".slideshow-inner").height())/ 2 + "px";
		$(".slideshow-inner").css("top",topoff);
	}
}
//初始化dropDown
function initDropDown (){
	//$("#header .more .head-link")
	$("#header .more .head-link").bind("click",function(event){
		upDrop("search");
		$(".search-mobile .search-text").slideUp();
		$(".search-mobile").slideUp();
		downDrop("more");
        event.stopPropagation();    //  阻止事件冒泡
    });
	if ($(window).width() < 750){
		$("#header .search .head-link, #header .search-input .head-link, input.search-text, .search-mobile").bind("click",function(event){
			upDrop("more");
			$(".search-mobile .search-text").slideDown();
			$(".search-mobile").slideDown();
			//downDrop("search");
			$("input.search-text").focus();
			event.stopPropagation();    //  阻止事件冒泡
		});	
	}
	$("input.search-text").keydown(function(){
		downDrop("search");
	});
	$(document).bind("click",function(){
		upDrop("more");
		upDrop("search");
		$(".search-mobile .search-text").slideUp();
		$(".search-mobile").slideUp();
	});
}
function downDrop (id){
	$("#" + id + "-dropDown").slideDown();
}
function upDrop (id){
	$("#" + id + "-dropDown").slideUp();
}
/* 点击后activate的函数 */
$('#tab-container .tab-link, #header .head-link').click(function(){
	$(this).parent("li").parent("ul").find(".active").removeClass("active");//移除已经存在的active的class
	$(this).parent("li").addClass("active");//被点击的父级元素添加active class
		
});
function pinTabContainer (){
	$("#tab-container").pin();
	$("#tab-container").css("width",$(window).width());//确保宽度为100%
}
//QR-code的滑上滑下函数
function toggleWechatQRcode (id , command){
	$id = $(id);
	if (command == "show"){
		$id.parent().find('.wechat-QR-code').slideDown();//应用在与QRcode同一级的元素中
	}
	else if (command == "hide"){
		$id.parent().find('.wechat-QR-code').slideUp();	
	}
	else;
}

/* 去除触摸300ms延迟的对象 *//*
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
*/


