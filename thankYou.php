<?php

require_once('helper.php');

$email;
$phone_number;
$message;
$error_message = '';
   
// Check email field
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    // Check if empty
    if (empty($email)) {
        $error_message = 'Email is required.<br/>';         
    }
    else {
        // Filter values
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if ($email == FALSE){
            $error_message = 'Invalid Email.<br/>';
        }
    }
}
 
else {
    $error_message = 'Email is required.<br/>';
}

// Check phone number field
if (isset($_POST['phone_number'])) {
    $phone_number = $_POST['phone_number'];
	
    // Check if empty
    if (empty($phone_number)) {
        $error_message = $error_message . 'Phone Number is required.<br/>';         
    }
    else {
        // Filter values
        $phone_number = filter_var($phone_number, FILTER_SANITIZE_NUMBER_INT);
        $phone_number = filter_var($phone_number, FILTER_VALIDATE_INT);
        if ($phone_number == FALSE)
        {
            $error_message = $error_message . 'Invalid Phone Number.<br/>';
        }
    }
}
else {
    $error_message = $error_message . 'Phone Number is required.<br/>';
}

// Check message field
if (isset($_POST['message'])) {
    $message = $_POST['message'];
	
    // Check if empty
    if (empty($message)) {
        $error_message = $error_message . 'Message is required.<br/>';         
    }
    else {
        // Filter values
        $phone_number = filter_var($message, FILTER_SANITIZE_NUMBER_INT);
    }
}
else {
    $error_message = $error_message . 'Message is required.<br/>';
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

$email_safe = $db->dbEsc($email);
$message_safe = $db->dbEsc($message);
$phone_number_safe = $db->dbEsc($phone_number);
 //message max length 250 characters in table
$query = "INSERT INTO contactInfo values(1, $email_safe , $phone_number_safe , $message_safe')";
$result = $db->dbCall($query);
	
require_once("Template.php");


$page = new Template("ThankYou.php");
 $page->setHeadSection("<link rel='stylesheet' type='text/css' href='headerStyles.css'/>");
 $page->setHeadSection("<link rel='stylesheet' type='text/css' href='formStyles.css'/>");
 $page->setTopSection();
 $page->setSiteHeader($usersName, "contactUs.php", $auth);
 $page->setBottomSection();
 
 print $page->getTopSection();
 print $page->getSiteHeader();
 
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
