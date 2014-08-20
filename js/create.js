$(document).ready(function(){
	

	autoSave (50000);//每隔50s自动保存一次
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
            if ($(ui.draggable).attr("id") == "personality") {
                $(this)
                    .find("#form-body")
                    .append("<li><div id='q' class='q1 q-field-before preserved-personality logic-name' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'>          <div class='q-title'><textarea type='text' name='q1-title' rows='1' class='title edit changed' >姓名</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><input type='text' name='q1-body1' class='body no-edit'/></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li><li><div id='q' class='q4 q-field-before preserved-personality logic-sex' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'><div class='q-title'><textarea type='text' name='q4-title' rows='1' class='title edit changed' >性别</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><span><input type='radio' class='body no-edit' /><input type='text' name='q4-body3' class='body edit changed' onblur='delOption(this)'  value='男'/></span><span><input type='radio' class='body no-edit' /><input type='text' name='q4-body3' class='body edit changed' onblur='delOption(this)' value='女'/></span><span><input type='radio' class='body no-edit' /><input type='text' name='q4-body3' class='body edit raw' onfocus='rawChangeRadio(this)' value='点击这里添加选项'/></span></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li><li><div id='q' class='q1 q-field-before preserved-personality logic-studentID' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'>          <div class='q-title'><textarea type='text' name='q1-title' rows='1' class='title edit changed' >学号</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><input type='text' name='q1-body1' class='body no-edit'/></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li><li><div id='q' class='q1 q-field-before preserved-personality logic-address' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'>          <div class='q-title'><textarea type='text' name='q1-title' rows='1' class='title edit changed' >住址</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><input type='text' name='q1-body1' class='body no-edit'/></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li><li><div id='q' class='q1 q-field-before preserved-personality logic-tel' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'>          <div class='q-title'><textarea type='text' name='q1-title' rows='1' class='title edit changed' >电话长短号</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><input type='text' name='q1-body1' class='body no-edit'/>（长号：必填）<input type='text' name='q1-body1' class='body no-edit'/>（短号：可不填）</div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li><li><div id='q' class='q1 q-field-before preserved-personality logic-email' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'>          <div class='q-title'><textarea type='text' name='q1-title' rows='1' class='title edit changed' >邮箱</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><input type='text' name='q1-body1' class='body no-edit'/></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li><li><div id='q' class='q1 q-field-before preserved-personality logic-class' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'>          <div class='q-title'><textarea type='text' name='q1-title' rows='1' class='title edit changed' >专业班级</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><input type='text' name='q1-body1' class='body no-edit'/></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li>")
            }
            else if ($(ui.draggable).attr("id") == "singleline") {
                $(this)
                    .find("#form-body")
                    .append("<li><div id='q' class='q1 q-field-before free-singleline' onMouseOver='showon(this)' onMouseOut='showoff(this)'> <div class='q-number'> <span>Q</span> </div> <div class='q-whole'> <div class='q-title'> <textarea type='text' name='q1-title' rows='1' class='title edit raw' onfocus='rawChange(this)' >请在这里输入题干内容</textarea> </div> <div id='alt' class='q-alternative'> <a onclick='changeState(this)' name='required' >改为选答</a> </div> <div class='q-body'> <input type='text' name='q1-body1' class='body no-edit'/></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li>")
            }
            else if ($(ui.draggable).attr("id") == "multiline") {
                $(this)
                    .find("#form-body")
                    .append("<li><div id='q' class='q2 q-field-before free-multiline' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'><div class='q-title'><textarea type='text' name='q2-title' rows='1' class='title edit raw' onfocus='rawChange(this)' >请在这里输入题干内容</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><textarea name='q2-body1' class='body no-edit'></textarea></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li>")
            }
            else if ($(ui.draggable).attr("id") == "file") {
                $(this)
                    .find("#form-body")
                    .append("<li><div id='q' class='q6 q-field-before free-file' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'><div class='q-title'><textarea type='text' name='q6-title' rows='1' class='title edit raw' onfocus='rawChange(this)' >请在这里输入题干内容</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><input type='file' class='body no-edit'/></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li>")
            }
            else if ($(ui.draggable).attr("id") == "personalphoto") {
                $(this)
                    .find("#form-body")
                    .append("<li><div id='q' class='q5 q-field-before free-personalphoto' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'><div class='q-title'><textarea type='text' name='q5-title' rows='1' class='title edit raw' onfocus='rawChange(this)' >请在这里输入题干内容</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><input type='file' class='body no-edit' /></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li>")
            }
            else if ($(ui.draggable).attr("id") == "singlechoice") {
                $(this)
                    .find("#form-body")
                    .append("<li><div id='q' class='q4 q-field-before free-singlechoice' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'><div class='q-title'><textarea type='text' name='q4-title' rows='1' class='title edit raw' onfocus='rawChange(this)' >请在这里输入题干内容</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><span><input type='radio' class='body no-edit' /><input type='text' name='q4-body3' class='body edit raw' onfocus='rawChangeRadio(this)' value='点击这里添加选项'/></span></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li>")
            }
            else if ($(ui.draggable).attr("id") == "multichoice") {
                $(this)
                    .find("#form-body")
                    .append("<li><div id='q' class='q3 q-field-before free-multichoice' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div> <div class='q-whole'><div class='q-title'><textarea type='text' name='q3-title' rows='1' class='title edit raw' onfocus='rawChange(this)' >请在这里输入题干内容</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><span><input type='checkbox'  class='body no-edit'/><input type='text' name='q3-body3' class='body edit raw' onfocus='rawChangeCheckbox(this)' value='点击这里添加选项'/></span></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li>")            }
            else if ($(ui.draggable).attr("id") == "rader") {
                $(this)
                    .find("#form-body")
                    .append(q1.clone())

            }
			//下面的这些函数的调用有些是因为drag涉及到DOM变化
			qNumberRefresh ();
			disableNoEdit ();
			scrollBottom ();
			$("#form-body>li:last-child textarea.title.edit").focus();
			initPin ();			
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
		containment: "#tool-construct-container",
		
    });
	
	
	
	initPin ();
	initFormConstructField ();//注意要在生成了pin之后再执行该语句
	initEditor ();
	/*var editor = new Quill('#quill-editor',{
		modules: {
			'authorship': { authorId: 'galadriel', enabled: true },
			'multi-cursor': true,
			'toolbar': { container: '#quill-toolbar' },
			'link-tooltip': true
		},
		theme: 'snow'
		
		
	});
	editor.addModule('toolbar', { container: '#quill-toolbar' });*/
	
});
//窗口改变大小时执行的函数
$(window).resize(function(){
	initFormConstructField();
	initEditor ();
});
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
	var $id = $(id);
	$id.parent().parent().slideUp(500, function(){
	qNumberRefresh ();//删除完了记得改变Q-number的值
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
//初始化form-construct-field的宽度
function initFormConstructField (){
	var fieldWrapperWidth = $("#field-wrapper").width();
	var toolFieldWidth = $("#tool-field").width();
	var formConstructFieldWidth = fieldWrapperWidth - toolFieldWidth - 230;
	//alert (formConstructFieldWidth);
	$("#form-construct-field").css("width",formConstructFieldWidth);
}
//初始化pin
function initPin (){
	$("#tool-field").pin({
      containerSelector: "#field-wrapper",
	});
}
//初始化editor
/*function initEditor (){
	KindEditor.ready(function(K) {
		K.each({
			'plug-align' : {
				name : '对齐方式',
				method : {
					'justifyleft' : '左对齐',
					'justifycenter' : '居中对齐',
					'justifyright' : '右对齐'
				}
			},
			'plug-order' : {
				name : '编号',
				method : {
					'insertorderedlist' : '数字编号',
					'insertunorderedlist' : '项目编号'
				}
			},
			'plug-indent' : {
				name : '缩进',
				method : {
					'indent' : '向右缩进',
					'outdent' : '向左缩进'
				}
			}
		},function( pluginName, pluginData ){
			var lang = {};
			lang[pluginName] = pluginData.name;
			KindEditor.lang( lang );
			KindEditor.plugin( pluginName, function(K) {
				var self = this;
				self.clickToolbar( pluginName, function() {
					var menu = self.createMenu({
							name : pluginName,
							width : pluginData.width || 100
						});
					K.each( pluginData.method, function( i, v ){
						menu.addItem({
							title : v,
							checked : false,
							iconClass : pluginName+'-'+i,
							click : function() {
								self.exec(i).hideMenu();
							}
						});
					})
				});
			});
		});
		K.create('#simditor', {
			themeType : 'qq',
			width : '100%',
			minHeight : '2em',
			items : [
				'bold','italic','underline','fontname','fontsize','forecolor','hilitecolor','plug-align','plug-order','plug-indent','link'
			],
			afterCreate : function(){
				$(".ke-toolbar").hide();
				$(".ke-edit").addClass("raw").addClass("title").addClass("edit");
				$(".ke-edit").attr("onfocus","rawChange(this)").css("overflow","hidden");
				$("iframe.ke-edit-iframe").attr("name","ke-edit-iframe");
			} ,
			afterFocus : function(){
				$(".ke-toolbar").slideDown(300,function(){//隐藏toolbar
					$(".ke-edit-iframe").contents().find(".ke-content").css({
						"min-height":"8em",
						"height":"auto"
						});//增加高度，注意height改为auto
					$(".ke-edit-iframe ").css("min-height","8em").css("height","auto");
					$(" .ke-edit").animate({minHeight:"8em",height:"8em"},500);
					
				});
			} ,
			afterBlur : function(){
				$(".ke-toolbar").slideUp(300,function(){//隐藏toolbar
					$(" .ke-edit").animate({minHeight:"2em",height:"2em"},500);
					$(".ke-edit-iframe").contents().find(".ke-content").css({
						"min-height":"2em",
						"height":"2em"
						});//增加高度，注意height改为auto
					$(".ke-edit-iframe ").css("min-height","2em").css("height","2em");
				});
			},
		});
	});

}*/
//初始化editor
var editor ;
function initEditor (){
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
	//editor.focus(rawEditor());//添加onfocus事件，调用rawEditor函数
	//editor.blur(rawEditor());
	/*editor.sync();
  	var formIntro = $("#form-intro textarea.edit").val();
	alert(formIntro);*/
}
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
//滚动到页面底部
function scrollBottom (){
	$body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');// 这行是 Opera 的补丁, 少了它 Opera 是直接用跳的而且画面闪烁 by willin
	$body.animate({scrollTop: $(document).height()}, 1000);
}
//当toolsave被点击后执行的函数
function toolSaveAct (id){
	$id = $(id);
	SetCookie();//设置cookie
	$id.parent().parent().find(".loading-64").show();
	$id.removeClass("save").addClass("uploading");
	
}
//自动保存，参数time单位为毫秒
function autoSave (time){
	var saveInterval; //调度器对象。
	saveInterval = setInterval("SetCookie()",time);

}
	

