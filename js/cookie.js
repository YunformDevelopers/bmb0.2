function GetCookie()
{
	var Cookie=document.cookie;
	
	return Cookie;
	}
//提交前先存cookie，并进行判断
function createProceed(action){
	if(SetCookie()){
		window.location.href='formaction.php?action=' + action;
	}
}
//若通过验证，则返回true，反之返回false
function SetCookie () {
	delInvisible ();
	var qTotalNumber = $("#form-body").children("li").length;//这是获得form-body里面li的数量，也就是题目的总数
	var formBody = $("#form-body");//获取到form-body元素
	var cookieString = "qStore=";//先把准备存进cookie里的字符串放在cookieString里,名为qStore
	
	/*  1.获取formTitle并放到cookieString里   */
	if(!isChanged($("#form-title input.edit"))){
		alert("未填写报名表名字");
		return false;
		}
	var formTitle = valAfterChanged($("#form-title input.edit"));
	cookieString += formTitle + "$$$tit_end";//向cookieString添加报名表的title，末尾加分隔符ζ
	
	/*  2.获取formIntro并放到cookieString里   */
    if(editor){//如果editor有定义，则需要先将其中的值存入特性textarea里的value中
		editor.sync();
	}
	var formIntro = valAfterChanged($("#form-intro textarea.edit"));
	cookieString += formIntro + "$$$int_end";//向cookieString添加报名表的intro，末尾加分隔符η

	for(var i=0;i<qTotalNumber;i++){//这个循环遍历所有题目，并将内容存放到cookie里面
		var qFieldIth= $("#form-body ").children().eq(i);//获取到#form-body元素里的第i个li
	/*  3.获取qTitle并放到cookieString里   */
		if(!isChanged(qFieldIth.find(".q-title textarea"))){
			alert("未填写题目的标题");
			return false;
		}
		var qTitle = valAfterChanged(qFieldIth.find(".q-title textarea"))//获取到#form-body元素里的第i道题的q-title 的textarea里的内容(注意不能用html()获取！！！)
		//qTitle = escape(qTitle);
		qTitle = qTitle;//escape转义（可以去除空格）
		cookieString += qTitle + "$$$quetit_end";//向cookieString添加题目的title，末尾加分隔符α
		
		
	/*  4.分情况获取qBody并放到cookieString里   */	
		var qTypeIth = qFieldIth.children().eq(0);//获取到#form-body元素里的第i个li下的div
			var qType;
			var typeList = new Array("free-singleline","free-multiline","free-file","free-personalphoto","free-singlechoice","free-multichoice","logic-name","logic-sex","logic-studentID","logic-address","logic-tel","logic-email","logic-class");
			var t;
			for (t in typeList){
				if (qTypeIth.hasClass(typeList[t])) {
					qType = typeList[t];
				}
			}
		cookieString += qType+ "$$$quetyp_end";//向cookieString添加题目的type，末尾加分隔符β
		
		
		if(qType == "free-singlechoice"||qType == "free-multichoice"||qType == "logic-sex"){//判断是否为单选或多选这两种有多个q-body的题型
			var qBodyNumber = (qFieldIth.find(".q-body input.body.edit").length) - 1;//这里需要减去一（最后一个选项不要，这可能改变）
				for (var j=0 ; j < qBodyNumber ; j++){
					var qBodyJth = qFieldIth.find(".q-body").children().eq(j).find("input.body.edit");
					qBody = qBodyJth.val();
					//qBody = escape(qBody);
					qBody = qBody;//escape转义（可以去除空格）
					cookieString += qBody+ "$$$quebod_end"//向cookieString添加题目的body，末尾加分隔符γ
				}
		}
		else {//另一种情况则是没有q-body
			cookieString += "$$$quebod_end" //向cookieString添加q-body结束的分隔符γ
		}
		
	/*  5.获取qAlternative并放到cookieString里   */	
		var qAlternative = qFieldIth.find(".q-alternative a").attr('name');//获取到#form-body元素里的第i道题的q-alternative 的a里的name
		cookieString += qAlternative ;//向cookieString添加qAlternative
	
		cookieString += "$$$que_end";//向cookieString添加题目结束的分隔符δ
		//alert(cookieString);
	

	
	}
	cookieString +="$$$que_all";//向cookieString添加全部结束的分隔符θ
	/*  6.获取formTip并放到cookieString里   */
	var formTip = valAfterChanged($("#form-tip textarea.edit"));
	cookieString += formTip;//向cookieString添加报名表的末尾tip，末尾加分隔符
	document.cookie = cookieString;
	return true;
}
function lengthValidate(title){
	
}
//验证是否更改
function isChanged(id){
	$id = $(id);
	if($id.hasClass('changed')){
		return true;
	}
	else {
		return false;
	}
}
//如果更改过，返回val；反之返回空
function valAfterChanged(input){
	$input = $(input);
	if(isChanged($input)){
		return $input.val();
	}
	else {
		return '';
	}
}
