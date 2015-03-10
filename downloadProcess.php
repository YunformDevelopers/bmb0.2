<?php
/**
 * Created by PhpStorm.
 * User: ZeroLu
 * Date: 2015/3/5
 * Time: 1:22
 */
$file = $_GET['file'];
header ("Content-type: octet/stream");
header ("Content-disposition: attachment; filename=".$file.";");
header("Content-Length: ".filesize($file));
readfile($file);
exit;