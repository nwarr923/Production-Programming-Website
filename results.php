<?php
// get the data from the form
    $bookInfo = $_POST['bookInfo'];

    // validate bookInfo
    if ( empty($bookInfo) ) {
        $error_message = 'Please enter a search.';         
    } else {
        $error_message = ''; // There are no errors
    } // end if

    // if an error message exists, go to the Contact us page
    if ($error_message != '') {
        include('bookInfo.php');
        exit();
    } // end if
	
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


$page = new Template("results.php");
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
print "<li><a href='contactUs.php'>Contact Us</a></li>\n";
print "<li><a class='active' href='bookInfo.php'>Book Request</a></li>\n";
print "</ul>";
print "</nav>\n";
print "</header>\n";

print "<div class='content'>\n";
print "<div id='content'>\n";
print "<h1>Here are your results: </h1>\n";
print "<table>";

if(!empty($result) ) {

	foreach ($result as $row) {
	
		print "<tr>";
			print "<td>";
			print "<p> ID Number: </p>";
			print "</td>";
			
			print "<td class='spacer'>";
			print ($row['id']); 
			print "</td>";
		print "</tr>";
		
		print "<tr>";
			print "<td>";
			print "<p> Insert Time: </p>";
			print "</td>";
			
			print "<td class='spacer'>";
			print ($row['inserttime']); 
			print "</td>";
		print "</tr>";

		print "<tr>";
			print "<td>";
			print "<p> Book Title: </p>";
			print "</td>";
			
			print "<td class='spacer'>";
			print ($row['booktitle']); 
			print "</td>";
		print "</tr>";
		
		print "<tr>";
			print "<td>";
			print "<p> ISBN: </p>";
			print "</td>";
			
			print "<td class='spacer'>";
			print ($row['isbn']); 
			print "</td>";
		print "</tr>";
		
		print "<tr>";
			print "<td>";
			print "<p> Author: </p>";
			print "</td>";
		
			print "<td class='spacer'>";
			print ($row['author']); 
			print "</td>";
		print "</tr>";
	
		print "<tr>";
			print "<td>";
			print "<p> Status: </p>";
			print "</td>";
		
			print "<td class='spacer'>";
			print ($row['status']); 
			print "</td>";
		print "</tr>";
	
	}
} else {
	print "<h1> Item Not Found </h1>";
}
print "</table>";
print "</div>\n";
print "</div>\n";

print "<footer>\n";
print "<p>Assignment 1 Footer. Noah Warren, CNMT 310, 9/30/2018</p>\n";
print "</footer>\n";
print "</div>\n";
print $page->getBottomSection();