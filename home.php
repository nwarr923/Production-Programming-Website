<?php

require_once('helper.php');
require_once("Template.php");

$page = new Template("home.php");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='headerStyles.css'/>");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='formStyles.css'/>");
$page->setTopSection();
$page->setSiteHeader($usersName, "home.php", $auth);
$page->setBottomSection();

print $page->getTopSection();
print $page->getSiteHeader();

print "<div class='content'>\n";
print "<h1>CNMT 310 Current Assignment</h1>\n";
print "<h2>Details</h2>\n";
print "<ul>\n";
print "<li>Due October 23rd, at 11:59PM.</li>\n";
print "<li>Worth up to 20 points.</li>\n";
print "<li>Will be completed as a group.</li>\n";
print "</ul>\n";
print "<h2>What to submit</h2>\n";
print "<ul>\n";
print "<li>Original website with any needed fixes.</li>\n";
print "<li>Contact page should place all captured info into database.</li>\n";
print "<li>Create a new page that allows the user to search for a book, and a result page that displays results from the database.</li>\n";
print "</ul>\n";
print "</div>\n";
print "<footer>\n";
print "<p>CNMT 310, Fall Semester, Group 1</p>\n";
print "</footer>\n";
print "</div>\n";
print $page->getBottomSection();

