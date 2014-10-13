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
	
	$("#select").change(function(){
		$.ajax({
			type:'GET',
			url:'manageajax.php?data='+$(this).val(),
			data:$(this).val(),
			success:function(response){
				$(".a-all-msg").remove();
				$(".list-table").append(response);
			}
		})
	})
	$("#select").change(function(){
		$.ajax({
			type:'GET',
			url:'manageajax1.php?data='+$(this).val(),
			data:$(this).val(),
			success:function(response){
				$(".matrix-td").remove();
				$(".a-all-msg1").append(response);
			}
		})
	})
	//图标部分
	//生成数据
	var graphData = [{
			// Visits
			data: [ [6, 1300], [7, 1600], [8, 1900], [9, 2100], [10, 2500], [11, 2200], [12, 2000], [13, 1950], [14, 1900], [15, 2000] ],
			color: '#71c73e'
    	}, 
		{
			// Returning Visits
			data: [ [6, 500], [7, 600], [8, 550], [9, 600], [10, 800], [11, 900], [12, 800], [13, 850], [14, 830], [15, 1000] ],
			color: '#77b7c5',
			points: { radius: 4, fillColor: '#77b7c5' }
		}
	];
	// Lines
	$.plot($('#trend-graph'), graphData, {
		series: {
			points: {
				show: true,
				radius: 5
			},
			lines: {
				show: true
			},
			shadowSize: 0
		},
		grid: {
			color: '#646464',
			borderColor: 'transparent',
			borderWidth: 20,
			hoverable: true
		},
		xaxis: {
			tickColor: 'transparent',
			tickDecimals: 2
		},
		yaxis: {
			tickSize: 1000
		}
	});
	

});
function trBackgroundColor(){
	var trTotalNumber = $("#answer-field table.list-table tr").length;
	for(var i=1;i<trTotalNumber;i=i+2){
		$("#answer-field table.list-table tbody").children().eq(i).css("background","#f7f7f7");
	}
}

