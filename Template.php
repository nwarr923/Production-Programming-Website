<?php

/**
*
* Template class
* 
* Used to create multiple unique HTML pages.
*
* Always call "set" methods before calling any "get" methods,
* as in the example here:
*
* Usage:
*   $page = new Template("My Page");
*   $page->setHeadSection("<script src='hello.js'></script>");
*   $page->setTopSection();
*   $page->setBottomSection();
*
*   print $page->getTopSection();
*   print "<h1>Some page-specific HTML goes here</h1>\n";
*   print $page->getBottomSection();
*
* @author Steve Suehring <steve.suehring@uwsp.edu>
*/

class Template {

	private $_top;
	private $_bottom;
  private $_title;
  private $_headSection = "";

function __construct($title = "Default") {
	$this->_title = $title;
}

/**
* function setHeadSection($include)
*
* Used to add things to the <head> section of an HTML doc.
* For example, it is typical to add CSS <link> tags
* and <script> tags in the <head> section.
*
* This must be called __before__ setTopSection and
* will typically be called once for each <link> or <script>
* that will appear in the <head> section.
*
*
* @param string $include  The element to include
*/

function setHeadSection($include) {
  $this->_headSection .= $include . "\n";
} //end function setHeadSection

function setTopSection() {
	$returnVal = "";
	$returnVal .= "<!doctype html>\n";
	$returnVal .= "<html lang=\"en\">\n";
	$returnVal .= "<head><title>";
	$returnVal .= $this->_title;
	$returnVal .= "</title>\n";
  $returnVal .= $this->_headSection;
	$returnVal .= "</head>\n";
	$returnVal .= "<body>\n";

	$this->_top = $returnVal;

} //end function setTopSection

function setSiteHeader($userName, $pageTitle, $authentication){
	if ($authentication == 'admin' || $authentication == 'user') {
		$returnVal = "";
		$returnVal .= "<div class='size-wrapper'>\n";
		$returnVal .= "<header>\n";
		$returnVal .= "<a id='login' href='login.php'>Welcome " . $userName . "</a>\n";
		$returnVal .= "<a id='login' href='logout.php'>Log Out</a>\n";
		$returnVal .= "<a id='siteTitle' href='home.php'>CNMT  310  Group 1</a>\n";
		$returnVal .= "<nav>\n";
		$returnVal .= "<ul class='navbar'>\n";
		
		if ($pageTitle == 'home.php') {
			$returnVal .= "<li><a class='active' href='home.php'>Home</a></li>\n";
			$returnVal .= "<li><a href='aboutUs.php'>About Us</a></li>\n";
			$returnVal .= "<li><a href='contactUs.php'>Contact Us</a></li>\n";
			$returnVal .= "<li><a href='bookInfo.php'>Book Request</a></li>\n";
			if ($authentication == 'admin'){
				$returnVal .= "<li><a href='contactData.php'>Contact Data</a></li>\n";
			}
		} else if ($pageTitle == 'aboutUs.php') {
			$returnVal .= "<li><a href='home.php'>Home</a></li>\n";
			$returnVal .= "<li><a class='active' href='aboutUs.php'>About Us</a></li>\n";
			$returnVal .= "<li><a href='contactUs.php'>Contact Us</a></li>\n";
			$returnVal .= "<li><a href='bookInfo.php'>Book Request</a></li>\n";
			if ($authentication == 'admin'){
				$returnVal .= "<li><a href='contactData.php'>Contact Data</a></li>\n";
			}
		} else if ($pageTitle == 'contactUs.php') {
			$returnVal .= "<li><a href='home.php'>Home</a></li>\n";
			$returnVal .= "<li><a href='aboutUs.php'>About Us</a></li>\n";
			$returnVal .= "<li><a class='active' href='contactUs.php'>Contact Us</a></li>\n";
			$returnVal .= "<li><a href='bookInfo.php'>Book Request</a></li>\n";
			if ($authentication == 'admin'){
				$returnVal .= "<li><a href='contactData.php'>Contact Data</a></li>\n";
			}
		} else if ($pageTitle == 'bookInfo.php') {
			$returnVal .= "<li><a href='home.php'>Home</a></li>\n";
			$returnVal .= "<li><a href='aboutUs.php'>About Us</a></li>\n";
			$returnVal .= "<li><a href='contactUs.php'>Contact Us</a></li>\n";
			$returnVal .= "<li><a class='active' href='bookInfo.php'>Book Request</a></li>\n";
			if ($authentication == 'admin'){
				$returnVal .= "<li><a href='contactData.php'>Contact Data</a></li>\n";
			}
		} else if ($pageTitle == 'contactData.php') {
			$returnVal .= "<li><a href='home.php'>Home</a></li>\n";
			$returnVal .= "<li><a href='aboutUs.php'>About Us</a></li>\n";
			$returnVal .= "<li><a href='contactUs.php'>Contact Us</a></li>\n";
			$returnVal .= "<li><a href='bookInfo.php'>Book Request</a></li>\n";
			$returnVal .= "<li><a class='active' href='contactData.php'>Contact Data</a></li>\n";
			
		} else {
			$returnVal .= "<li><a href='home.php'>Home</a></li>\n";
			$returnVal .= "<li><a href='aboutUs.php'>About Us</a></li>\n";
			$returnVal .= "<li><a href='contactUs.php'>Contact Us</a></li>\n";
			$returnVal .= "<li><a href='bookInfo.php'>Book Request</a></li>\n";
			if ($authentication == 'admin'){
				$returnVal .= "<li><a href='contactData.php'>Contact Data</a></li>\n";
			}
		}
		
		$returnVal .= "</ul>";
		$returnVal .= "</nav>\n";
		$returnVal .= "</header>\n";
	}
	else {
		$returnVal = "";
		$returnVal .= "<div class='size-wrapper'>\n";
		$returnVal .= "<header>\n";
		$returnVal .= "<a id='login' href='login.php'>Login</a>\n";
		$returnVal .= "<a id='siteTitle' href='home.php'>CNMT  310  Group 1</a>\n";
		$returnVal .= "<nav>\n";
		$returnVal .= "<ul class='navbar'>\n";
		
		if ($pageTitle == 'home.php') {
			$returnVal .= "<li><a class='active' href='home.php'>Home</a></li>\n";
			$returnVal .= "<li><a href='aboutUs.php'>About Us</a></li>\n";
			$returnVal .= "<li><a href='contactUs.php'>Contact Us</a></li>\n";
			$returnVal .= "<li><a href='bookInfo.php'>Book Request</a></li>\n";
		} else if ($pageTitle == 'aboutUs.php') {
			$returnVal .= "<li><a href='home.php'>Home</a></li>\n";
			$returnVal .= "<li><a class='active' href='aboutUs.php'>About Us</a></li>\n";
			$returnVal .= "<li><a href='contactUs.php'>Contact Us</a></li>\n";
			$returnVal .= "<li><a href='bookInfo.php'>Book Request</a></li>\n";
		} else if ($pageTitle == 'contactUs.php') {
			$returnVal .= "<li><a href='home.php'>Home</a></li>\n";
			$returnVal .= "<li><a href='aboutUs.php'>About Us</a></li>\n";
			$returnVal .= "<li><a class='active' href='contactUs.php'>Contact Us</a></li>\n";
			$returnVal .= "<li><a href='bookInfo.php'>Book Request</a></li>\n";
		} else if ($pageTitle == 'bookInfo.php') {
			$returnVal .= "<li><a href='home.php'>Home</a></li>\n";
			$returnVal .= "<li><a href='aboutUs.php'>About Us</a></li>\n";
			$returnVal .= "<li><a href='contactUs.php'>Contact Us</a></li>\n";
			$returnVal .= "<li><a class='active' href='bookInfo.php'>Book Request</a></li>\n";
		} else {
			$returnVal .= "<li><a href='home.php'>Home</a></li>\n";
			$returnVal .= "<li><a href='aboutUs.php'>About Us</a></li>\n";
			$returnVal .= "<li><a href='contactUs.php'>Contact Us</a></li>\n";
			$returnVal .= "<li><a href='bookInfo.php'>Book Request</a></li>\n";
		};
		
		$returnVal .= "</ul>";
		$returnVal .= "</nav>\n";
		$returnVal .= "</header>\n";
	}
	
	$this->_header = $returnVal;
	
} // end function setSiteHeader

function setBottomSection() {
	$returnVal = "";
	$returnVal .= "</body>\n";
	$returnVal .= "</html>\n";

	$this->_bottom = $returnVal;

} //end function setBottomSection

function getTopSection() {
	return $this->_top;
}

function getSiteHeader() {
	return $this->_header;
}

function getBottomSection() {
	return $this->_bottom;
}

} // end class

?>
