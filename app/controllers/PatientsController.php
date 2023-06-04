<?php

namespace app\controllers;

use app\Router;
use app\models\Patient;

class PatientsController extends AdminController
{
    private const PATIENT_NOT_FOUND = 'Paziente non trovato';

    private static $labels = [
        'fname' => 'Nome',
        'lname' => 'Cognome',
        'age' => 'Età',
        'birthday' => 'Data di nascita',
        'birthplace' => 'Luogo di nascita',
        'address' => 'Indirizzo',
        'fiscalcode' => 'Codice Fisca',
        'begin' => 'Data di inizio Terapia',
        'email' => 'Email',
        'phone' => 'Numero di Telefono',
        'consent' => 'Consenso',
        'weight' => 'Peso',
        'height' => 'Altezza',
        'job' => 'Occupazione',
        'sex' => 'Sesso',
        'cohabitants' => 'Abitanti',
    ];


    public static function index(Router $router, $page)
    {
        $admin = new self();

        $search = $_GET['search'] ?? null;

        $patients = $router->db->getPatients($search);

        $params = ['patients' => $patients];

        $admin->renderPage($router, $admin, $page, $params);
    }

    private function getPatient($patients, $router)
    {
        foreach ($patients as $patient) {

            if ($patient['id'] == $_GET['id']) return $patient;

            $_SESSION['form'] = $patient;
        }

        AdminController::render404($router, self::PATIENT_NOT_FOUND);
    }


    public static function create(Router $router, $page)
    {
        session_start();

        $patient = [];
        $errors = [];

        if ($router->getMethod() !== 'post') AdminController::render404($router, self::PATIENT_NOT_FOUND);

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

            $_SESSION['success'] = 'creato';
        } else {

            $_SESSION['form'] = $data;
            $_SESSION['errors'] = $errors;
        }

        header('Location: /admin/pazienti');
    }


    public static function update(Router $router, $page)
    {
        session_start();

        $errors = [];

        $id = $_POST['id'];

        if (!$id) AdminController::render404($router, self::PATIENT_NOT_FOUND);

        foreach ($_POST as $key => $value) {
            $data[$key] = $value;
        }

        $patient = new Patient();
        $patient->load($data);

        $errors = $patient->save();

        if (empty($errors)) {

            $_SESSION['success'] = 'modificato';
            header('Location: /admin/pazienti');
        } else {

            $_SESSION['form'] = $data;
            $_SESSION['errors'] = $errors;
        }

        header('Location: /admin/pazienti');
    }

    public static function delete(Router $router, $page)
    {
        session_start();

        if ($router->getMethod() !== 'post') $router->renderView('404');

        $router->db->deletePatient($_POST['id']);

        $_SESSION['success'] = 'cancellato';

        header('Location: /admin/pazienti');
    }
}