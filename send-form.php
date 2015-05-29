<?php

	// Let's send the contact form!

	$to = "yourname@domain.com"; // receives the message
	$subject = "Contact Form Submitted - YOUR WEBSITE"; // subject of the email

	$name = strip_tags($_POST['name']); // name of sender
	$email = strip_tags($_POST['email']); // email of sender
	$message = strip_tags($_POST['message']); // sender 

	// HTML message
	$output =
	'<html><body>' . 
		'<table rules="all" style="border-color: #666; font-size: 14px; width: 100%;" cellpadding="20">' .
		"<tr><th>Contact Information</th></tr>\n" .
		"<tr><td>Name:</td><td>" . $name . "</td></tr>\n" .
		"<tr><td>Email:</td><td>" . $email . "</td></tr>\n" .
		"<tr><td>Message:</td><td>" . $message . "</td></tr>\n" .
	'</body></html>';

	// Special headers
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers .= 'From: <noreply@domain.com>' . "\r\n";

	mail($to, $subject, wordwrap($output), $headers, "-r you@domain.com"); // add $override if less than 2 emails
	
?>
