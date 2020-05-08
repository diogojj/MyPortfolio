<?php
  	require 'vendor/autoload.php';
	$Name = $_POST["name"];
	$FromEmail = $_POST["email"];
	$message = $_POST["message"];
	// $message = str_replace("\n.", "\n..", $message);
	$EmailTo = "diogo.av.justino@gmail.com"; 
	$Subject = "Portfolio-Resume";
	 
	// prepare email body text	 
	$Body .= "Message: ";
	$Body .= $message;
	$Body .= "\n";

    $email = new \SendGrid\Mail\Mail();
    $email->setFrom($FromEmail, $Name);
    $email->setSubject("Sending with Twilio SendGrid is Fun");
    $email->addTo($EmailTo);
    $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
    $email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
    );
    $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
    try {
    $response = $sendgrid->send($email);
        print $response->statusCode() . "\n";
        print_r($response->headers());
        print $response->body() . "\n";
    } catch (Exception $e) {
        echo 'Caught exception: '. $e->getMessage() ."\n";
    }
?>


