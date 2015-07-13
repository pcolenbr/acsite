<?php

$response = json_encode( array( 'success' => false ) );	

$location = $_POST ['location'];
$name = $_POST ['name'];
$email = $_POST ['email'];
$website = $_POST ['website'];
$message = $_POST ['message'];

if($location == 1 ) {
	$mail_to = 'info@avenuecode.com';		
} else {
	$mail_to = 'brazil.info@avenuecode.com';
}

$subject = 'Website email submission from '. $location;

$body_message = 'From: '. $name . "<br>";
$body_message .= 'E-mail: ' . $email . "<br>";
$body_message .= 'Website: ' . $website . "<br>";
$body_message .= 'Message: ' . $message;

$headers = 'Content-Type: text/html; charset=UTF-8' . "\r\n";
$headers .= 'From: ' . $email . "\r\n";
$headers .= 'Reply-To: '. $email . "\r\n";

$status = wp_mail( $mail_to, $subject, $body_message, $headers );

if($status == true) {
	$response = json_encode( array( 'success' => true ) );	
}

header( "Content-Type: application/json" );
return $response;

?>