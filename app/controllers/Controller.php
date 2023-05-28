<?php

namespace app\controllers;

use app\Router;
use app\Validator;
use app\Mailer;

class Controller
{
    public static function admin(Router $router)
    {
        require __DIR__ . '/../views/admin.view.php';
    }

    public static function loadPage(Router $router, $page)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') $router->renderView('404');

        $self = new self();
        $pageTitle = $self->getPageTitle($page);

        $router->renderView($page, $pageTitle);
    }

    public static function send(Router $router)
    {
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
            $mailer = new Mailer;

            if (!($validator->validateMail($emailFrom))) {

                if ($mailer->send($emailTo, $subject, $body, $emailFrom, $name)) {

                    updateLog(1);

                    $_SESSION['status'] = 'success';

                    // send a confirmation mail

                    $subject = 'Ti ringraziamo per averci contattato';
                    $body = 'Il Dr Dellasanta ha ricevuto la sua mail e la contatter&agrave; al pi&ugrave; presto';

                    $mailer->send($emailFrom, $subject, $body);
                }
            } else {
                // to refill form
                $_SESSION['post'] = $_POST;
            }


            header("Location: $location");
        }
    }

    private function getPageTitle($page)
    {
        $pageTitle = match ($page) {
            '/' => 'Home',
            '/chi-sono' => 'Chi Sono',
            '/cosa-aspettarsi' => 'Cosa Aspettarsi dalla Terapia',
            '/di-cosa-mi-occupo' => 'Di cosa mi Occupo',
            '/contatti' => 'Contatti',
            default => '404',
        };

        return $pageTitle;
    }
}
