<?php 
/*
virtacart 
Description   : Toko Online Wordpress
Version       : 1.0.0
Author        : Virtarich
Author URI    : http://theme-id.com
*/
header('Content-type: text/html; charset=utf-8');
require_once('virtacart.php');
require_once('vsession.php');
$virtacart->display_cart();
?>