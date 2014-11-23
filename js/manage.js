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
			success:function(response){
				$(".matrix-td").remove();
				$(".a-all-msg1").append(response);
			}
		})
	})
	$('body').on('click','.a-all-msg',function(){
		$.ajax({
			type:'GET',
			url:'manageboxajax.php?id='+$(this).attr('id'),
			success:function(response){
				$('.box-content').html(response);
			}
		})
	})
	//图标部分
	//生成数据
	var trendGraphData = [{
			// Visits
			data: [ [10.11, 13], [10.12, 16], [10.13, 19], [10.14, 21], [10.15, 25], [10.16, 22], [10.17, 200], [10.18, 19], [10.19, 19], [10.20, 20] ],
			color: '#71c73e'
    	}, 
	];
	// Lines
	$.plot($('#trend-graph'), trendGraphData, {
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
			hoverable: true,
			clickable: true
		},
		xaxis: {
			tickColor: 'transparent',
			tickDecimals: 2
		},
		yaxis: {
			//tickSize: 1000
		}
	});
	//生成数据
	var sourceGraphData = [
		{ label: "cc98",  data: [[1,10]]},
		{ label: "微信",  data: [[1,30]]},
		{ label: "二维码200px",  data: [[1,90]]},
		{ label: "二维码500px",  data: [[1,70]]},
		{ label: "人人",  data: [[1,80]]},
		{ label: "独立链接",  data: [[1,0]]}
	];
	// pie
	$.plot($('#source-graph'), sourceGraphData, {
		series: {
			pie : {
				innerRadius: 0.5 ,
				show : true
			}
		},
		grid: {
			hoverable: true,
			clickable: true
		},
	});	
	
	
	
	function showTooltip(x, y, contents) {
		$('<div id="tooltip">' + contents + '</div>').css({
			top: y - 16,
			left: x + 20
		}).appendTo('body').fadeIn();
	}
	 
	var previousPoint = null;
	$('#trend-graph').bind('plothover', function (event, pos, item) {
		if (item) {
			if (previousPoint != item.dataIndex) {
				previousPoint = item.dataIndex;
				$('#tooltip').remove();
				var x = item.datapoint[0],
					y = item.datapoint[1];
					showTooltip(item.pageX, item.pageY, '在<b>' + x + '</b>新增填写<b>' + y + '</b>人');
			}
		} else {
			$('#tooltip').remove();
			previousPoint = null;
		}
	});
	var previousSector = null;
	$('#source-graph').bind('plothover', function (event, pos, item) {
		if (item) {
			if (previousSector != item.seriesIndex) {
				previousSector = item.seriesIndex;
				$('#tooltip').remove();
				var label = item.series.label,
					number = item.datapoint[1][0][1];
					percentage = Math.round(item.datapoint[0]);
					showTooltip(pos.pageX, pos.pageY,  label + '<br />' + number + '个,占<b>' + percentage + '%</b>');
			}
		} else {
			$('#tooltip').remove();
			previousPoint = null;
		}
	});

});
//卢智雄2014-11-11添加
function makeCsv() {
	var param = window.location.search;
	var type = param.split('=')[1];
	window.open('makecsv.php?id='+type);
}
function trBackgroundColor(){
	var trTotalNumber = $("#answer-field table.list-table tr").length;
	for(var i=1;i<trTotalNumber;i=i+2){
		$("#answer-field table.list-table tbody").children().eq(i).css("background","#f7f7f7");
	}
}

