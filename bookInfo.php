<?php

require_once("Template.php");

$page = new Template("bookInfo.php");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='headerStyles.css'/>");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='formStyles.css'/>");
$page->setHeadSection("<script src='verify.js'></script>");
$page->setTopSection();
$page->setBottomSection();

print $page->getTopSection();
print "<div class='size-wrapper'>\n";
print "<header>\n";
print "<a id='login' href='#'>Login</a>\n";
print "<a id='siteTitle' href='home.php'>CNMT  310  Group 1</a>\n";
print "<nav>\n";
print "<ul class='navbar'>\n";
print "<li><a href='home.php'>Home</a></li>\n";
print "<li><a href='aboutUs.php'>About Us</a></li>\n";
print "<li><a href='contactUs.php'>Contact Us</a></li>\n";
print "<li><a class='active' href='bookInfo.php'>Book Request</a></li>\n";
print "</ul>";
print "</nav>\n";
print "</header>\n";

print "<div class='content'>\n";
print "<div id='content'>\n";
print "<h1>Search for a Book!</h1>\n";
if (!empty($error_message)) 
{
	print "<p class='error'>\n";
	print $error_message;
	print "</p>";
} // end if
print "<form action='results.php' method='post' name='bookSearch' onsubmit='return (validateInfo());>\n";
print "<fieldset>\n";
print "<legend>Book Search</legend>\n";
print "<div id='data'><br>\n";
print "<label>Book Information:</label>\n";
print "<input type='text' name='bookInfo'/><br>\n";
print "</fieldset>\n";
print "<div id='buttons'>\n";
print "<label>&nbsp;</label>\n";
print "<input type='submit' value='Submit'/><br />\n";
print "</div>\n";
print "</div>\n";
print "</form>\n";
print "</div>\n";
print "</div>\n";

print "<footer>\n";
print "<p>CNMT 310, Fall Semester, Group 1</p>\n";
print "</footer>\n";
print "</div>\n";
print $page->getBottomSection();
