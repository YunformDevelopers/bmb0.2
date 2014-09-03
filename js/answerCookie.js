// JavaScript Document
function SetAnswerCookie () {
	var qTotalNumber = $("#form-body li").length;//这是获得form-body里面li的数量，也就是题目的总数
	var formBody = $("#form-body");//获取到form-body元素
	var cookieString = "answerStore=";//先把准备存进cookie里的字符串放在cookieString里,名为answerStore

	for(var i=0;i<qTotalNumber;i++){//这个循环遍历所有题目，并将答案存放到cookie里面
		var qFieldIth= $("#form-body form ").children().eq(i);//获取到#form-body form下的第i个li
	
	
	/*  分情况获取每道题的answer放到CookieString里   */
		
		/*  获取每道题的qType */	
		var qType;
		var typeList = new Array("free-singleline","free-multiline","free-file","free-personalphoto","free-singlechoice","free-multichoice","logic-name","logic-sex","logic-studentID","logic-address","logic-tel","logic-email","logic-class");
		var t;
		for (t in typeList){
			if (qFieldIth.hasClass(typeList[t])) { //判断li是否包含相应的class
				qType = typeList[t];
			}
		}
		/*  针对不同题目的qType采取不同的获取手段 */
		var qBody = qFieldIth.find(".q-body ");
		var qBodyNumber = qBody.find("input").length;
		if(qType == "free-singlechoice"){//单选题
			var answer = qBody.find("input:radio:checked").val();
			if (qBody.find("input:radio:checked").hasClass("note-title")){
				answer += "λ" + qBody.find("input:radio:checked").closest(".note-position").find("input.note").val();//这里是先向上遍历到span.note-position，然后再向下找到input.note的部分，获得其中的值之后合并到answer里面，用λ分隔
				alert(answer);
			}
			cookieString += answer+ "γ"//向cookieString添加答案，末尾加分隔符γ
		}
		else if(qType == "free-multichoice"){//多选题
			var qBodyNoteNumber = qBody.find("input.note").length ;
			//这里需要减去note的input（即“请注明”的输入框）
			 qBody.find("input[type='checkbox']:checked").each(function(){
				var answer = $(this).val() ;
				if ($(this).hasClass("note-title")) {
					answer += "λ" + $(this).closest(".note-position").find("input.note").val();//这里是先向上遍历到span.note-position，然后再向下找到input.note的部分，获得其中的值之后合并到answer里面，用λ分隔
				}
				cookieString += answer+ "γ"//向cookieString添加答案，末尾加分隔符γ
			})				
		}
		else if(qType == "free-singleline"){//单行文本题
			var answer = qBody.find("input.body").val();
			cookieString += answer+ "γ"//向cookieString添加答案，末尾加分隔符γ
		}
		else if(qType == "free-multiline"){//多行文本题
			var answer = qBody.find("textarea.body").val();
			cookieString += answer+ "γ"//向cookieString添加答案，末尾加分隔符γ
		}
		else if(qType == "free-file"){//文件题
			var answer = qBody.find("input.body").val();
			cookieString += "$_FILES-"+answer+ "γ"//向cookieString添加答案，末尾加分隔符γ
		}
		else if(qType == "free-personalphoto"){//照片题
		}
		else if(qType == "logic-tel"){//长短号待完成
			var answer = qBody.find("input.body").val();
			cookieString += answer+ "γ"//向cookieString添加答案，末尾加分隔符γ
		}else if(qType == "logic-sex"){
			var answer = qBody.find("input:radio:checked").val();
			if (qBody.find("input:radio:checked").hasClass("note-title")){
				answer += "λ" + qBody.find("input:radio:checked").closest(".note-position").find("input.note").val();//这里是先向上遍历到span.note-position，然后再向下找到input.note的部分，获得其中的值之后合并到answer里面，用λ分隔
				alert(answer);
			}
			cookieString += answer+ "γ"//向cookieString添加答案，末尾加分隔符γ
		}
		else {
			var answer = qBody.find("input.body").val();
			cookieString += answer+ "γ"//向cookieString添加答案，末尾加分隔符γ
		}
		
		cookieString += "δ"//向cookieString一道题结束的分隔符δ
		

	
	}
	document.cookie = cookieString;
}
function validateForm(){
	/*  1.获取每道题的q-alternative状态  */
		var qAlternative = qFieldIth.find(".q-alternative").attr('name');//获取到#form-body元素里的第i道题的q-alternative 的a里的name
		cookieString += qAlternative ;//向cookieString添加qAlternative
		
		/*  2.获取每道题的q-finished状态放到  */
	
		/*  3.q-finished与q-alternative对照，   */
		
	/*  1.TODO获取每道题逻辑判断是否错误的q-logic状态放到CookieString里，并进行判断   */
	/*  1.获取整张表的form-finished状态放到CookieString里，并进行判断   */


}
function SetFillCookie() {
	var inputNumber =$("#form-body input,#form-body textarea").length - 1;//获得form-body里面input和textarea的总数，去掉最后一个submit的input
	var cookieString = "FillCookie=";
	for(var k=0;k<inputNumber;k++){
		var inputKth= $("#form-body input,#form-body textarea ").eq(k);
		if (inputKth.attr("type")=="radio"||inputKth.attr("type")=="checkbox"){
			if(inputKth.prop("checked")==true){
				answer = "1";
			}
			else {
				answer = "0";
			}
			cookieString += answer + "β";
		}
		else {
			answer = inputKth.val() ;
			cookieString += answer + "β";
		}
	}
	document.cookie = cookieString;
}
function ReFill() {
	var inputNumber =$("#form-body input,#form-body textarea").length - 1;//获得form-body里面input和textarea的总数，去掉最后一个submit的input
	var cookieString = getCookie('FillCookie');
	for(var k=0;k<inputNumber;k++){
		var inputKth= $("#form-body input,#form-body textarea ").eq(k);
		var ReFillArr = cookieString.split('β');
		if (inputKth.attr("type")=="radio"||inputKth.attr("type")=="checkbox"){
			if(ReFillArr[k]=='1'){
				inputKth.prop("checked",true);
			}
			else {
				inputKth.prop("checked",false);
			}
		}
		else {
			inputKth.val(ReFillArr[k]) ;
		}
	}
}
function getCookie(objName){//获取指定名称的cookie的值
	var arrStr = document.cookie.split("; ");
	for(var i = 0;i < arrStr.length;i ++){
		var temp = arrStr[i].split("=");
		if(temp[0] == objName) return unescape(temp[1]);
	}
} 
$(document).ready(function() {
	initValidationEngine();
	ReFill();
});
function initValidationEngine (){
     $("#formID").validationEngine({promptPosition : 'bottomLeft',});
	var qTotalNumber = $("#form-body li").length;//这是获得form-body里面li的数量，也就是题目的总数
	var formBody = $("#form-body");//获取到form-body元素
	for(var i=0;i<qTotalNumber;i++){//这个循环遍历所有题目，并将答案存放到cookie里面
		var qFieldIth= $("#form-body form ").children().eq(i);//获取到#form-body form下的第i个li
		var qAlternative = qFieldIth.find(".q-alternative").attr('name');//获取到#form-body元素里的第i道题的q-alternative 的a里的name
		if (qAlternative == 'required'){
			if (qFieldIth.hasClass("free-multichoice")){
				qFieldIth.find('.q-body input').addClass("validate[minCheckbox[1]]");
				qFieldIth.find('.q-body input').attr('name','q' + i + '-body');
			}
			else {
				qFieldIth.find('.q-body input,.q-body textarea').addClass("validate[required]");
			}
		}
		else ;
	}
}