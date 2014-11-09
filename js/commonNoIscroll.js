// JavaScript Document
/* 初始化宽高 */
$(document).ready(function(){
	initDropDown ();
	pinTabContainer();
});
/* 改变窗口宽高时重新初始化宽高 */
window.onresize=function(){
	initDropDown ();
	pinTabContainer ();
}
/***************************** common.js的主要过程引用的函数 *****************************/
/***************************** start here *****************************/
/*检测浏览器版本*/
function getBrowserType (getType) {
	if(getType == "IEVersion"){
		//获取有关IE的版本信息，通过IEVersion获取//返回值int，6-8左右
		var browserIE=navigator.appName
		var b_version=navigator.appVersion
		var version=b_version.split(";");
		if(browserIE=="Microsoft Internet Explorer"){
			var trim_Version=version[1].replace(/[ ]/g,"");
		}
		if(browserIE=="Microsoft Internet Explorer" && trim_Version=="MSIE8.0"){
			var IEVersion = 8;//检测IE8
		}
		else if(browserIE=="Microsoft Internet Explorer" && trim_Version=="MSIE7.0"){
			var IEVersion = 7;//检测IE6
		}
		else if(browserIE=="Microsoft Internet Explorer" && trim_Version=="MSIE6.0"){
			var IEVersion = 6;//检测IE6
		}
		return IEVersion;//返回值int，6-8左右
	}
	else if (getType == "isMobile"){
		//获取浏览器是否为移动端，通过browser.versions.mobile获取//返回值为true或false
		var browser = {
			versions : function() {
					var u = navigator.userAgent, app = navigator.appVersion;
					return {//移动终端浏览器版本信息   
						mobile : !!u.match(/AppleWebKit.*Mobile.*/), //是否为移动终端  
					};
			}(),
		}
		var isMobile = browser.versions.mobile;
		return isMobile;//返回值为true或false
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
//document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);//iscroll的设置
/***************************** common.js的主要过程引用的函数 *****************************/
/***************************** end here *****************************/