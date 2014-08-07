// JavaScript Document
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
				auto: 999000000,//这里将自动切换的数值弄得很大，保证用户不知道这个是可以自动切换的，同时要注意位数过多可能会变成很小的数
				continuous: true,
				disableScroll: false,
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


	
