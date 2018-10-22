<?php
// get the data from the form

$email;
$phone_number;
$message;

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

 if(isset($_POST['phone_number']))
{
    $phone_number = $_POST['phone_number'];

    if ( empty($phone_number) )  
    {
        $error_message = 'Phone Number is a required field.'; 
	}
}
else
{
    $error_message = 'Phone Number is a required field.'; 
}

if(isset($_POST['message']))
{
    $message = $_POST['message'];

    if ( empty($message) ) {
        $error_message = 'Please enter a message.';    
    } 
}
else
{
    $error_message = 'Please enter a message.'; 
}
    


    $phone_number = filter_var($phone_number, FILTER_SANITIZE_NUMBER_INT);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = filter_var($message, FILTER_SANITIZE_STRING);
    

    $phone_number = filter_var($phone_number, FILTER_VALIDATE_INT);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL); 
    
    
    if(!$phone_number || !$email )
    {
        $error_message = 'Please enter a message.'; 
    }

    // if an error message exists, go to the Contact us page
    if ($error_message != '') {
        include('contactUs.php');
        exit();
    } // end if
	
	//insert contact info into table
	require_once("DB.class.php");

	$db = new DB();

	//var_dump($db);

	if (!$db->getConnStatus()) {
		print "An error has occurred with connection\n";
		exit;
	}

	//message max length 250 characters in table
	$query = "INSERT INTO contactInfo values(1, $email , $phone_number , $message')";
	$result = $db->dbCall($query);

	//var_dump($result); should be rows affected == 1

	
require_once("Template.php");

$page = new Template("ThankYou.php");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='headerStyles.css'/>");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='formStyles.css'/>");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();
print "<div class='size-wrapper'>\n";
print "<header>\n";
print "<a id='login' href='#'>Login</a>\n";
print "<a id='siteTitle' href='home.php'>CNMT 310 Group 1!</a>\n";
print "<nav>\n";
print "<ul class='navbar'>\n";
print "<li><a href='home.php'>Home</a></li>\n";
print "<li><a href='aboutUs.php'>About Us</a></li>\n";
print "<li><a class='active' href='contactUs.php'>Contact Us</a></li>\n";
print "</ul>";
print "</nav>\n";
print "</header>\n";

print "<div class='content'>\n";
print "<div id='content'>\n";
print "<h1>Thank you for contacting us, someone will get back to you soon!</h1>\n";
print "</div>\n";
print "</div>\n";

print "<footer>\n";
print "<p>CNMT 310, Fall Semester, Group 1</p>\n";
print "</footer>\n";
print "</div>\n";
print $page->getBottomSection();

