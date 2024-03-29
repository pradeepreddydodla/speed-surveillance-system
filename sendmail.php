<?php

session_start();



/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Asia/Calcutta');

require 'phpmailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTPss
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;


//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'some@email.com';

//Password to use for SMTP authentication
$mail->Password = 'somepassword';

//Set who the message is to be sent from
$mail->setFrom('some@email.com', 'Admin');


//Set an alternative reply-to address
$mail->addReplyTo('some@email.com', 'Ashok');

//Set who the message is to be sent to
$mail->addAddress('some@email.com', 'Ashok');

//Set the subject line
$mail->Subject ='Speed Alert !';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML( 'Your current speed is more than the speed limit of the vehicle! Please go slowly.', dirname(__FILE__));

//Replace the plain text body with one created manually
$mail->AltBody = 'Your current speed is more than the speed limit of the vehicle! Please go slowly.';


//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
 else {
    echo "Mail Successfully Sent!";
}

?>

