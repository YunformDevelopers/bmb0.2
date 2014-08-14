$(document).ready(function(){
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
                    .append("<li><div id='q' class='q1 q-field-before preserved-personality' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'>          <div class='q-title'><textarea type='text' name='q1-title' rows='1' class='title edit raw' onfocus='rawChange(this)' >姓名</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState(this)' name='required' >改为选答</a></div><div class='q-body'><input type='text' name='q1-body1' class='body no-edit'/></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li>")
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
			
			
			qNumberRefresh ();
			disableNoEdit ();
			
			
			
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
			qNumberRefresh ();
		
		},
		
    });

	
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
  id.style.border="solid 2px #CCC";
  id.children[2].style.display = "block";
}
function showoff(id){
  id.style.border = "solid 2px rgba(255,255,255,0)";
  id.children[2].style.display = "none";
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

	$id.one("change",function(){
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
		$id.parent().fadeOut(500,function(){//先fadeOut，然后删除
			$id.parent().remove();
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

	

	

