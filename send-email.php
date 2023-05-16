<?php
session_start();

$name = $_POST['name'];
$phone = $_POST['phone'];
$emailFrom = $_POST['mail'];
$message = $_POST['message'];

$location = '/contatti';

// $honeypot = $_POST['miele-cb'];

$emailTo = 'carloeusebi@gmail.com';
$subject = 'Un cliente ti ha scritto';
$body = "Da: $name \n
Numero di telefono: $phone \n
Email: $emailFrom \n\n
Messaggio:\n $message";

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use \Verifalia\VerifaliaRestClient;


$mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->isSMTPAuth = true;

$mail->Host = "";
$mail->SMTPSecure = "tls";
$mail->Port = 587;

$mail->Username = "email@dellasantapsicologo.it";
$mail->Password = "";

$mail->setFrom($emailFrom, $name);
$mail->addAddress($emailTo);

$mail->Subject = $subject;
$mail->Body = $body;

$verifalia = new VerifaliaRestClient([
    'username' => 'carloeusebi@gmail.com',
    'password' => 'vGRY798h-!y8.Y@'
]);

if ($_POST['submit']){
    
    if (isset($_POST['miele-cb'])){
        mail($emailTo, $subject, "un bot ha provato ad inviare una mail");
        $_SESSION['status'] = 'sei un bot';
        header("Location: $location");
        // TODO send an email for debugging purposes
        exit();
    }
    
    if (filter_var($emailFrom, FILTER_VALIDATE_EMAIL) === false){
        $_SESSION['status'] = 'Email non valida';
        header("Location: $location");
        exit();
    }
    
    //TODO Check if email is valid!!

    //check how many credits
    // $balance = $verifalia
    // ->credits
    // ->getBalance();

    // only if have credits check email
    // if($balance->freeCredits > 0){

        
    //     $validation = $verifalia
    //     ->emailValidations
    //     ->submit($emailFrom, true);
        
    //     $entry = $validation->entries[0];
    //     if ($entry->classification === 'Undeliverable'){
    //         $_SESSION['status'] = 'Email non valida';
    //         header("Location: $location");
    //         exit();
    //     }
    // }
        
    //TODO un comment when server is up
    // if(!$mail->Send()) {
    //     $_SESSION['status'] = 'Invio non riuscito';
    //     header("Location: $location");
    //     exit();
    // } else {
        $_SESSION['status'] = 'success';
        header("Location: $location");
        //echo nl2br ($body);
    //}    
   

}

