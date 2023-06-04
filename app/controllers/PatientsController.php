<?php

namespace app\controllers;

use app\Router;
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
        'fiscalcode' => 'Codice Fisca',
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


    public static function index(Router $router, $page)
    {
        $admin = new self();

        $patients = $admin->getPatients($router);

        $patient = [];

        $params = ['labels' => $admin->labels, 'patients' => $patients];

        if ($page === '/admin/paziente') $patient = $admin->getPatient($router, $patients);

        if ($patient) $params += ['patient' => $patient];

        if (isset($_GET['type'])) $params += ['type' => $_GET['type']];

        $admin->renderPage($router, $admin, $page, $params);
    }

    private function getPatients(Router $router)
    {
        $search = $_GET['search'] ?? null;

        $order = $_GET['order'] ?? 'id';

        $type = $_GET['type'] ?? 'asc';

        return $router->db->getPatients($search, $order, $type);
    }

    private function getPatient(Router $router, $patients)
    {
        if ($_GET['id']) {

            foreach ($patients as $patient) {

                if ($patient['id'] == $_GET['id']) {

                    $_SESSION['form'] = $patient;

                    return $patient;
                }
            }
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
        } else {

            $_SESSION['form'] = $data;
            $_SESSION['errors'] = $errors;
        }

        header("Location: /admin/paziente?id=$id");
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
