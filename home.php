<?php

require_once("Template.php");

$page = new Template("home.php");
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
print "<li><a class='active' href='home.php'>Home</a></li>\n";
print "<li><a href='aboutUs.php'>About Us</a></li>\n";
print "<li><a href='contactUs.php'>Contact Us</a></li>\n";
print "<li><a href='bookInfo.php'>Book Request</a></li>\n";
print "</ul>";
print "</nav>\n";
print "</header>\n";

print "<div class='content'>\n";
print "<h1>CNMT 310 Assignment 1</h1>\n";
print "<h2>Details</h2>\n";
print "<li>Due October 1st, at 11:59PM.</li><br>\n";
print "<li>Worth 20 points.</li><br>\n";
print "<li>Must be completed Individually.</li><br>\n";
print "<h2>What to submit</h2>\n";
print "<li>Four webpages should be created in total</li><br>\n";
print "<li>One of those webpages should have a form that is validated with php and JavaScript.</li><br>\n";
print "<li>The four webpages must be created with the php template provided.</li>\n";
print "</div>\n";
print "<footer>\n";
print "<p>Assignment 1 Footer. Noah Warren, CNMT 310, 9/30/2018</p>\n";
print "</footer>\n";
print "</div>\n";
print $page->getBottomSection();

