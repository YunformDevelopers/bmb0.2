function GetCookie()
{
	var Cookie=document.cookie;
	
	return Cookie;
	}
function SetCookie () {
	var qTotalNumber = $("#form-body li").length;//这是获得form-body里面li的数量，也就是题目的总数
	var formBody = $("#form-body");//获取到form-body元素
	var cookieString = "qStore=";//先把准备存进cookie里的字符串放在cookieString里,名为qStore
	
	/*  1.获取formTitle并放到cookieString里   */
	var formTitle = $("#form-title input.edit").val();
	cookieString += formTitle + "ζ";//向cookieString添加报名表的title，末尾加分隔符
	
	/*  2.获取formIntro并放到cookieString里   */
	var formIntro = $("#form-intro textarea.edit").val();
	cookieString += formIntro + "η";//向cookieString添加报名表的intro，末尾加分隔符
	
	cookieString += formTitle + "α";//向cookieString添加题目的title，末尾加分隔符
	for(var i=0;i<qTotalNumber;i++){//这个循环遍历所有题目，并将内容存放到cookie里面
		var qFieldIth= $("#form-body ").children().eq(i);//获取到#form-body元素里的第i个li
	/*  3.获取qTitle并放到cookieString里   */
		var qTitle = qFieldIth.find(".q-title textarea").val()//获取到#form-body元素里的第i道题的q-title 的textarea里的内容(注意不能用html()获取！！！)
		//qTitle = escape(qTitle);
		qTitle = qTitle;//escape转义（可以去除空格）
		cookieString += qTitle + "α";//向cookieString添加题目的title，末尾加分隔符
		
		
	/*  4.分情况获取qBody并放到cookieString里   */	
		var qTypeIth = qFieldIth.children().eq(0);//获取到#form-body元素里的第i个li下的div
			var qType;
			var typeList = new Array("free-singleline","free-multiline","free-file","free-personalphoto","free-singlechoice","free-multichoice");
			var t;
			for (t in typeList){
				if (qTypeIth.hasClass(typeList[t])) {
					qType = typeList[t];
				}
			}
		cookieString += qType+ "β";//向cookieString添加题目的type，末尾加分隔符
		
		
		if(qType == "free-singlechoice"||qType == "free-multichoice"){//判断是否为单选或多选这两种有多个q-body的题型
			var qBodyNumber = (qFieldIth.find(".q-body input.body").length) - 1;//这里需要减去一（最后一个选项不要，这可能改变）
				for (var j=0 ; j < qBodyNumber ; j++){
					var qBodyJth = qFieldIth.find(".q-body").children().eq(2*j+1);
					qBody = qBodyJth.val();
					//qBody = escape(qBody);
					qBody = qBody;//escape转义（可以去除空格）
					cookieString += qBody+ "γ"//向cookieString添加题目的body，末尾加分隔符
				}
		}
		else {//另一种情况则是没有q-body
			cookieString += "γ" //向cookieString添加q-body结束的分隔符
		}
		
	/*  5.获取qAlternative并放到cookieString里   */	
		var qAlternative = qFieldIth.find(".q-alternative a").attr('name');//获取到#form-body元素里的第i道题的q-alternative 的a里的name
		cookieString += qAlternative ;//向cookieString添加qAlternative
	
		cookieString += "δ";//向cookieString添加题目结束的分隔符
		//alert(cookieString);
	/*  6.获取formTip并放到cookieString里   */
	var formTip = $("#form-tip textarea.edit").val();
	cookieString += formTip + "θ";//向cookieString添加报名表的末尾tip，末尾加分隔符

	
	}
	document.cookie = cookieString;

}