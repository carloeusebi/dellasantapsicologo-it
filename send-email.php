<?php
session_start();

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['mail'];
$message = $_POST['message'];

$location = '/contatti';

// $honeypot = $_POST['miele-cb'];

$emailTo = 'carloeusebi@gmail.com';
$subject = 'Un cliente ti ha scritto';
$body = "Da: $name \n
Numero di telefono: $phone \n
Email: $email \n\n
Messaggio:\n $message";

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->isSMTPAuth = true;

$mail->Host = "";
$mail->SMTPSecure = "tls";
$mail->Port = 587;

$mail->Username = "email@dellasantapsicologo.it";
$mail->Password = "";

$mail->setFrom($email, $name);
$mail->addAddress($emailTo);

$mail->Subject = $subject;
$mail->Body = $body;


if ($_POST['submit']){
    
    if (isset($_POST['miele-cb'])){
        mail($emailTo, $subject, "un bot ha provato ad inviare una mail");
        $_SESSION['status'] = 'sei un bot';
        header("Location: $location");
        exit();
    }
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        $_SESSION['status'] = 'Email non valida';
        header("Location: $location");
        exit();
    }
    
    //TODO Check if email is valid!!

    
    //TODO un comment when server is up
    // if(!$mail->Send()) {
    //     $_SESSION['status'] = 'Invio non riuscito';
    //     header("Location: $location");
    //     exit();
    // } else {
        $_SESSION['status'] = 'success';
        header("Location: $location");
    //}    
   

}

