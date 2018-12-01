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

$url = "http://cnmtsrv2.uwsp.edu/~aaufd703/sprint3Master/authService.php";
//$url = "http://localhost/sprint3Master/authService.php";

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

//var_dump(curl_exec($ch));

curl_close($ch);

$result = json_decode($result, true);

//var_dump($result);

if($result['Result'] != null)
{
    session_start();

    $count = 0;
    $roleArray;

    foreach($result['Result'] as $array)
    {   
       $roleArray[$count] =  $array['rolename'];
       $_SESSION['realName'] = $array['realname'];
       $count = $count + 1; 
    }


    //$_SESSION['authType'] = array(2) { [0]=> string(5) "admin" [1]=> string(4) "user" }
    //or
    //$_SESSION['authType'] = array(1) { [0]=> string(4) "user" }

    $_SESSION['authType'] = $roleArray;
    //var_dump($_SESSION['authType'][0]);

    header("location:home.php");
    exit();
}
else
{
    $error_message = 'Incorrect username or password !';
    include('login.php');        
    exit();
}
   
?>

