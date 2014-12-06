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
	$("#QR-loading").show();
	$("#QRlink").attr('href','http://qr.liantu.com/api.php?w='+size+'&m='+m+'&text=http://www.123bmb.com/reform.php?id='+formId);
	$("#QRimg").attr('src','http://qr.liantu.com/api.php?w='+size+'&m='+m+'&text=http://www.123bmb.com/reform.php?id='+formId);
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

function initFormFieldHeight (){
	var windowHeight = $(window).height();
	var headerHeight = $("#header").height();
	var createFormStepsHeight = $("#create-form-steps").height();
	//alert(windowHeight);
	var formFieldHeight = windowHeight - headerHeight - createFormStepsHeight-200 ;
	//alert(formConstructFieldHeight);
	$("#form-field").css("height",formFieldHeight);
}

//初始化pin
function initPin (){
	$("#tool-field").pin({
	  containerSelector: "#field-wrapper",
	});
}

function togglePublishStatus (id){
	$id = $(id);
	if($id.parent().find('.publish-status:hidden').hasClass('on')){
		$id.parent().find('.publish-status.off').hide();$id.parent().find('.publish-status.on').show();
	}
	else{
		$id.parent().find('.publish-status.on').hide();$id.parent().find('.publish-status.off').show();
		}
}
