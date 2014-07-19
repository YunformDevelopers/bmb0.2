function GetCookie()
{
	var Cookie=document.cookie;
	
	return Cookie;
	}
function SetCookie()
{
// document.cookie=key+=+value+;
	var Yunform = document.getElementById("form-body").childNodes;
	
	for(var i=0;i<Yunform.length;i++)
	{//跟据不同的题目li的name定义，把if条件中双引号内的内容进行更换就好。
		if(Yunform.item(i).nodeName == "单行文本")
		{
			var tips = Yunform.item(i).getElementsByTagName("textarea").tagName;
			var context = Yunform.item(i).getElementsByTagName("textarea").value;
			document.cookie += "alpha"+tips+"="+context+";";
			tips = Yunform.item(i).getElementsByTagName("input").tagName;
			context = Yunform.item(i).getElementsByTagName("input").value;
			document.cookie +=tips+"="+context+";";
				}
		if(Yunform.item(i).nodeName == "多行文本")
		{
			var tips = Yunform.item(i).getElementsByTagName("textarea").tagName;
			var context = Yunform.item(i).getElementsByTagName("textarea").value;
			document.cookie += "alpha"+tips+"="+context+";";
			tips = Yunform.item(i).getElementsByClassName("q2-body1").tagName;
			context = Yunform.item(i).getElementsClassName("q2-body1").value;
			document.cookie +=tips+"="+context+";";
			}
		if(Yunform.item(i).nodeName == "单选题")
		{
			var tips = Yunform.item(i).getElementsByTagName("textarea").tagName;
			var context = Yunform.item(i).getElementsByTagName("textarea").value;
			document.cookie += "alpha"+tips+"="+context+";";
			var sublists = Yunform.item(i).getElementByClassName("q-body").childNodes;
			for(var j = 0;j<sublists.length;j+=2)
			{
				var types = sublists.item(j).type;
				var context = sublists.item(j+1).value;
				document.cookie += "beta"+types+"="+context+";";
				}
			}
		if(Yunform.item(i).nodeName == "多选题")
		{
			var tips = Yunform.item(i).getElementsByTagName("textarea").tagName;
			var context = Yunform.item(i).getElementsByTagName("textarea").value;
			document.cookie += "alpha"+tips+"="+context+";";
			var sublists = Yunform.item(i).getElementByClassName("q-body").childNodes;
			for(var j = 0;j<sublists.length;j+=2)
			{
				var types = sublists.item(j).type;
				var context = sublists.item(j+1).value;
				document.cookie += "beta"+types+"="+context+";";
				}
			}
		if(Yunform.item(i).nodeName == "文件")
		{
			var tips = Yunform.item(i).getElementsByTagName("textarea").tagName;
			var context = Yunform.item(i).getElementsByTagName("textarea").value;
			document.cookie += "alpha"+tips+"="+context+";";
			tips = Yunform.item(i).getElementsByTagName("input").tagName;
			context = Yunform.item(i).getElementsByTagName("input").type;
			document.cookie +=tips+"="+context+";";
			}
		if(Yunform.item(i).nodeName == "图片")
		{
			var tips = Yunform.item(i).getElementsByTagName("textarea").tagName;
			var context = Yunform.item(i).getElementsByTagName("textarea").value;
			document.cookie += "alpha"+tips+"="+context+";";
			tips = Yunform.item(i).getElementsByTagName("input").tagName;
			context = Yunform.item(i).getElementsByTagName("input").type;
			document.cookie +=tips+"="+context+";";
			}
		
		}
	
	}