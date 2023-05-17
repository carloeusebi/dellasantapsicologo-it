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
$body = "Da: $name <br>
Numero di telefono: $phone <br>
Email: $emailFrom <br><br>
Messaggio:<br> $message";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use \Verifalia\VerifaliaRestClient;

//Load Composer's autoloader
require 'vendor/autoload.php';

include 'assets/credentials.php';
include 'assets/email-validation.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$verifalia = new VerifaliaRestClient([
    'username' => 'carloeusebi@gmail.com',
    'password' => 'vGRY798h-!y8.Y@'
]);

if ($_POST['submit']){

    $mail->Host = $credentialHost;
    $mail->SMTPAuth = true;
    $mail->Username = $credentialUsername;
    $mail->Password = $credentialPassword;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    
    $mail->setFrom($emailFrom);
    $mail->addAddress($emailTo);
    
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body;

    $mail->SMTPDebug = 1;
    $mail->isSMTP();
    
    
    $mail->SMTPOptions = [
        'ssl'=> [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ]
        ]; 

    if (!validateEmail($emailFrom, $mail, $verifalia)){
        header("Location: $location");
        exit();
    }

    try {

        $mail->send();
        $mail->ClearAllRecipients();

        $_SESSION['status'] = 'success';
        
    } catch (Exception $e) {
        $_SESSION['status'] = $mail->ErrorInfo;
    }

    header("Location: $location");  
}