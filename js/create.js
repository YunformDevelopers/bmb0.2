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
                    .append("<li><div id='q' class='q1 q-field-before preserved-personality' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'>          <div class='q-title'><textarea type='text' name='q1-title' rows='1' class='title edit' >姓名</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState()' name='required' >改为选答</a></div><div class='q-body'><input type='text' name='q1-body1' class='body no-edit'/></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li>")
            }
            else if ($(ui.draggable).attr("id") == "singleline") {
                $(this)
                    .find("#form-body")
                    .append("<li><div id='q' class='q1 q-field-before free-singleline' onMouseOver='showon(this)' onMouseOut='showoff(this)'> <div class='q-number'> <span>Q</span> </div> <div class='q-whole'> <div class='q-title'> <textarea type='text' name='q1-title' rows='1' class='title edit' >姓名</textarea> </div> <div id='alt' class='q-alternative'> <a onclick='changeState()' name='required' >改为选答</a> </div> <div class='q-body'> <input type='text' name='q1-body1' class='body no-edit'/></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li>")
            }
            else if ($(ui.draggable).attr("id") == "multiline") {
                $(this)
                    .find("#form-body")
                    .append("<li><div id='q' class='q2 q-field-before free-multiline' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'><div class='q-title'><textarea type='text' name='q2-title' rows='1' class='title edit' >请问你的理想是什么？</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState()' name='required' >改为选答</a></div><div class='q-body'><textarea name='q2-body1' class='body no-edit'></textarea></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li>")
            }
            else if ($(ui.draggable).attr("id") == "file") {
                $(this)
                    .find("#form-body")
                    .append("<li><div id='q' class='q6 q-field-before free-file' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'><div class='q-title'><textarea type='text' name='q6-title' rows='1' class='title edit' >请上传你的个人作品</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState()' name='required' >改为选答</a></div><div class='q-body'><input type='file' /></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li>")
            }
            else if ($(ui.draggable).attr("id") == "personalphoto") {
                $(this)
                    .find("#form-body")
                    .append("<li><div id='q' class='q5 q-field-before free-personalphoto' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'><div class='q-title'><textarea type='text' name='q5-title' rows='1' class='title edit' >请上交你的个人照片</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState()' name='required' >改为选答</a></div><div class='q-body'><input type='file' /></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li>")
            }
            else if ($(ui.draggable).attr("id") == "singlechoice") {
                $(this)
                    .find("#form-body")
                    .append("<li><div id='q' class='q4 q-field-before free-singlechoice' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div><div class='q-whole'><div class='q-title'><textarea type='text' name='q4-title' rows='1' class='title edit' >请问年级是？</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState()' name='required' >改为选答</a></div><div class='q-body'><input type='radio' /><input type='text' name='q4-body1' class='body edit' value='大一'/><input type='radio' /><input type='text' name='q4-body2' class='body edit' value='大二'/><input type='radio' /><input type='text' name='q4-body3' class='body edit' value='大三'/><br /><input type='radio' /><input type='text' name='q4-body3' class='body edit' value='点击这里添加选项'/></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li>")
            }
            else if ($(ui.draggable).attr("id") == "multichoice") {
                $(this)
                    .find("#form-body")
                    .append("<li><div id='q' class='q3 q-field-before free-multichoice' onMouseOver='showon(this)' onMouseOut='showoff(this)'><div class='q-number'><span>Q</span></div> <div class='q-whole'><div class='q-title'><textarea type='text' name='q3-title' rows='1' class='title edit' >请问你的志愿是哪几个？</textarea></div><div id='alt' class='q-alternative'><a onclick='changeState()' name='required' >改为选答</a></div><div class='q-body'><input type='checkbox' /><input type='text' name='q3-body1' class='body edit' value='项目部'/><input type='checkbox' /><input type='text' name='q3-body2' class='body edit' value='外联部'/><input type='checkbox' /><input type='text' name='q3-body3' class='body edit' value='技术部'/><br /><input type='checkbox' /><input type='text' name='q3-body3' class='body edit' value='点击这里添加选项'/></div></div><a href='javascript:;' id='q-del' style='display:none;' class='q-del' title='删除' onclick='qDel(this)'></a></div></li>")            }
            else if ($(ui.draggable).attr("id") == "rader") {
                $(this)
                    .find("#form-body")
                    .append(q1.clone())

            }
			
			/*注意，对于新生成的DOM对象，简单用jQuery选择器是选不到的，因为生成出来时函数本身已经不执行了
			一种解决方案是在html语句里面绑定onclick类型的事件,并且注意这时候调用的函数最好使用纯js而不是jQuery，以防出现奇怪的问题
			一种是像现在这里把函数放在生成DOM对象后执行的函数里，这样就能够把相应函数及事件绑定到对应对象了*/
			
			
			//以下是为了使q-alternative点击之后改变状态
			$('#form-body .q-alternative a ').click(function(){
				if($(this).attr('name')=='required'){
					$(this).html('改为必答');
					$(this).attr('name','alternative');
				}
				else if ($(this).attr('name')=='alternative'){
					$(this).html('改为选答');
					$(this).attr('name','required');		
				}
			});
			
			
        }
    });
    $("#form-body").sortable({
        items: "li",
		axis:"y"
    });

	
});
function showon(id){
  id.style.border="solid 2px #CCC";
  id.children[2].style.display = "block";
}
function showoff(id){
  id.style.border = "solid 2px rgba(255,255,255,0)";
  id.children[2].style.display = "none";
}
/* TODO 问题的删除添加动画 */
function qDel(id){
	id.parentNode.style.display = "none";
}

function changeState(){
}


	

	

