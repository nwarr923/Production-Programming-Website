<?php
$auth; 
$usersName;

session_start();
if (isset($_SESSION['authType']){
	$auth = $_SESSION['authType'];
}
if (isset($_SESSION['realName']){
	$usersName = $_SESSION['realName'];
}

require_once("Template.php");

$page = new Template("aboutUs.php");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='headerStyles.css'/>");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='formStyles.css'/>");
$page->setTopSection();
$page->setSiteHeader($usersName, "home.php", $auth);
$page->setBottomSection();

print $page->getTopSection();
print $page->getSiteHeader();
print "<div class='size-wrapper'>\n";
print "<header>\n";
print "<a id='login' href='#'>Login</a>\n";
print "<a id='siteTitle' href='home.php'>CNMT  310  Group 1</a>\n";
print "<nav>\n";
print "<ul class='navbar'>\n";
print "<li><a href='home.php'>Home</a></li>\n";
print "<li><a class='active' href='aboutUs.php'>About Us</a></li>\n";
print "<li><a href='contactUs.php'>Contact Us</a></li>\n";
print "<li><a href='bookInfo.php'>Book Request</a></li>\n";
print "</ul>";
print "</nav>\n";
print "</header>\n";

print "<div class='content'>\n";
print "<h1>This class is CNMT 310 Production Programming</h1>\n";
print "<h2>Class Info</h2>\n";
print "<ul>\n";
print "<li>This class meets on Mondays and Wednesdays from 10AM to 11:50AM</li>";
print "<li>We are a four person group that consists of Adam, Chase, Kelly, and Noah.</li>\n";
print "<li>This course is taught by Steve Suehring</li>\n";
print "</ul>\n";
print "</div>\n";
print "<footer>\n";
print "<p>CNMT 310, Fall Semester, Group 1</p>\n";
print "</footer>\n";
print "</div>\n";
print $page->getBottomSection();

