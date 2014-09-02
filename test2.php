<?php
require 'includes/includes.inc.php';
date_default_timezone_set("Asia/Shanghai");
$result=strtotime(date("Y-m-d h:i:s"));
echo $result;