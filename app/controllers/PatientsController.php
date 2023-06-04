<?php

namespace app\controllers;

use app\App;
use app\models\Patient;

class PatientsController extends AdminController
{
    private const PATIENT_NOT_FOUND = 'Paziente non trovato';

    private $labels = [
        'id' => 'ID',
        'fname' => 'Nome',
        'lname' => 'Cognome',
        'age' => 'Età',
        'birthday' => 'Data di nascita',
        'birthplace' => 'Luogo di nascita',
        'address' => 'Indirizzo',
        'fiscalcode' => 'Codice Fiscale',
        'begin' => 'Data di inizio Terapia',
        'email' => 'Email',
        'phone' => 'Numero di Telefono',
        'consent' => 'Consenso',
        'weight' => 'Peso',
        'height' => 'Altezza',
        'job' => 'Occupazione',
        'sex' => 'Sesso',
        'cohabitants' => 'Conviventi',
        'username' => 'Username'
    ];

    public function __construct()
    {
        if (!AdminController::checkIfLogged()) header('Location: /admin');
    }


    public static function index($page)
    {
        $admin = new self();

        $patients = $admin->getPatients();

        $params = ['labels' => $admin->labels, 'patients' => $patients];

        if ($page === '/admin/paziente') {

            $params  += $admin->getPatient($patients);
        }

        $admin->renderPage($page, $params);

        App::$app->session->remove('form');
    }


    private function getPatients()
    {
        $search = $_GET['search'] ?? null;

        $order = $_GET['order'] ?? 'id';

        $type = $_GET['type'] ?? 'asc';

        return App::$app->db->getPatients($search, $order, $type);
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

        extract($_POST);
        $data['fname'] = $fname;
        $data['lname'] = $lname;
        $data['age'] = $age;
        $data['birthday'] = $birthday;
        $data['birthplace'] = $birthplace;
        $data['address'] = $address;
        $data['fiscalcode'] = $fiscalcode;
        $data['begin'] = $begin;
        $data['email'] = $email;
        $data['phone'] = $phone;
        $data['consent'] = $consent;
        $data['weight'] = $weight;
        $data['height'] = $height;
        $data['job'] = $job;
        $data['sex'] = $sex;
        $data['cohabitants'] = $cohabitants;

        $patient = new Patient();
        $patient->load($data);
        $errors = $patient->save();

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

        $patient = new Patient();
        $patient->load($data);

        $errors = $patient->save();

        if (empty($errors)) {

            App::$app->session->setFlash('success', 'Paziente modificato con successo');
        } else {

            App::$app->session->setFlash('form', $data);
            App::$app->session->setFlash('errors', $errors);
        }

        header("Location: /admin/paziente?id=$id");
    }

    public static function delete($page)
    {
        if (App::$app->router->getMethod() !== 'post') App::$app->router->renderView('404');

        App::$app->db->deletePatient($_POST['id']);

        App::$app->session->setFlash('success', 'Paziente eliminato con successo');

        header('Location: /admin/pazienti');
    }
}
