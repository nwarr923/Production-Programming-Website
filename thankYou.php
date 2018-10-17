<?php
// get the data from the form
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
	$message = $_POST['message'];

    // validate email, password, and phone number
    if ( empty($email) ) {
        $error_message = 'Email is a required field.';        
    } else if ( empty($phone_number) )  {
        $error_message = 'Phone Number is a required field.'; 
	} else if ( empty($message) ) {
        $error_message = 'Please enter a message.';    
    } else {
        $error_message = ''; // There are no errors
    } // end if

    // if an error message exists, go to the Contact us page
    if ($error_message != '') {
        include('contactUs.php');
        exit();
    } // end if
	
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
print "<a id='siteTitle' href='home.php'>Assignment 1 Website</a>\n";
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
print "<p>Assignment 1 Footer. Noah Warren, CNMT 310, 9/30/2018</p>\n";
print "</footer>\n";
print "</div>\n";
print $page->getBottomSection();
