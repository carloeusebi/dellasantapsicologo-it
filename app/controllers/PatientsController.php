<?php

namespace app\controllers;

use app\App;

class PatientsController extends AdminController
{
    private const PATIENT_NOT_FOUND = 'Paziente non trovato';

    public static function getPatient($patients)
    {
        foreach ($patients as $patient) {

            if ($patient['id'] == $_GET['id']) {

                App::$app->session->setFlash('form', $patient);

                $params = ['patient' => $patient];

                return $params;
            }
        }

        AdminController::render404(self::PATIENT_NOT_FOUND);
    }


    public static function create()
    {
        $patient = [];
        $errors = [];

        if (App::$app->router->getMethod() !== 'post') AdminController::render404(self::PATIENT_NOT_FOUND);

        foreach ($_POST as $key => $value) {
            $data[$key] = $value;
        }

        App::$app->patient->load($data);
        $errors = App::$app->patient->save();

        if (empty($errors)) {

            App::$app->session->setFlash('success', 'Paziente creato con successo');
        } else {

            App::$app->session->setFlash('form', $data);
            App::$app->session->setFlash('errors', $errors);
        }

        header('Location: /admin/pazienti');
    }


    public static function update()
    {
        $errors = [];

        $id = $_POST['id'];

        if (!$id) AdminController::render404(self::PATIENT_NOT_FOUND);

        foreach ($_POST as $key => $value) {
            $data[$key] = $value;
        }


        App::$app->patient->load($data);

        $errors = App::$app->patient->save();

        if (empty($errors)) {

            App::$app->session->setFlash('success', 'Paziente modificato con successo');
        } else {

            App::$app->session->setFlash('form', $data);
            App::$app->session->setFlash('errors', $errors);
        }

        header("Location: /admin/paziente?id=$id");
    }

    public static function delete()
    {
        if (App::$app->router->getMethod() !== 'post') App::$app->router->renderView('404');

        App::$app->patient->delete($_POST['id']);

        App::$app->session->setFlash('success', 'Paziente eliminato con successo');

        header('Location: /admin/pazienti');
    }
}
