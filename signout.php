<?php
session_start();

$_SESSION = array();
$_SESSION = empty_session;

session_destroy();

unset($bar['id']);
header("location:/index.php");
//exit();



?>