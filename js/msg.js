// JavaScript Document

//注意msg是fixed在屏幕高度110%的位置，所以看不见
//msg默认宽度是25em
//msg默认z-index为100
//msg包括.msg、.msg-border、.msg-content三部分

$(".msg").hide();
$(document).ready(function(){	
 	//initMsg ();
})
/*
* string loadContent
* example: 'msg.php #login-msg-content'
*/
function msgPopOver(loadContent){
	//load一个从别的地方拿到的数据
	$(".msg-content").load(loadContent,
		//做一个msg移到屏幕中央的动画效果
		function(){
			//定义topoff为屏幕高度减去通知框高度的一半，这是为了让通知框居中
			var topoff = ($(window).height()-$(".msg").height())/ 2 + "px";
			$("#whole-msg-bg").fadeIn(600);
			//通知框框弹出的动画
			$(".msg").animate({
				top:topoff		
			},600)//这里的数字是时间
	});
}
/*
*	msg向下滑出画面，whole-msg-bg渐隐
*/
function msgSlideDn(){
	$(".msg").animate({
		top:$(window).height()*1.1
	},500);//这里的数字是时间
	$("#whole-msg-bg").fadeOut(500);
}
/*
*	box向上收起，whole-msg-bg渐隐
*/
function boxSlideUp(){
	$(".box").slideUp();
	$("#whole-msg-bg").fadeOut(500);
}
/*
*	box的popOver调用函数
*/
/*function aAllMsgPopOver (){
	//load一个从别的地方拿到的数据
	$(".box-content").load("msg.php #a-all-msg-content",
		//做一个box移到屏幕中央的动画效果
		function(){
			
			//由于这个box比较特殊，所以先重新给box样式
			var leftoff = (-0.4*$(window).width() + "px");
			var maxHeight = $(window).height()*0.8;
			$(".box").css({
			   "width":"80%",
			   "margin-left":leftoff,
			 });
			$(".box-content").css({
			   "max-height":maxHeight	   
			 });
	
			//定义topoff为屏幕高度减去通知框高度的一半，这是为了让通知框居中
			var topoff = ($(window).height()-$(".box").height())/ 2 + "px";
			$(".box").hide();//隐藏box
			$(".box").css({ //将box移到屏幕中央
				"top":topoff
			});
			$("#whole-msg-bg").fadeIn(600);				
			$(".box").slideDown();//通知框框弹出的动画
			
			$("#msg-ok-btn").click(function(){
				$(".box").slideUp();
				$("#whole-msg-bg").fadeOut(500);
			}) 
			
			
			
		});
}*/
function aAllMsgPopOver (){
		var leftoff = (-0.4*$(window).width() + "px");
		var maxHeight = $(window).height()*0.8;
		$(".box").css({
		   "width":"80%",
		   "margin-left":leftoff,
		 });
		$(".box-content").css({
		   "max-height":maxHeight	   
		 });
		//定义topoff为屏幕高度减去通知框高度的一半，这是为了让通知框居中
		var topoff = ($(window).height()-$(".box").height())/ 2 + "px";
		$(".box").hide();//隐藏box
		$(".box").css({ //将box移到屏幕中央
			"top":topoff
		});
		$("#whole-msg-bg").fadeIn(600);				
		$(".box").slideDown();//通知框框弹出的动画
		
		$("#msg-ok-btn").click(function(){
			$(".box").slideUp();
			$("#whole-msg-bg").fadeOut(500);
		}) 	
}
