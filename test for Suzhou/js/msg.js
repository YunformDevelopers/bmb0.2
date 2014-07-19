// JavaScript Document
$(".msg").hide();
$(document).ready(function(){	
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
	 
  	$("#register-msg").click(function(){
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
			});
	 })

  	$("#login-msg").click(function(){
		//load一个从别的地方拿到的数据
		$(".msg-content").load("msg.php #login-msg-content",
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
})
