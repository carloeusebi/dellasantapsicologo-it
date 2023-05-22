<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
include 'functions.php';
include 'email-validation.php';

function mailPrepare()
{
    include 'config/config.php';

    $mail = new PHPMailer(true);
    $mail->SMTPAuth = true;

    $mail->Host = $mailHost;
    $mail->Username = $mailUsername;
    $mail->Password = $mailPassword;

    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    // $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->isHTML(true);

    $mail->SMTPDebug = 1;
    $mail->isSMTP();

    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        ]
    ];

    return $mail;
}

function mailSend(
    $mail,
    $emailTo,
    $subject,
    $message,
    $emailFrom = '',
    $name = ''
) {
    if ($emailFrom !== '') {
        $mail->AddReplyTo($emailFrom, $name);
    }

    $mail->setFrom("contactme@dellasantapsicologo.it", "Dr Federico Dellasanta");
    $mail->addAddress($emailTo);
    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();

    $mail->ClearAllRecipients();
}

function sendDebugEmail($message)
{
    $mail = mailPrepare();

    $emailTo = 'carloeusebi@gmail.com';
    $subject = 'Debug email from dellasantapsicologo.it';

    mailSend($mail, $emailTo, $subject, $message);
}
