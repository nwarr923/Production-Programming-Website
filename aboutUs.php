<?php

require_once('helper.php');
require_once("Template.php");

$page = new Template("aboutUs.php");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='headerStyles.css'/>");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='formStyles.css'/>");
$page->setTopSection();
$page->setSiteHeader($usersName, "aboutUs.php", $auth);
$page->setBottomSection();

print $page->getTopSection();
print $page->getSiteHeader();

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

