<?php

$auth=''; 
$usersName='';

session_start();
if (isset($_SESSION['authType'])){
	$auth = $_SESSION['authType'][0];//If authType is user and admin, this will only be set to admin
									 //If only a user, this will be set to user
									 
}
if (isset($_SESSION['realName'])){
	$usersName = $_SESSION['realName'];
}

?>