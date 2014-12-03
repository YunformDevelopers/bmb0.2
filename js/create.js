$(document).ready(function(){
	autoSave (300000);//每隔300s自动保存一次
	innitDOMstringArray();
	innitDragNSort();
	innitClick2Add();
	initPin ();
	initFormConstructField ();//注意要在生成了pin之后再执行该语句
	initEditor ();
	$("#whole-msg-bg").fadeIn(500);
});
//窗口改变大小时执行的函数
$(window).resize(function(){
	initFormConstructField();
	initEditor ();
});
/***************************** create.js的主要过程引用的函数 *****************************/
/***************************** start here *****************************/
//自动保存，参数time单位为毫秒
function autoSave (time){
	var saveInterval; //调度器对象。
	saveInterval = setInterval("SetCookie(); toolSaveAct('#tool-save-container a.tool.save');",time);
	//保存cookie，同时toolSaveAct弹出slidemsg
}
//创建包含DOM的字符串数组，
function innitDOMstringArray(){
	//增加全局变量，因为这个变量经常需要用到
	DOMstringArray = new Array();
	DOMstringArray["personality"] = "<li><div id='q' class='q1 q-field-before preserved-personality logic-name' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'>          <div class='q-title'><textarea type='text' name='q1-title' rows='1' class='title edit changed' >姓名</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><input type='text' name='q1-body1' class='body no-edit'/></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li><li><div id='q' class='q4 q-field-before preserved-personality logic-sex' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'><div class='q-title'><textarea type='text' name='q4-title' rows='1' class='title edit changed' >性别</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><span><input type='radio' class='body no-edit' /><input type='text' name='q4-body3' class='body edit changed' onblur='delOption(this)'  value='男'/></span><span><input type='radio' class='body no-edit' /><input type='text' name='q4-body3' class='body edit changed' onblur='delOption(this)' value='女'/></span><span><input type='radio' class='body no-edit' /><input type='text' name='q4-body3' class='body edit raw' onfocus='rawChangeRadio(this)' value='点击这里添加选项'/></span></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li><li><div id='q' class='q1 q-field-before preserved-personality logic-studentID' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'>          <div class='q-title'><textarea type='text' name='q1-title' rows='1' class='title edit changed' >学号</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><input type='text' name='q1-body1' class='body no-edit'/></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li><li><div id='q' class='q1 q-field-before preserved-personality logic-address' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'>          <div class='q-title'><textarea type='text' name='q1-title' rows='1' class='title edit changed' >住址</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><input type='text' name='q1-body1' class='body no-edit'/></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li><li><div id='q' class='q1 q-field-before preserved-personality logic-tel' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'>          <div class='q-title'><textarea type='text' name='q1-title' rows='1' class='title edit changed' >电话长短号</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><input type='text' name='q1-body1' class='body no-edit'/>（长号：必填）<input type='text' name='q1-body1' class='body no-edit'/>（短号：可不填）</div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li><li><div id='q' class='q1 q-field-before preserved-personality logic-email' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'>          <div class='q-title'><textarea type='text' name='q1-title' rows='1' class='title edit changed' >邮箱</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><input type='text' name='q1-body1' class='body no-edit'/></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li><li><div id='q' class='q1 q-field-before preserved-personality logic-class' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'>          <div class='q-title'><textarea type='text' name='q1-title' rows='1' class='title edit changed' >专业班级</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><input type='text' name='q1-body1' class='body no-edit'/></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li>";
	DOMstringArray["singleline"] = "<li><div id='q' class='q1 q-field-before free-singleline' onMouseOver='showon(this)' onMouseOut='showoff(this)'> <div class='q-number'> <span>Q</span> </div> <div class='q-whole'> <div class='q-title'> <textarea type='text' name='q1-title' rows='1' class='title edit raw' onfocus='rawChange(this)' >请在这里输入题干内容</textarea> </div> <div id='alt' class='q-alternative'> <a onclick='changeState(this)' name='required' >改为选答</a> </div> <div class='q-body'> <input type='text' name='q1-body1' class='body no-edit'/></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li>";
	DOMstringArray["multiline"] = "<li><div id='q' class='q2 q-field-before free-multiline' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'><div class='q-title'><textarea type='text' name='q2-title' rows='1' class='title edit raw' onfocus='rawChange(this)' >请在这里输入题干内容</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><textarea name='q2-body1' class='body no-edit'></textarea></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li>";
	DOMstringArray["file"] = "<li><div id='q' class='q6 q-field-before free-file' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'><div class='q-title'><textarea type='text' name='q6-title' rows='1' class='title edit raw' onfocus='rawChange(this)' >请在这里输入题干内容</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><input type='file' class='body no-edit'/></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li>";
	DOMstringArray["personalphoto"] = "<li><div id='q' class='q5 q-field-before free-personalphoto' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'><div class='q-title'><textarea type='text' name='q5-title' rows='1' class='title edit raw' onfocus='rawChange(this)' >请在这里输入题干内容</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><input type='file' class='body no-edit' /></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li>";
	DOMstringArray["singlechoice"] = "<li><div id='q' class='q4 q-field-before free-singlechoice' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'><div class='q-title'><textarea type='text' name='q4-title' rows='1' class='title edit raw' onfocus='rawChange(this)' >请在这里输入题干内容</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><span><input type='radio' class='body no-edit' /><input type='text' name='q4-body3' class='body edit raw' onfocus='rawChangeRadio(this)' value='点击这里添加选项'/></span></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li>";
	DOMstringArray["multichoice"] = "<li><div id='q' class='q3 q-field-before free-multichoice' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div> <div class='q-whole'><div class='q-title'><textarea type='text' name='q3-title' rows='1' class='title edit raw' onfocus='rawChange(this)' >请在这里输入题干内容</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><span><input type='checkbox'  class='body no-edit'/><input type='text' name='q3-body3' class='body edit raw' onfocus='rawChangeCheckbox(this)' value='点击这里添加选项'/></span></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li>";
}
//初始化drag和sort部分
function innitDragNSort (){
    $("#tool-construct-container li").draggable({
        appendTO: "parent",
        cancel: "a.ui-icon",
        revert: "invalid",
        containment: "body",
        helper: "clone",
        cursor: "move"
    });
    $("#form-construct-field").droppable({
        accept: "#tool-construct-container li",
        activeclass: "ui-state-hover",
        hover: "ui-state-activeclass",
        drop: function (event, ui) {
			//根据drop的题目类型选择append 相应的domstring
            $(this).find("#form-body").append(DOMstringArray[$(ui.draggable).attr("id")]);
			//下面的这些函数的调用有些是因为drag涉及到DOM变化
			addFallback();		
        },

    });
	/*$(".tool-construct-list").sortable({
		connectWith: "#form-body",
	
	
	});*/
    $("#form-body").sortable({
        items: "li",
		axis:"y",
		forcePlaceholderSize: true,
		placeholder: "form-placeholder",
		opacity: 0.8,
		stop: function ( event,ui ) {
			//下面的这些函数的调用有些是因为drag涉及到DOM变化
			qNumberRefresh ();
			initPin ();
		},
		containment: "#form-body",
		scroll:true,
    });
}
//绑定tool-construct点击事件
function innitClick2Add(){
	$("#tool-construct-container .tool-construct-list li.ui-draggable").click(function(){
		$("#form-construct-field #form-body").append(DOMstringArray[$(this).attr("id")]);
		//下面的这些函数的调用有些是因为drag涉及到DOM变化
		addFallback();
	});
}


