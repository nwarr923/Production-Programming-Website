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
        exit();
	}
	
require_once("Template.php");

$data = array("username" => $username,"password" => $password);

$dataJson =  json_encode($data);

$postString = "user=YOU&password=SOMEPASS&data=" . urlencode($dataJson);

$contentLength = strlen($postString);

$header = array(
  'Content-Type: application/x-www-form-urlencoded',
  'Content-Length: ' . $contentLength
);

$url = "http://cnmtsrv2.uwsp.edu/~aaufd703/sprint2Master/authService.php";

$ch = curl_init();

curl_setopt($ch,
    CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch,
    CURLOPT_POSTFIELDS, $postString);
curl_setopt($ch,
    CURLOPT_HTTPHEADER, $header);


curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);

$result = curl_exec($ch); 

curl_close($ch);

$result = json_decode($result);

var_dump($result);

if($result != null)
{
    if($result[0]['rolename'] == 'user')
    {
        session_start();
        $_SESSION['authType'] = 'user';
        $_SESSION['realName'] = $result[0]['realname'];
        //var_dump($_SESSION['authType']);
        //var_dump($_SESSION['realName']);
    }
    else if($result[0]['rolename'] == 'user'  && $result[1]['rolename'] == 'admin') //CORRECT INDEXES ?????
    {
        session_start();
        $_SESSION['authType'] = 'admin';
        $_SESSION['realName'] = $result[0]['realname'];
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

header("location:home.php");
exit();
?>

