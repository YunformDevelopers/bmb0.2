<?php
require 'includes/includes.inc.php';
$array=$_POST;
$files=$_FILES;
save_decoration_to_db($array,$files);