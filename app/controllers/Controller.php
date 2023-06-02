<?php

namespace app\controllers;

use app\Router;
use app\Validator;
use app\Mailer;

class Controller
{
    public static function loadPage(Router $router, $page)
    {
        $router->renderView($page);
    }

    public static function sendMail(Router $router, $page)
    {
        if ($_POST['submit']) {

            $name = htmlspecialchars($_POST['name']);
            $phone = htmlspecialchars($_POST['phone']);
            $emailFrom = htmlspecialchars($_POST['mail']);
            $message = htmlspecialchars($_POST['message']);

            $emailTo = 'carloeusebi@gmail.com';
            $subject = 'Un cliente ti ha scritto';
            $body =
                "Da: $name <br>
                Numero di telefono: $phone <br>
                Email: $emailFrom <br><br>
                Messaggio:<br> $message";


            $validator = new Validator;
            $mailer = new Mailer;

            $status = $validator->validateMail($emailFrom);

            if (!$status) {

                $status = $mailer->send($emailTo, $subject, $body, $emailFrom, $name);

                if (!$status) {

                    self::updateLog(1);

                    $status = 'success';

                    // send a confirmation mail

                    $subject = 'Ti ringraziamo per averci contattato';
                    $body = 'Il Dr Dellasanta ha ricevuto la sua mail e la contatter&agrave; al pi&ugrave; presto';

                    $mailer->send($emailFrom, $subject, $body);
                }
            }
        }

        $formRefill = ($status !== 'success') ? $_POST : [];

        $router->renderView($page, ['status' => $status, 'formRefill' => $formRefill]);
    }

    public static function updateLog($code, $error = '')
    {
        $filePath = __DIR__ . '/../../public/log.txt';

        fopen($filePath, 'a+');

        $date = date("d-m-y H:i:s", time());

        $message = match ($code) {
            1 => "An email was succesfully sent.",
            2 => "Form was submitted with honeybox checked.",
            3 => "Form was submitted with an undeliverable email.",
            4 => $error,
            default => "Something went unexpected.",
        };

        $message = $code . ' - ' . $date . ' - ' . $message . PHP_EOL;

        file_put_contents($filePath, $message, FILE_APPEND);
    }
}
