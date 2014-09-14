<?php
require 'includes/includes.inc.php';
$color = getMajorColor('images/3.jpg');
echo $color;
echo '<br/>';
$color = getContrastColor($color);
echo $color;

?>