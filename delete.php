<?php
include 'includes/includes.inc.php';
connect();
delete('question','form_id="'.$_GET['id'].'"');
do_js_link('personal.php');