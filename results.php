<?php

$bookInfo;
$error_message = '';

require_once('helper.php');

// get the data from the form
	if (isset($_POST['bookInfo'])) {
		$bookInfo = $_POST['bookInfo'];

		// Check if empty
		if (empty($bookInfo)) {
			$error_message = 'Please enter a search.';         
		}
		else {
			// Filter values
			$bookInfo = filter_var($bookInfo, FILTER_SANITIZE_STRING);

			if ($bookInfo == FALSE)
			{
				$error_message = 'Invalid search.';
			}
		}
	}
	else {
		$error_message = 'Please enter a search.';
	}

    if ($error_message != '') {
        include('bookInfo.php');
        exit();
	}
	
require_once("Template.php");
require_once("DB.class.php");

$db = new DB();

//var_dump($db);

if (!$db->getConnStatus()) {
  print "An error has occurred with connection\n";
  exit;
}


$query = "Select * FROM bookinfo HAVING bookinfo.booktitle LIKE '$bookInfo'
OR bookinfo.isbn LIKE '$bookInfo' OR bookinfo.author LIKE '$bookInfo'";

$result = $db->dbCall($query);
//var_dump($result);

if(empty($result) ) {
	$error_message = 'Sorry, no results.';
	include('bookInfo.php');
    exit();
}

$page = new Template("results.php");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='headerStyles.css'/>");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='formStyles.css'/>");
$page->setTopSection();
$page->setSiteHeader($usersName, "bookInfo.php", $auth);
$page->setBottomSection();

print $page->getTopSection();
print $page->getSiteHeader();

print "<div class='content'>\n";
print "<div id='content'>\n";
print "<h1>Here are your results: </h1>\n";
print "<table>";

if (!empty($result)) {
	
	foreach ($result as $row) {

		print "<tr>";
			print "<td>";
			print "<p> ID Number: </p>";
			print "</td>";
			
			print "<td>";
			print ($row['id']); 
			print "</td>";
		print "</tr>";
		
		print "<tr>";
			print "<td>";
			print "<p> Insert Time: </p>";
			print "</td>";
			
			print "<td>";
			print ($row['inserttime']); 
			print "</td>";
		print "</tr>";

		print "<tr>";
			print "<td>";
			print "<p> Book Title: </p>";
			print "</td>";
			
			print "<td>";
			print ($row['booktitle']); 
			print "</td>";
		print "</tr>";
		
		print "<tr>";
			print "<td>";
			print "<p> ISBN: </p>";
			print "</td>";
			
			print "<td>";
			print ($row['isbn']); 
			print "</td>";
		print "</tr>";
		
		print "<tr>";
			print "<td>";
			print "<p> Author: </p>";
			print "</td>";
		
			print "<td>";
			print ($row['author']); 
			print "</td>";
		print "</tr>";
	
		print "<tr>";
			print "<td>";
			print "<p> Status: </p>";
			print "</td>";
		
			print "<td>";
			print ($row['status']); 
			print "</td>";
		print "</tr>";
	
	}
} 
print "</table>";
print "</div>\n";
print "</div>\n";

print "<footer>\n";
print "<p>CNMT 310, Fall Semester, Group 1</p>\n";
print "</footer>\n";
print "</div>\n";
print $page->getBottomSection();
