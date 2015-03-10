$(document).ready(function(){
	initFormConstructFieldWidth();
	initPin ();
	zclip();
	fillQR(200);
});


$(window).resize(function(){
	initFormConstructFieldWidth();
	initPin ();
	zclip();
});


function fillLink(linkType){
	if(linkType =='short'){
		$('.link-container').val($('#php-short-link').val());
	}
	else if(linkType =='long'){
		$('.link-container').val($('#php-long-link').val());
	}
	
}
function fillQR(size){
	var m = Math.round(size/10);
	var formId = $("#formIdContainer").val();
    var source = "sqr";
    switch (size) {
        case 200 :
            source = "sqr";
            break;
        case 400 :
            source = "mqr";
            break;
        case 800 :
            source = "bqr";
            break;
        default :
            source = "sqr";
    }
	$("#QR-loading").show();
	$(".image-holder img.link-container").hide();
	$("#QRlink").attr('href','http://qr.liantu.com/api.php?w='+size+'&m='+m+'&text=http://www.123bmb.com/reform.php?id='+formId+'&source='+source);
	$("#QRimg").attr('src','http://qr.liantu.com/api.php?w='+size+'&m='+m+'&text=http://www.123bmb.com/reform.php?id='+formId+'&source='+source);
}
function zclip (){
	$("#outer-link-copy").zclip({
		path:'js/ZeroClipboard.swf',
		copy:function(){
			return $(".link-container").val();
		}
	});
	$("#embed-copy").zclip({
		path:'js/ZeroClipboard.swf',
		copy:function(){
			return $(".code-container.embed").children().html();
		}
	});
}
function initFormConstructFieldWidth (){
	var fieldWrapperWidth = $("#field-wrapper").width();
	var toolFieldWidth = $("#tool-field").width();
	var formConstructFieldWidth = fieldWrapperWidth - toolFieldWidth - 230;
	//alert (formConstructFieldWidth);
	$("#form-construct-field").css("width",formConstructFieldWidth);
}

//初始化pin
function initPin (){
	$("#tool-field").pin({
	  containerSelector: "#field-wrapper"
	});
}
//切换发布状态
function togglePublishStatus(id,phpid){
	$id = $(id);
	if($id.parent().find('.publish-status:hidden').hasClass('on')){
		$id.parent().find('.publish-status.off').hide();$id.parent().find('.publish-status.on').show();//执行上架操作
		$("#toggle-publish-status-btn").val("暂不上架");
		$.ajax({
			type:'GET',
			url:'stateajax.php?data='+phpid+'&action=on',
			success:function(response){
			}
		});
	}else{
		$id.parent().find('.publish-status.on').hide();$id.parent().find('.publish-status.off').show();//执行下架操作
		$("#toggle-publish-status-btn").val("现在上架");
		$.ajax({
			type:'GET',
			url:'stateajax.php?data='+phpid+'&action=off',
			success:function(response){
			}
		})
	}
}
