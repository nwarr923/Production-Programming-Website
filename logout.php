<?php
session_start();
foreach($_SESSION as $sesVar)
{
    $sesVar = "";
}
$_SESSION = array();

session_unset();
session_destroy();

header("location:home.php");
exit();
?>