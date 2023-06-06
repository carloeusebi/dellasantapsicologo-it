<?php

namespace app\controllers;

use app\App;

class PatientsController extends AdminController
{
    public const NOT_FOUND = 'Paziente non trovato';
    private AdminController $admin;

    public static function index($page)
    {
        $admin = new parent($page);

        $admin->GetPatients();

        $admin->renderPage();
    }


    public static function create()
    {

        if (!App::$app->router->isPost()) parent::render404(self::NOT_FOUND);

        self::save('creato');

        header("Location: /admin/pazienti");
    }


    public static function update()
    {
        $id = $_POST['id'];

        if (!$id) parent::render404(self::NOT_FOUND);

        self::save('modificato');

        header("Location: /admin/paziente?id=$id");
    }

    private static function save($message)
    {
        $errors = [];

        foreach ($_POST as $key => $value) {
            $data[$key] = $value;
        }

        App::$app->connect();
        App::$app->patient->load($data);
        $errors = App::$app->patient->save();

        if (empty($errors)) {

            App::$app->session->setFlash('success', "Paziente <strong>$message</strong> con successo");
        } else {

            App::$app->session->setFlash('form', $data);
            App::$app->session->setFlash('errors', $errors);
        }
    }


    public static function delete()
    {
        if (!App::$app->router->isPost()) parent::render404(self::NOT_FOUND);

        App::$app->connect();
        App::$app->patient->delete($_POST['id']);
        App::$app->session->setFlash('success', 'Paziente <strong>eliminato</strong> con successo');

        header('Location: /admin/pazienti');
    }
}
