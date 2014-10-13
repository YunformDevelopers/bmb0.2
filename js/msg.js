// JavaScript Document

//注意msg是fixed在屏幕高度110%的位置，所以看不见
//msg默认宽度是25em
//msg默认z-index为100
//msg包括.msg、.msg-border、.msg-content三部分

$(".msg").hide();
$(document).ready(function(){	
 	//initMsg ();
})
//初始化msg模块‘
function initMsg (){
  	//对每个需要调用message的链接应用下面的click函数
  	$("#contact-msg").click(function(){
		//load一个从别的地方拿到的数据
		$(".msg-content").load("msg.php #contact-msg-content",
			//做一个msg移到屏幕中央的动画效果
			function(){
				//定义topoff为屏幕高度减去通知框高度的一半，这是为了让通知框居中
				var topoff = ($(window).height()-$(".msg").height())/ 2 + "px";
				//通知框框弹出的动画
				$(".msg").animate({
					top:topoff		
				},600)//这里的数字是时间
				$("#msg-ok-btn").click(function(){
					$(".msg").animate({
						top:$(window).height()*1.1
					},500)//这里的数字是时间
	 			}) 
			});
	 })
	 
	/*
	*#work-msg出现在footer里
	*弹出内容为工作分配
	*/
  	$("#work-msg").click(function(){
		//load一个从别的地方拿到的数据
		$(".msg-content").load("msg.php #work-msg-content",
			//做一个msg移到屏幕中央的动画效果
			function(){
				//定义topoff为屏幕高度减去通知框高度的一半，这是为了让通知框居中
				var topoff = ($(window).height()-$(".msg").height())/ 2 + "px";
				//通知框框弹出的动画
				$(".msg").animate({
					top:topoff		
				},600)//这里的数字是时间
				$("#msg-ok-btn").click(function(){
					$(".msg").animate({
						top:$(window).height()*1.1
					},500)//这里的数字是时间
	 			}) 
			});
	 })
	 
	/*
	*#register-msg出现在header和其他需要注册的操作中
	*弹出内容为注册表单
	*/
  	$("#register-msg").click(function(){
		registerMsgPopOver();
	 })

	/*
	*#login-msg出现在header和其他需要登录的操作中
	*弹出内容为登录表单
	*/
  	$("#login-msg").click(function(){
		loginMsgPopOver ();
	 })
	 
	/*
	*#register-msg出现在未注册用户填完表之后注册弹出
	*弹出内容为注册表单，包含hidden字段，
	*/
  	$("#after-fill-register-msg").click(function(){
		afterFillRegisterMsgPopOver();
	 })

	/*
	*#login-msg出现在在未登录用户填完表之后登录弹出
	*弹出内容为登录表单，包含hidden字段，
	*/
  	$("#after-fill-login-msg").click(function(){
		afterFillLoginMsgPopOver ();
	 })
	 
	/*
	*.a-all-msg出现在manage.php表格中
	*弹出内容为所有答案的详细内容
	*/
	 /*$(".a-all-msg").click(function(){
		 var id=$(this).find(".col-3").html();
			//做一个box移到屏幕中央的动画效果
				 $.ajax({
						type:'GET',
						url:'manageboxajax.php?id='+id,
						success:function(response){
							$(".msg-content").append(response);
						}
				});
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
				$(".box").slideDown();//通知框框弹出的动画
				
				$("#msg-ok-btn").click(function(){
					$(".box").slideUp();
	 			}) 
	 })
	 */
	 
	
}
function registerMsgPopOver (){
	//load一个从别的地方拿到的数据
	$(".msg-content").load("msg.php #register-msg-content",
		//做一个msg移到屏幕中央的动画效果
		function(){
			//定义topoff为屏幕高度减去通知框高度的一半，这是为了让通知框居中
			var topoff = ($(window).height()-$(".msg").height())/ 2 + "px";
			//通知框框弹出的动画
			$(".msg").animate({
				top:topoff		
			},600)//这里的数字是时间
			$("#msg-ok-btn").click(function(){
				$(".msg").animate({
					top:$(window).height()*1.1
				},500)//这里的数字是时间
			}) 
			initMsg ();//重新初始化msg模块
		});
}
function loginMsgPopOver (){
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
function msgSlideDn(){
	$(".msg").animate({
		top:$(window).height()*1.1
	},500);//这里的数字是时间
	$("#whole-msg-bg").fadeOut(500);
}

function aAllMsgPopOver (){
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
}
