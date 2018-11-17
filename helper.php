<?php

$auth=''; 
$usersName='';

session_start();
if (isset($_SESSION['authType'])){
	$auth = $_SESSION['authType'];
}
if (isset($_SESSION['realName'])){
	$usersName = $_SESSION['realName'];
}

?>