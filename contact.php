<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;  //Enable verbose debug output
    $mail->isSMTP(true);                        //Send using SMTP
    $mail->Host       = 'smtp.gmail.com'; //Set the SMTP server to send through
    $mail->SMTPAuth   = true;               //Enable SMTP authentication
    $mail->Username   = 'webmirchiforms@gmail.com';  //SMTP username
    $mail->Password   = 'zdnk sivj nvkb mukf';            //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('Sandeepanshind6789@gmail.com', 'Mailer');
    $mail->addAddress('Sandeepanshind6789@gmail.com', 'Joe User'); //Add a recipient
    $mail->addReplyTo('info@example.com', 'Information');
  
    //Content
    $mail->isHTML(true);  //Set email format to HTML
    $mail->Subject = $subject; // Assign the subject value
    $mail->Body =   "<h2><b>Sandeep Shinde Art</b></h2><br>
                    <h1> Full Name :- $name<h1/>
                    <h1> Email Addres:- $email</h1>
                    <h1> Contact :- $phone<h1/>
                    <h1>Subject :- $message</h1>";
            

    $mail->send();

    header("Location:contact.html");

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}