<?php
// get the data from the form

$email;
$password;
$error_message = '';

if(isset($_POST['email']))   
{
    $email = $_POST['email'];   

    if ( empty($email) ) 
    {
        $error_message = 'Email is a required field.';        
    }
}
else
{
    $error_message = 'Email is a required field.';  
}

 if(isset($_POST['password']))
{
    $password = $_POST['password'];

    if ( empty($password) )  
    {
        $error_message = 'Password is a required field.'; 
	}
}
else
{
    $error_message = 'Password is a required field.'; 
}

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = filter_var($password, FILTER_SANITIZE_STRING);

$email = filter_var($email, FILTER_VALIDATE_EMAIL); 


if(!$password || !$email )
{
	$error_message = 'Please enter a message.'; 
}

// if an error message exists, go to the Contact us page
if ($error_message != '') {
	include('contactUs.php');
	exit();
} // end if

//connect to database
require_once("DB.class.php");

$db = new DB();

//var_dump($db);

if (!$db->getConnStatus()) {
	print "An error has occurred with connection\n";
	exit;
}

/* Authenticate user here
function authenticate($email, $password){
	// authentication code here
}
*/
	
	
// Send to home when user has been authenticated
header("location:home.php");
exit();

?>	


