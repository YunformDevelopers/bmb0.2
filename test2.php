<?php
require 'includes/includes.inc.php';
?>
<script>
	function get_get(url){
		querystr = url.split("?");
		if(querystr[1]){
			GETs = querystr[1].split("&");
			GET =new Array();
			for(i=0;i<GETs.length;i++){
				tmp_arr = GETs[i].split("=");
				key=tmp_arr[0];
				GET[key] = tmp_arr[1];
			}
		}
		return GET['id'];
	};
	var a1=get_get("www.baidu.com?id=2&t2=2"); 
	alert(window.location.href);
	</script>