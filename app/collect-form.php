<?php

session_start();

include 'email-send.php';

$name = htmlspecialchars($_POST['name']);
$phone = htmlspecialchars($_POST['phone']);
$emailFrom = htmlspecialchars($_POST['mail']);
$message = htmlspecialchars($_POST['message']);

$location = parse_url($_SERVER["HTTP_REFERER"])['path'];

$emailTo = 'carloeusebi@gmail.com';
$subject = 'Un cliente ti ha scritto';
$body =
    "Da: $name <br>
    Numero di telefono: $phone <br>
    Email: $emailFrom <br><br>
    Messaggio:<br> $message";

if ($_POST['submit']) {

    if (!validateEmail($emailFrom)) {

        $_SESSION['post'] = $_POST;
    } else {

        $mail = mailPrepare();

        try {

            mailSend($mail, $emailTo, $subject, $body, $emailFrom, $name);

            statsFormUpdate(1);

            $_SESSION['status'] = 'success';
        } catch (Exception $e) {

            $error = $mail->ErrorInfo;

            $_SESSION['status'] = $error;
            $_SESSION['post'] = $_POST;
            statsFormUpdate(4, $error);
        }
    }

    // send a confirmation mail

    $mail = mailPrepare();

    $subject = 'Ti ringraziamo per averci contattato';
    $body = 'Il Dr Dellasanta ha ricevuto la sua mail e la contatter&agrave; al pi&ugrave; presto';

    mailSend($mail, $emailFrom, $subject, $body);

    header("Location: $location");
}