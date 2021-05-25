<?php
session_start();
$_SESSION = array();
header("location: ../../admin/admin_page.php");
?>