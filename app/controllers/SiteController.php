<?php

namespace app\controllers;

use app\App;
use app\Mailer;

class SiteController extends Controller
{
    public static function get($page)
    {
        app::$app->router->renderView($page);
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
}
