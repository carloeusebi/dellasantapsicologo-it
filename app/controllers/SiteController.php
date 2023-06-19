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

        App::$app->router->renderView($page, ['pageTitle' => $pageTitle]);
    }


    public static function post($page)
    {
        $status = '';

        if ($_POST['submit']) {

            $mail = new Mailer;

            $status = $mail->prepare();

            if (!$status) {
                $status = $mail->send();
            }
        }

        if (!$status) $status = 'success';

        $formRefill = ($status !== 'success') ? $_POST : [];

        App::$app->router->renderView($page, ['status' => $status, 'formRefill' => $formRefill]);
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
