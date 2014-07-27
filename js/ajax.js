// JavaScript Document
function readyAJAX()
{
	try
	{
		return new XMLHttpRequest();
		}
	catch(e)
	{
		try
		{
			return new ActiveXObject("Msxml2.XMLHTTP");
			}
		catch(e)
		{
			try
			{
				return new ActiveXObject("Microsoft.XMLHTTP");
				}
			catch(e)
			{
				return "A newer browser is needed";
				}
			}
		}
	}