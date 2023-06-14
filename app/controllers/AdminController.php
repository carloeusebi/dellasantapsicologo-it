<?php

namespace app\controllers;

use app\App;

class AdminController extends Controller
{
    protected static $notFound = 'Pagina non trovata';

    protected static $created;
    protected static $updated;
    protected static $deleted;

    protected static $header;

    protected static $model;

    public static function save()
    {
        $errors = [];

        $id = $_POST['id'];

        $message = $id ? self::$updated : self::$created;

        foreach ($_POST as $key => $value) {
            $data[$key] = $value;
        }

        App::$app->connect();
        App::$app->{self::$model}->load($data);
        $errors = App::$app->{self::$model}->save();

        if (empty($errors)) {

            App::$app->session->setFlash('success', $message);
        } else {

            App::$app->session->setFlash('form', $data);
            App::$app->session->setFlash('errors', $errors);
        }

        $id = $id ?? App::$app->db->getLastInsertId();

        $location = $id === '0' ? self::$header : self::$header . '?id=' . $id;

        header($location);
    }


    public static function delete()
    {
        if (!App::$app->router->isPost()) self::render404(self::$notFound);

        App::$app->connect();
        App::$app->{self::$model}->delete($_POST['id']);
        App::$app->session->setFlash('success', self::$deleted);

        header(self::$header);
    }
}
