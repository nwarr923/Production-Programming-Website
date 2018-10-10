<?php

require_once("Template.php");

$page = new Template("contactUs.php");
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
print "<h1>Contact Us!</h1>\n";
if (!empty($error_message)) 
{
	print "<p class='error'>\n";
	print $error_message;
	print "</p>";
} // end if
print "<form action='thankYou.php' method='post'>\n";
print "<fieldset>\n";
print "<legend>Contact Info</legend>\n";
print "<div id='data'><br>\n";
print "<label>Email:</label>\n";
print "<input type='text' name='email'/><br>\n";
print "<label>Phone Number:</label>\n";
print "<input type='text' name='phone_number'/><br>\n";
print "</div>\n";
print "<div id='textArea'>\n";
print "<p>Your Message:</p>\n";
print "<textarea name='message' rows='3' cols='50'></textarea>\n";
print "</div>\n";
print "</fieldset>\n";
print "<div id='buttons'>\n";
print "<label>&nbsp;</label>\n";
print "<input type='submit' value='Submit'/><br />\n";
print "</div>\n";
print "</form>\n";
print "</div>\n";
print "</div>\n";

print "<footer>\n";
print "<p>Assignment 1 Footer. Noah Warren, CNMT 310, 9/30/2018</p>\n";
print "</footer>\n";
print "</div>\n";
print $page->getBottomSection();