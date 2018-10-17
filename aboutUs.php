<?php

require_once("Template.php");

$page = new Template("aboutUs.php");
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
print "<li><a class='active' href='aboutUs.php'>About Us</a></li>\n";
print "<li><a href='contactUs.php'>Contact Us</a></li>\n";
print "<li><a href='bookInfo.php'>Book Request</a></li>\n";
print "</ul>";
print "</nav>\n";
print "</header>\n";

print "<div class='content'>\n";
print "<h1>This class is CNMT 310 Production Programming</h1>\n";
print "<h2>Class Info</h2>\n";
print "<li>This class meets on Mondays and Wednesdays from 10AM to 11:50AM</li><br>";
print "<li>It is a 16 week course that is 4 credits</li><br>\n";
print "<li>It is taught by Steve Suehring</li>\n";
print "</div>\n";
print "<footer>\n";
print "<p>Assignment 1 Footer. Noah Warren, CNMT 310, 9/30/2018</p>\n";
print "</footer>\n";
print "</div>\n";
print $page->getBottomSection();

