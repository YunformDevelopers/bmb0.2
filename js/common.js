// JavaScript Document
/* 初始化宽高 */
$(document).ready(function(){
	initSectionWidth ();
	initContentHeight ();
	initHeader();
});


var myScroll;
var innerScroll;
var innerScroll2;
var innerScroll3;
function loaded () {
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
	myScroll.on('scrollEnd', function () {
		var currentPos = myScroll.currentPage['pageX'];
		$("#tab-container ul.tab-list").children().removeClass("active");//移除已经存在的active的class
		$("#tab-container ul.tab-list").children().eq(currentPos).addClass("active");//被点击的父级元素添加active class
	});
	
	var browser = {
		versions : function() {
				var u = navigator.userAgent, app = navigator.appVersion;
				return {//移动终端浏览器版本信息   
				mobile : !!u.match(/AppleWebKit.*Mobile.*/)
						|| !!u.match(/AppleWebKit/), //是否为移动终端  
				
				};
		}(),
		language : (navigator.browserLanguage || navigator.language).toLowerCase()
	}
	if (browser.versions.mobile){//是否为移动终端  
		$("#scroller li").css("overflow","hidden");
		/* 初始化content-container高度 */
		var contentHeight = ($(window).height()-$("#header").height()-$("#tab-container").height());//计算除去header和tab-container外的高度
		$(".content li").css("height",contentHeight);
		innerScroll = new IScroll('.innerWrapper',{
			scrollX: false,
			scrollY: true,
			mouseWheel: true,
			mouseWheelSpeed: 3000000,//测试中
		});
		innerScroll2 = new IScroll('.innerWrapper2',{
			scrollX: false,
			scrollY: true,
			mouseWheel: true,
			bounce:false,//测试中
		});
		innerScroll3 = new IScroll('.innerWrapper3',{
			scrollX: false,
			scrollY: true,
			mouseWheel: true,
			bounce:false,//测试中
		});
		$(".card .img-holder").css("box-shadow","none");
	}
	
}

document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);

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
	var sectionWidth = $(".content-container").css("width");//获得.swipe的宽
	//$(".section").css("width",sectionWidth);//给section宽度
	$(".content li").css("width",sectionWidth);
}
/* 初始化content-container高度 */
function initContentHeight () {
	var contentHeight = ($(window).height()-$("#header").height()-$("#tab-container").height());//计算除去header和tab-container外的高度
	$(".content-container").css("height",contentHeight);//给content-container高度
	$(".content li").css("height",contentHeight);
}
/* 标签页的左右切换 */
function slideTo (herePos){
	myScroll.goToPage(herePos, 0, 500);
}

/* 点击后activate的函数 */
$('#tab-container .tab-link, #header .head-link').click(function(){
	$(this).parent("li").parent("ul").find(".active").removeClass("active");//移除已经存在的active的class
	$(this).parent("li").addClass("active");//被点击的父级元素添加active class
		
});
	

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



