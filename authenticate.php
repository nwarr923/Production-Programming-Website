<?php

$username;
$password;
$error_message = '';


    if (isset($_POST['email']) && isset($_POST['password'])) 
    {
        $username = $_POST['email'];
        $password = $_POST['password'];
		
			
            $username = filter_var($username, FILTER_SANITIZE_EMAIL);
            $password = filter_var($password, FILTER_SANITIZE_STRING);

            $username = filter_var($username, FILTER_VALIDATE_EMAIL);

			if ($username == FALSE || $password == FALSE)
			{
				$error_message = 'Invalid search.';
			}
		
	}
    else 
    {
        $error_message = 'Please enter a search.';
       
	}

    if ($error_message != '') {
        include('login.php');
        //exit();
	}
	
require_once("Template.php");
require_once("DB.class.php");

$db = new DB();
//var_dump($db);

//var_dump($db->getConnStatus());
if (!$db->getConnStatus()) {
  print "An error has occurred with connection\n";
  exit;
}
//$username = 'someemaile@example.com'; 
//$password = 'abcdefg';

$safeuser = $db->dbEsc($username);
$safepass = $db->dbEsc($password);

$query = "SELECT role.rolename, user.realname" .
         " FROM  user2role, user , role" .
         " WHERE username = '" . $safeuser . "'".
         " AND userpass = '" . $safepass . "'".
         " AND user.id = user2role.userid" .
         " AND role.id = user2role.roleid";


$result = $db->dbCall($query);
if($result != null)
{

    if($result[0]['rolename'] == 'user' || $result[0]['rolename'] == 'admin')
    {
        session_start();

        $_SESSION['authType'] = $result[0]['rolename'];
        $_SESSION['realName'] = $result[0]['realname'];
        //var_dump($_SESSION['authType']);
        //var_dump($_SESSION['realName']);
    }
    else
    {
        include('login.php');
        exit();
    }
}
else
    {
        $error_message = 'Incorrect username or password !';
        include('login.php');
        
        exit();
    }
// Send to home when user has been authenticated
header("location:home.php");
exit();
?>

