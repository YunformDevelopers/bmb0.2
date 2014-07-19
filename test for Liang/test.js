// JavaScript Document


function test()
{
var test=window.prompt("请输入您的姓名");
if(name != null&&name != "")
{
alert(test+"Welcome to Yunform");
}
}

function turnoff(obj)
{
document.getElementById(obj).style.display="none";
}

function turnon(obj)
{
	document.getElementById(obj).style.display="block";
	}
	
function rectangle()
{
	var c=document.getElementById("myCanvas");
	var ctx=c.getContext("2d");
	ctx.rect(20,20,150,100);
	ctx.stroke();
}

function circle()
{
	var c=document.getElementById("myCanvas");
	var cxt=c.getContext("2d");
	cxt.fillStyle="#FF0000";
	cxt.beginPath();
	cxt.arc(70,18,15,0,Math.PI*2,true);
	cxt.closePath();
	cxt.fill();
	}
	
function notice()
{	var test=window.open("notice.html","name","width=580,height=290,border=0");  

}