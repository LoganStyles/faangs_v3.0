<?php

ob_start();
require_once("cons.php");
require_once("function.php");
require_once("ses.php");

$user = $_SESSION['username'];
$sql="delete from online where username='$user'";
mysql_query($sql);
$_SESSION = array();


if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}

session_destroy();
header('location:../admin.php');
ob_end_flush();


		
