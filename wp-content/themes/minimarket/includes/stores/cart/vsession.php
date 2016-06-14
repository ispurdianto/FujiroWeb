<?php
@session_start();
$virtacart = $_SESSION['virtacart'];
if(!is_object($virtacart)) { $virtacart = $_SESSION['virtacart'] = new virtacart();
}
?>