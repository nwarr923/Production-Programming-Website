<?php
	
require_once("Template.php");
require_once("DB.class.php");

$db = new DB();

//var_dump($db);

if (!$db->getConnStatus()) {
  print "An error has occurred with connection\n";
  exit;
}

session_start();
$result;

if (isset($_SESSION['authType'])){
	
$query = "SELECT * FROM contactInfo";  //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<  TODO: DOUBLE CHECK TABLE NAME

$result = $db->dbCall($query);

}
var_dump($_SESSION['authType']);

$page = new Template("contactData.php");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='headerStyles.css'/>");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='formStyles.css'/>");
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
print "<h1>Here are your results: </h1>\n";
print "<table>";

//$_SESSION['admin']
if(!empty($result) && $_SESSION['authType'] == 'admin') {

	foreach ($result as $row) {
	
		print "<tr>";
			print "<td>";
			print "<p> User:  </p>";
			print "</td>";
			
			print "<td>";
			print ($row['username']); 
			print "</td>";
		print "</tr>";
		
		print "<tr>";
			print "<td>";
			print "<p> Password:  </p>";
			print "</td>";
			
			print "<td>";
			print ($row['userpass']); 
			print "</td>";
		print "</tr>";
		
		print "<tr>";
			print "<td>";
			print "<p> User ID:  </p>";
			print "</td>";
			
			print "<td>";
			print ($row['userid']); 
			print "</td>";
		print "</tr>";
		
		print "<tr>";
			print "<td>";
			print "<p> Role ID:  </p>";
			print "</td>";
			
			print "<td>";
			print ($row['roleid']); 
			print "</td>";
		print "</tr>";
	
	}
} else {
	print "<h1> You do not have access to this information </h1>";
}
print "</table>";
print "</div>\n";
print "</div>\n";

print "<footer>\n";
print "<p>CNMT 310, Fall Semester, Group 1</p>\n";
print "</footer>\n";
print "</div>\n";
print $page->getBottomSection();

?>