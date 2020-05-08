<?php
require 'assets/sendgrid-php/sendgrid-php.php'
	$name = $_POST["name"];
	$FromEmail = $_POST["email"];
	$message = $_POST["message"];
	// $message = str_replace("\n.", "\n..", $message);
	$EmailTo = "diogo.av.justino@gmail.com"; 
	$Subject = "Portfolio CV/Resume";
	 
	// prepare email body text
	
	$Body .= "Name: ";
	$Body .= $name;
	$Body .= "\n"; 
	 
	$Body .= "Email: ";
	$Body .= $email;
	$Body .= "\n";
	 
	$Body .= "Message: ";
	$Body .= $message;
	$Body .= "\n";
	// send email
	$email = new \SendGrid\Mail\Mail();
	$email->setFrom($FromEmail, $name);
	$email->setSubject($Subject);
	$email->addTo($EmailTo, "Diogo");
	$email->addContent($Body);

	$sendgrid = new \SendGrid(getenv('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'));
	try {
    	$response = $sendgrid->send($email);
    	print $response->statusCode() . "\n";
    	print_r($response->headers());
    	print $response->body() . "\n";
	} catch (Exception $e) {
    	echo 'Caught exception: '. $e->getMessage() ."\n";
	}
?>


