<?php  
     setcookie('srtp-username','',time()-1);
     setcookie('srtp-password','',time()-1);
	 header("location:index.php");
?>