<?php

$name = $_POST['name'];
$phone = $_POST['phone'];
$emailFrom = $_POST['mail'];
$message = $_POST['message'];

$location = parse_url($_SERVER["HTTP_REFERER"])['path'];

$emailTo = 'carloeusebi@gmail.com';
$subject = 'Un cliente ti ha scritto';
$body =
    "Da: $name <br>
    Numero di telefono: $phone <br>
    Email: $emailFrom <br><br>
    Messaggio:<br> $message";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
include 'config/credentials.php';
include 'email-validation.php';



if ($_POST['submit']) {

    $mail = new PHPMailer(true);

    $mail->SMTPAuth = true;

    $mail->Host = $mailHost;
    $mail->Username = $mailUsername;
    $mail->Password = $mailPassword;

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
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        ]
    ];

    if (!validateEmail($emailFrom, $mail, $location)) {
        header("Location: $location");
        exit();
    }

    try {

        $mail->send();

        sendDebugEmail($mail, 'The form successfully sent an email');

        $mail->ClearAllRecipients();

        $_SESSION['status'] = 'success';
    } catch (Exception $e) {
        $_SESSION['status'] = $mail->ErrorInfo;
    }

    header("Location: $location");
}