//初始化pin
function initPin (){
	$("#tool-field").pin({
      containerSelector: "#field-wrapper",
	});
}
//初始化form-construct-field的宽度
function initFormConstructField (){
	var fieldWrapperWidth = $("#field-wrapper").width();
	var toolFieldWidth = $("#tool-field").width();
	var formConstructFieldWidth = fieldWrapperWidth - toolFieldWidth - 230;
	//alert (formConstructFieldWidth);
	$("#form-construct-field").css("width",formConstructFieldWidth);
}
//初始化editor
var editor ;
function initEditor (){
	if(   !( (getBrowserType("IEVersion") && (getBrowserType("IEVersion")<=8)) || getBrowserType("isFF") )   ){//判断是否为IE8一下的浏览器
		var toolbar;
		toolbar = ['title', 'bold', 'italic', 'underline', 'strikethrough', 'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|', 'link', 'image', 'hr', '|', 'indent', 'outdent'];
		
		editor = new Simditor({
			textarea: $('#simditor'),
			placeholder: '',
			tabIndent: false,
			pasteImage: true,
			toolbar: toolbar,
		});
		$(".simditor-toolbar").hide();
		$(".simditor-body").addClass("raw");
		$(".simditor-wrapper .simditor-popover input, .simditor-wrapper .simditor-popover select").attr("onfocus","rawEditor('down')");
		editor.on('focus',function(e){
			rawEditor("down");
		})
		editor.on('blur',function(e){
			rawEditor("up");
		})
	}
	//editor.focus(rawEditor());//添加onfocus事件，调用rawEditor函数
	//editor.blur(rawEditor());
	/*editor.sync();
  	var formIntro = $("#form-intro textarea.edit").val();
	alert(formIntro);*/
}
/***************************** common.js的主要过程引用的函数 *****************************/
/***************************** end here *****************************/


