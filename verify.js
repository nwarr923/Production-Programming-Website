function validateForm() {
	
	if(document.contactForm.email.value == "") {
		alert("Please fill out the required fields.");
		document.contactForm.email.focus();
		return false;
	}
	
	if(document.contactForm.message.value == "") {
		alert("Please fill out the required fields.");
		document.contactForm.message.focus();
		return false;
	}
	return( true );
}

function validateInfo() {
	if document.bookSearch.bookInfo.value == "") {
		alert("Please fill out the required fields.");
		document.bookSearch.bookInfo.focus();
		return false;
}