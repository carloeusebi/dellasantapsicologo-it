<?php

session_start();

use app\Validator;

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

    $validator = new Validator;

    if (!($validator->validateMail($emailFrom))) {

        if (mailSend($mail, $emailTo, $subject, $body, $emailFrom, $name)) {

            updateLog(1);

            $_SESSION['status'] = 'success';

            // send a confirmation mail

            $subject = 'Ti ringraziamo per averci contattato';
            $body = 'Il Dr Dellasanta ha ricevuto la sua mail e la contatter&agrave; al pi&ugrave; presto';

            mailSend($mail, $emailFrom, $subject, $body);
        }
    } else {
        // to refill form
        $_SESSION['post'] = $_POST;
    }


    header("Location: $location");
}