//对于editor focus和blur时高度不同
function rawEditor (command){
	if(command == "down"){
		$(".simditor-toolbar").slideDown(300,function(){//隐藏toolbar
			$(".simditor-body").animate({minHeight:"8em",height:"auto"},300);//增加高度，注意height改为auto
		});
	}
	else if (command == "up"){
		$(".simditor-toolbar").slideUp(300,function(){//显示toolbar
			$(".simditor-body").animate({height:"2em",minHeight:"2em"},300);//减小高度
		});
	}
}
//改变Q-number的值
function qNumberRefresh (){
	$("#form-body").children("li:visible").each(function(index){
		$(this).find(".q-number span").html(index + 1);
	
	});
}
//将那些不允许编辑的input和textarea disable掉
function disableNoEdit (){
	$("#form-body .no-edit").attr("disabled","disabled");
}
/*注意，对于新生成的DOM对象，简单用jQuery选择器是选不到的，因为生成出来时函数本身已经不执行了
一种解决方案是在html语句里面绑定onclick类型的事件，并且把this传进函数里面去*/
function showon(id){
	$id = $(id);
	//$id.parent().parent().find(".qHover").css("border","solid 2px #fff").find("#q-del").hide();
	$id.addClass("qHover");
	$id.css({
		"border":"solid 2px #ccc",
	});
	$id.find("#q-del").show();
}
function showoff(id){
	$id = $(id);
	$id.removeClass("qHover");
	$id.css({
		"border":"solid 2px #fff",
	});//这里颜色注意改变
	$id.find("#q-del").hide();
}
function qDel(id){
	//首先把隐藏的题目li（可能是上一次删除掉的题目，其实就是隐藏了）彻底删除
	delInvisible();
	var $id = $(id);
	$id.parent().parent().slideUp(500, function(){
		qNumberRefresh ();//删除完了记得改变Q-number的值
		slideMsgAct('<p>已删除</p><a onclick="restoreInvisible();">撤销</a><a class="slide-msg-close" onclick="slideMsgAct(\'\', \'close\', \'blue\', \'save\', false)" >X</a>', 'open', 'green', 'success', false );
	});
}
//q-title部分对于raw class的题目是否更改的判断等操作
function rawChange (id){
	var $id = $(id);
	var storeString = $id.val();//将元素的默认值存储下来
	$id.val("");
	$id.change(function(){//如果元素的值发生了改变
		$id.removeClass("raw");
		$id.addClass("changed");
		$id.attr("onfocus","");//停止监听onfocus事件
	});
	$id.blur(function(){
		if ($id.hasClass("raw")) {
			$id.val(storeString);//如果没有改变元素的值，恢复原来的默认值
		}
	});
}
//单选题的选项判断是否更改等操作
function rawChangeRadio (id){
	var afterString = "<span style='display:none' ><input type='radio' class='body no-edit' /><input type='text' name='q4-body3' class='body edit raw' onfocus='rawChangeRadio(this)' value='点击这里添加选项'/></span>";
	rawChangeChoiceCommon (id,afterString);//调用单选多选共同的函数
}
//多选题的选项判断是否更改等操作
function rawChangeCheckbox (id){
	var afterString = "<span style='display:none' ><input type='checkbox' class='body no-edit' /><input type='text' name='q3-body3' class='body edit raw' onfocus='rawChangeCheckbox(this)' value='点击这里添加选项'/></span>";
	rawChangeChoiceCommon (id,afterString);//调用单选多选共同的函数
}
//单选题和多选题选项共同调用的函数
function rawChangeChoiceCommon (id,afterString){
	var $id = $(id);
	var storeString = $id.val();//将元素的默认值存储下来
	$id.val("");

	$id.one("keydown",function(){
		if($id.val()!=null){//如果元素的值发生了改变
			$id.removeClass("raw");
			$id.addClass("changed");
			$id.attr("onblur","delOption(this)");//监听onblur事件，调用delOption函数
			$id.attr("onfocus","");//停止监听onfocus事件
			if($id.parent().parent().find(".raw").length < 1 ){
				$id.parent().after(afterString);//添加一个新的选项
				$id.parent().next().fadeIn(500);
				disableNoEdit();
			}
		}
	});
	$id.blur(function(){
		if ($id.hasClass("raw")) {
			$id.val(storeString);//如果没有改变元素的值，恢复原来的默认值
		}
	});

}
//删除单选和多选中的选项
function delOption (id) {
	$id = $(id);
	if ($id.val()==""){//当选项的值变为null的时候
		$id.parent("span").fadeOut(500,function(){//先fadeOut，然后删除
			$id.parent("span").remove();
		})
	}
}
//以下是为了使q-alternative点击之后改变状态
function changeState(id){
	var $id = $(id);//首先将DOM对象转换为jQuery对象
	if($id.attr('name')=='required'){
		$id.html('改为必答');
		$id.attr('name','alternative');
	}
	else if ($id.attr('name')=='alternative'){
		$id.html('改为选答');
		$id.attr('name','required');		
	}
}
//删除不可见的form-body下面的li元素
function delInvisible (){
	$("#form-body").children("li:hidden").remove();
}
//恢复不可见的form-body下面的li元素
function restoreInvisible (){
	$("#form-body").children("li:hidden").slideDown();
	qNumberRefresh();
	//关掉slideMsg
	slideMsgAct('', 'close', 'blue', 'save', false);
}
//****恢复不可见的选项
//（此函数暂时不使用，保留以待后续）
function restoreInvisibleOption(){
	$("#form-body li .q-body").children("span:hidden").fadeIn(500);
}
//滚动到页面底部
function scrollBottom (){
	$body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');// 这行是 Opera 的补丁, 少了它 Opera 是直接用跳的而且画面闪烁 by willin
	$body.animate({scrollTop: ($(document).height()- $(window).height() - $("#footer").height() )}, 800);//TEST $body.animate({scrollTop: $(document).height()}, 1000);}
}
//当toolsave被点击后执行的函数
function toolSaveAct (id){
	$id = $(id);
	$id.parent().parent().find(".loading-64").show();
	$id.removeClass("save").addClass("uploading");
	SetCookie();//设置cookie
	slideMsgAct( '<p>保存成功！</p><a class="slide-msg-close" onclick="slideMsgAct(\'\', \'close\', \'blue\', \'save\', false)" >X</a>', 'open', 'green', 'success', false, 5000 );
}
//#tool-save-container 里的slide-msg的弹出等
/*
* string content : html语句
* string action : 'close' 'open'
* string bg : 'red' 'blue' 'green' 'unchange'
* string tool : 'save' 'uploading' 'success' 'failure' 'unchange'
* boolean loading : true false
*/
var expireTimeOut;
function slideMsgAct ( content, action, bg, tool, loading, expireTime) {
	//slide出msg
	if (action == 'open') {
		//先将msg收回
		if($('#tool-save-container .slide-msg').css("display")!='none'){
			$('#tool-save-container .slide-msg').animate({
				width:"0px",
			},function(){
				$(this).html('').hide();
				$('#tool-save-container .slide-msg').html(content).show().animate({
					width:"100px",
				});
			});
		}
		else
			//再将msgslide出来
			$('#tool-save-container .slide-msg').html(content).show().animate({
				width:"100px",
			});
			
		//msg expire的时间
		if(expireTime == null){
			expireTime = 20000;
		}
		clearTimeout(expireTimeOut);

		expireTimeOut = setTimeout(function(){
			
			$('#tool-save-container .slide-msg').animate({
				width:"0px",
			},function(){$(this).html('').hide();}) 
			//时间结束后，回归到原来的蓝色保存按钮状态
			switchToolSaveContainerBg ('blue');
			switchToolSaveContainerTool ('save');
			switchToolSaveContainerLoading (false);
		}, expireTime);
		
	}//收回msg
	else if (action == 'close') {
		$('#tool-save-container .slide-msg').animate({
			width:"0px",
		},function(){$(this).html('').hide();});
	}
	else;
	switchToolSaveContainerBg (bg);
	switchToolSaveContainerTool (tool);
	switchToolSaveContainerLoading (loading);
}
//切换tool-save-container 的bg
function switchToolSaveContainerBg (bg) {
	//切换背景
	if ((bg =='red')||(bg =='blue')||(bg =='green')) {
		$('#tool-save-container .bg').removeClass('red').removeClass('green').removeClass('blue');//清除原来的bg
		$('#tool-save-container .bg').addClass(bg);
	}//保持原来背景
	else if (bg == 'unchange'){		
	}
	else;
}
//切换tool-save-container 的tool
function switchToolSaveContainerTool (tool){
	//切换tool
	if((tool == 'save')||( tool == 'uploading')||(tool == 'success')||(tool == 'failure') ){
		$('#tool-save-container .tool').removeClass('save').removeClass('uploading').removeClass('success').removeClass('failure');//清除原来的tool
		$('#tool-save-container .tool').addClass(tool);
		//如果tool不是save的话，暂时取消onclick事件
		if(tool!='save'){
			$('#tool-save-container .tool').attr('onclick','');
		}
		else {
			$('#tool-save-container .tool').attr('onclick','toolSaveAct();');
		}
	}//保持原来tool
	else if (tool == 'unchange') {
	}
	else;
}
function switchToolSaveContainerLoading (loading){
	//改为loading
	if(loading){
		$('#tool-save-container .loading-64').show();
	}//loading 隐藏
	else {
		$('#tool-save-container .loading-64').hide();
	};
}
/*检测浏览器版本*/
function getBrowserType (getType) {
	switch (getType)
	{
	case "IEVersion":
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
	break;
	case "isMobile":
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
	break;
	case "isFF":
		//获取是否为火狐浏览器/返回值为true或false
		var isFF = navigator.userAgent.indexOf("Firefox") > -1;
		return isFF;//返回值为true或false
	break;
	default:
	}
}
function tipDisappear(id){
	$id = $(id);
	$id.parent(".create-tip").slideUp();
	$("#whole-msg-bg").fadeOut(500);
}
function addFallback(){
	//下面的这些函数的调用有些是因为drag涉及到DOM变化
	qNumberRefresh ();
	disableNoEdit ();
	scrollBottom ();
	$("#form-body>li:last-child textarea.title.edit").focus();
	initPin ();		
}