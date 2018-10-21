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

/*
//INSERT example
//Pretend this is unsanitized
//user data from a form:
$user = "bob";
$safeUser = $db->dbEsc($user);

$query = "INSERT INTO testschema (username,pass,active) " .
          "VALUES ('{$safeUser}','l33t',1)";
$result = $db->dbCall($query);

//This will contain the insert id
print "Insert statement executed, insert id was: " . $result . "\n";
*/

//If using unsanitized data, be sure
//to call the dbEsc() method on any individual values!
// Must do that prior to building the statement here

$query = "Select * FROM bookinfo HAVING bookinfo.booktitle LIKE $bookInfo
OR bookinfo.isbn LIKE $bookInfo OR bookinfo.author LIKE $bookInfo";

$result = $db->dbCall($query);
$safeResult = $db->dbEsc($result);


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
		print ($row['id']); 
		print "</td>";
	
		print "<td>";
		print ($row['inserttime']); 
		print "</td>";

	
		print "<td>";
		print ($row['booktitle']); 
		print "</td>";
	
		print "<td>";
		print ($row['isbn']); 
		print "</td>";
	
		print "<td>";
		print ($row['author']); 
		print "</td>";
	
		print "<td>";
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