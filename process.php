<?php
  	require 'vendor/autoload.php';
    $Name = $_POST["name"];
	$FromEmail = $_POST["email"];
	$message = $_POST["message"];
	// $message = str_replace("\n.", "\n..", $message);
	$EmailTo = "diogo.av.justino@gmail.com"; 
	$Subject = $_POST["subject"];
	 
	// prepare email body text	 
	$Body .= "Message: ";
	$Body .= $message;
	$Body .= "\n";

    $email = new \SendGrid\Mail\Mail();
    $email->setFrom($FromEmail, $Name);
    $email->setSubject($Subject);
    $email->addTo($EmailTo);
    $email->addContent("text/plain", $Body);
    $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
    try {
    $response = $sendgrid->send($email);
    } catch (Exception $e) {
        echo 'Caught exception: '. $e->getMessage() ."\n";
    }
?>


