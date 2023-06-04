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
        session_start();

        if (!AdminController::checkIfLogged()) header('Location: /admin');
    }


    public static function index($page)
    {
        $admin = new self();

        $patients = $admin->getPatients();

        $patient = [];

        $params = ['labels' => $admin->labels, 'patients' => $patients];

        if ($page === '/admin/paziente') $patient = $admin->getPatient($patients);

        if ($patient) $params += ['patient' => $patient];

        if (isset($_GET['type'])) $params += ['type' => $_GET['type']];

        $admin->renderPage($page, $params);
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

                    $_SESSION['form'] = $patient;

                    return $patient;
                }
            }
        }

        AdminController::render404(self::PATIENT_NOT_FOUND);
    }


    public static function create()
    {
        session_start();

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

            $_SESSION['success'] = 'creato';
        } else {

            $_SESSION['form'] = $data;
            $_SESSION['errors'] = $errors;
        }

        header('Location: /admin/pazienti');
    }


    public static function update($page)
    {
        session_start();

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

            $_SESSION['success'] = 'modificato';
        } else {

            $_SESSION['form'] = $data;
            $_SESSION['errors'] = $errors;
        }

        header("Location: /admin/paziente?id=$id");
    }

    public static function delete($page)
    {
        session_start();

        if (App::$app->router->getMethod() !== 'post') App::$app->router->renderView('404');

        App::$app->db->deletePatient($_POST['id']);

        $_SESSION['success'] = 'cancellato';

        header('Location: /admin/pazienti');
    }
}
