<?php

require_once('helper.php');
require_once("Template.php");
require_once("DB.class.php");

$db = new DB();

//var_dump($db);

if (!$db->getConnStatus()) {
  print "An error has occurred with connection\n";
  exit;
}

$result;

if (isset($_SESSION['authType'])){
	
$query = "SELECT * FROM contactinfo"; 

$result = $db->dbCall($query);

}
//var_dump($_SESSION['authType']);

$page = new Template("contactData.php");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='headerStyles.css'/>");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='formStyles.css'/>");
$page->setTopSection();
$page->setSiteHeader($usersName, "contactData.php", $auth);
$page->setBottomSection();

print $page->getTopSection();
print $page->getSiteHeader();

print "<div class='content'>\n";
print "<div id='content'>\n";
print "<h1>Here are your results: </h1>\n";
print "<table>";


if($_SESSION['authType'] == 'admin') 
{
	if(!empty($result))
	{
		foreach ($result as $row) {		
			
			print "<tr>";
				print "<td>";
				print "<p> Phone:  </p>";
				print "</td>";
				
				print "<td>";
				print ($row['phone']);  //Is this correct column name ??
				print "</td>";
			print "</tr>";
			
			print "<tr>";
				print "<td>";
				print "<p> Email:  </p>";
				print "</td>";
				
				print "<td>";
				print ($row['email']); 
				print "</td>";
			print "</tr>";
			
			print "<tr>";
				print "<td>";
				print "<p> Message:  </p>";
				print "</td>";
				
				print "<td>";
				print ($row['message']); 
				print "</td>";
			print "</tr>";
					
		}
	}
	else
	{
		print "<h1> Sorry, no results found. </h1>";
	}
} 
else 
{
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
