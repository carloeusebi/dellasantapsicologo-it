<?php

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['mail'];
$message = $_POST['message'];

$emailTo = 'carloeusebi@gmail.com';
$subject = 'Un cliente ti ha scritto';
$body = "Da: $name \n Numero di telefono: $phone \n Email: $email \n\n$message";


if ($_POST['submit']){
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        exit("invalid format");
    }

    echo nl2br ("email address is valid\n\n");
    print nl2br ($body);

}
