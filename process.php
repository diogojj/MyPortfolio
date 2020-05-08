<?php
  	include 'assets/sendgrid-php/sendgrid-php.php';
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
	 
	$headers = array(
        'Authorization: Bearer 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',
        'Content-Type: application/json'
    );

    $data = array(
        "personalizations" => array(
            array(
                "to" => array(
                    array(
                        "email" => $EmailTo,
                        "name" => "diogo"
                    )
                )
            )
        ),
        "from" => array(
            "email" => $FromEmail
        ),
        "subject" => $Subject,
        "content" => array(
            array(
                "type" => "text/html",
                "value" => $Body
            )
        )
    );
	echo 'test123';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    echo $response;
?>


