<?php

namespace app\controllers;

use app\App;

class PatientsController extends AdminController
{
    private const PATIENT_NOT_FOUND = 'Paziente non trovato';

    public function __construct()
    {
        if (!AdminController::checkIfLogged()) header('Location: /admin');
    }


    public static function index($page)
    {
        $admin = new self();

        $patients = $admin->loadPatients();

        $params = ['patients' => $patients];

        if ($page === '/admin/paziente') {

            $params  += $admin->getPatient($patients);
        }

        $admin->renderPage($page, $params);

        App::$app->session->remove('form');
    }

    private function loadPatients()
    {
        $search = $_GET['search'] ?? null;
        $order = $_GET['order'] ?? 'id';
        $type = $_GET['type'] ?? 'asc';

        return App::$app->patient->get($search, $order, $type);
    }

    private function getPatient($patients)
    {
        if ($_GET['id']) {

            foreach ($patients as $patient) {

                if ($patient['id'] == $_GET['id']) {

                    App::$app->session->setFlash('form', $patient);

                    $params = ['patient' => $patient];

                    return $params;
                }
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
