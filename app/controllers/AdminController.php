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

    public static function create()
    {
        if (!App::$app->router->isPost()) self::render404(self::$notFound);

        self::save(self::$created);

        header(self::$header);
    }


    public static function update()
    {
        $id = $_POST['id'];

        if (!$id) self::render404(self::$notFound);

        self::save(self::$updated);

        header(self::$header . '?id=' . $id);
    }


    private static function save($message)
    {
        $errors = [];

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
