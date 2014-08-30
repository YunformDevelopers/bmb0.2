<?php
require_once 'includes/includes.inc.php';
if($_GET['url']){
	make_qrcode($_GET['url']);
}