<?php

namespace app\controllers;

use app\App;
use app\Mailer;

class SiteController extends Controller
{
    private const LAYOUT = 'main';


    public static function getPage($page)
    {
        if ($page === '/') {
            $page = '/home';
        }

        $pageTitle = self::getPageTitle($page);

        App::$app->router->setLayout(self::LAYOUT);

        $status = App::$app->session->getFlash('status');
        $formRefill = App::$app->session->getFlash('formRefill');

        $params = [
            'pageTitle' => $pageTitle,
            'status' => $status,
            'formRefill' => $formRefill
        ];

        App::$app->router->renderView($page, $params);
    }


    public static function post($page)
    {
        $status = '';

        if ($_POST['submit']) {

            $mail = new Mailer;

            $status = $mail->prepareFromForm();

            if (!$status) {
                $status = $mail->send();
            }
        }

        if (!$status) {
            $status = 'success';
            $mail->sendConfirmation();
        }

        $formRefill = ($status !== 'success') ? $_POST : [];

        App::$app->session->setFlash('status', $status);
        App::$app->session->setFlash('formRefill', $formRefill);



        header("Location: $page");
    }



    private static function getPageTitle($page)
    {
        return match ($page) {
            '/home' => 'Home',
            '/chi-sono' => 'Chi Sono',
            '/cosa-aspettarsi' => 'Cosa Aspettarsi dalla Terapia',
            '/di-cosa-mi-occupo' => 'Di cosa mi Occupo',
            '/contatti' => 'Contatti',
            default => 'Pagina non trovata'
        };
    }
}
