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

    public static function sendMail(Router $router)
    {
        if ($_POST['submit']) {

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


            $validator = new Validator;
            $mailer = new Mailer;

            $status = $validator->validateMail($emailFrom);

            if (!$status) {

                $status = $mailer->send($emailTo, $subject, $body, $emailFrom, $name);

                if (!$status) {

                    updateLog(1);

                    $status = 'success';

                    // send a confirmation mail

                    $subject = 'Ti ringraziamo per averci contattato';
                    $body = 'Il Dr Dellasanta ha ricevuto la sua mail e la contatter&agrave; al pi&ugrave; presto';

                    $mailer->send($emailFrom, $subject, $body);
                }
            }
        }

        $formRefill = ($status !== 'success') ? $_POST : [];

        $router->renderView($location, ['status' => $status, 'formRefill' => $formRefill]);
    }
}
