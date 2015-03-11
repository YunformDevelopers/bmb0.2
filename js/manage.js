$(document).ready(function(){
	//页面开始加载时定义几个初始值
	var currentView = "list";//以列表形式展现
		$("#answer-field table.matrix-table").hide();
		$("#answer-field table.list-table").show();
	var currentTimeOrder = "now2past";//顺序为从现在到过去，即先显示最新的
		$("#time-toggle .now2past").css("color","#DE473A");
		$("#time-toggle .past2now").css("color","black");
	trBackgroundColor("#answer-field table.list-table");//为IE8这样的不支持伪类的浏览器的表格的奇数背景颜色改变
	
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
				trBackgroundColor(".box .box-table");
				boxTableZclip();
				$('.copy.btn').hide();
			}
		})
	})
	function boxTableZclip (){
		$(".box .box-table .btn.copy").zclip({
			path:'js/ZeroClipboard.swf',
			copy:function(){
				var copyContent;
				if(copyContent = $(this).parent().children(".body").html()){
					return copyContent;
				}
				else{
					return $(this).parent().children(".body").value;
				}
			}
		});
	}

	//图表部分
    //从cookie中取出数据
    //生成数据
    var trendGraphData = [
        {
            data: [],//[10.11,10],[10.12,11],[10.13,13],[10.15,15]
            color: '#71c73e'
        }
    ];
    var fillNumberEachDayString = $("#fillNumberEachDay").val();
    var arrfillNumberEachDayString = fillNumberEachDayString.split(":")[1].split("&");
    for(var l = 0; l < arrfillNumberEachDayString.length-1; l++){
        arrfillNumberEachDayString[l] = arrfillNumberEachDayString[l].split("=");
        add = [arrfillNumberEachDayString[l][0],arrfillNumberEachDayString[l][1]];
        trendGraphData[0].data[l] = add;
    }


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
    //从cookie中取出数据
    var fromWhereAllString = $("#fromWhereAll").val();
    var arrFromWhereAllString = fromWhereAllString.split("&");
    var keyValuePairFromWhereAll = new Array;
    for(var i = 0; i < arrFromWhereAllString.length; i++){
        arrFromWhereAllString[i] = arrFromWhereAllString[i].split("=");
        keyValuePairFromWhereAll[arrFromWhereAllString[i][0]] = arrFromWhereAllString[i][1];
    }
    //生成数据
	var sourceGraphData = [
        { label: "二维码200px",  data: keyValuePairFromWhereAll["sqr"] },//sqr
        { label: "二维码400px",  data: keyValuePairFromWhereAll["mqr"] },//mqr
        { label: "二维码800px",  data: keyValuePairFromWhereAll["bqr"] },//bqr
        { label: "人人",  data: keyValuePairFromWhereAll["renren"] },//renren
        { label: "报名吧",  data: keyValuePairFromWhereAll["123bmb"] },//123bmb
		{ label: "cc98",  data: keyValuePairFromWhereAll["cc98"] },//cc98
        { label: "微信",  data: keyValuePairFromWhereAll["wechat"] },//wechat
        { label: "微博",  data: keyValuePairFromWhereAll["weibo"] },//weibo
        { label: "iZJU",  data: keyValuePairFromWhereAll["izju"] },//izju
        { label: "其他",  data: keyValuePairFromWhereAll["other"] },//other
        { label: "直接打开",  data: keyValuePairFromWhereAll["newpage"] },//newpage

	]
    //移除为零的数据
    for(var j = 0; j < sourceGraphData.length; j++){
        if(sourceGraphData[j].data == "0") {//如果来源为零从json数据中移除
            sourceGraphData.splice(j--,1);//移除一个之后指针往回退一个
        }
    }
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
			//if (previousSector != item.seriesIndex) {
				previousSector = item.seriesIndex;
				$('#tooltip').remove();
				var label = item.series.label,
					number = item.datapoint[1][0][1];
					percentage = Math.round(item.datapoint[0]);
					showTooltip(pos.pageX, pos.pageY,  label + '<br />' + number + '个,占<b>' + percentage + '%</b>');
			//}
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
//tableSlector选择页面上需要应用此函数的表格，注意该表格一定要包含tbody
function trBackgroundColor(tableSelector){
	var trTotalNumber = $(tableSelector  + " tr").length;
	for(var i=1;i<trTotalNumber;i=i+2){
		$(tableSelector + " tbody").children().eq(i).css("background","#f7f7f7");
	}
}
function getCookie(objName){//获取指定名称的cookie的值
    var arrStr = document.cookie.split("; ");
    for(var i = 0;i < arrStr.length;i ++){
        var temp = arrStr[i].split("=");
        if(temp[0] == objName) return unescape(temp[1]);
    }
}