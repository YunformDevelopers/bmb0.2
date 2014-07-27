$(document).ready(function(){
	//页面开始加载时定义几个初始值
	var currentView = "list";//以列表形式展现
		$("#answer-field table.matrix-table").hide();
		$("#answer-field table.list-table").show();
	var currentTimeOrder = "now2past";//顺序为从现在到过去，即先显示最新的
		$("#time-toggle .now2past").css("color","#DE473A");
		$("#time-toggle .past2now").css("color","black");
	trBackgroundColor();//为IE8这样的不支持伪类的浏览器的表格的奇数背景颜色改变
	
	$(".list-view").click(function(){
		if (currentView == "matrix"){
			$("#answer-field table.matrix-table").hide();
			$("#answer-field table.list-table").show();
			$(".list-view").addClass("active");
			$(".matrix-view").removeClass("active");
			currentView="list";
		}
	
	});
	$(".matrix-view").click(function(){
		if (currentView == "list"){
			$("#answer-field table.matrix-table").show();
			$("#answer-field table.list-table").hide();
			$(".list-view").removeClass("active");
			$(".matrix-view").addClass("active");
			currentView="matrix";
		}
	
	});
	$("#time-toggle").click(function(){
		if (currentTimeOrder == "now2past"){
			//先执行一段语句
			
			

			$(this).find(".now2past").css("color","#000");
			$(this).find(".past2now").css("color","#DE473A");
			currentTimeOrder = "past2now";
		}
		else if (currentTimeOrder == "past2now"){
			//先执行一段语句
			
			
			
			$(this).find(".past2now").css("color","black");
			$(this).find(".now2past").css("color","#DE473A");
			currentTimeOrder = "now2past";
		}
	
	})

});
function trBackgroundColor(){
	var trTotalNumber = $("#answer-field table.list-table tr").length;
	for(var i=1;i<trTotalNumber;i=i+2){
		$("#answer-field table.list-table tbody").children().eq(i).css("background","#f7f7f7");
	}
}

