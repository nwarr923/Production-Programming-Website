<?php

require_once('helper.php');
require_once("Template.php");

$page = new Template("contactUs.php");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='headerStyles.css'/>");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='formStyles.css'/>");
$page->setTopSection();
$page->setSiteHeader($usersName, "home.php", $auth);
$page->setBottomSection();

print $page->getTopSection();
print $page->getSiteHeader();

print "<div class='content'>\n";
print "<div id='content'>\n";
print "<h1>Login</h1>\n";

if ($auth == 'user' or $auth == 'admin') {
	header("location:home.php");
	exit();
}

if (!empty($error_message)) 
{
	print "<p class='error'>\n";
	print $error_message;
	print "</p>";
} // end if
print "<form action='authenticate.php' method='post'>\n";
print "<fieldset>\n";
print "<div id='data'><br>\n";
print "<label>Email:</label>\n";
print "<input type='text' name='email'/><br>\n";
print "<label>Password</label>\n";
print "<input type='password' name='password'/><br>\n";
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
print "<p>CNMT 310, Fall Semester, Group 1</p>\n";
print "</footer>\n";
print "</div>\n";
print $page->getBottomSection();

