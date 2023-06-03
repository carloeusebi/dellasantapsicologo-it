<?php

namespace app\controllers;

use app\Router;
use app\config\Config;
use app\models\Patient;

class AdminController
{
    const LAYOUT = 'admin';
    const ADMIN_VIEW = 'admin';
    const LOGIN_VIEW = 'login';
    const ADMIN_404 = '/admin/404';

    private $isInvalid = false;

    public static function index(Router $router, $page)
    {
        session_set_cookie_params(3600);

        session_start();

        $admin = new self();

        if ($router->getMethod() === 'post') $admin->adminPost($admin, $router);
        else $admin->adminGet($admin, $router, $page);

        $admin->renderPage($router, $admin, $page);
    }

    private function adminGet(AdminController $admin, Router $router, $page)
    {
        if ($page === '/admin/paziente' && (!isset($_GET['id']))) $router->renderView(self::ADMIN_404, ['layout' => self::LAYOUT]);
    }

    private function adminPost(AdminController $admin, Router $router)
    {
        if (isset($_POST['logout'])) $admin->logout();

        elseif (isset($_POST['login'])) $admin->login();

        elseif (isset($_POST['patient-create'])) $admin->createPatient($router);
    }

    private function logout()
    {
        session_start();

        session_destroy();

        header("Location: /admin");

        exit();
    }

    private function login()
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($username === Config::ADMIN_USERNAME && $password === Config::ADMIN_PASSWORD) {

            $_SESSION['login'] = true;
        } else {

            $this->isInvalid = true;
        }
    }

    private function renderPage(Router $router, AdminController $admin, $page)
    {

        $loggedIn = $admin->checkIfLogged();

        $params = ['layout' => self::LAYOUT];

        if ($loggedIn) $admin->renderAdmin($router, $params, $page);

        else $admin->renderLogin($router, $params += ['isInvalid' => $admin->isInvalid]);
    }

    private function checkIfLogged()
    {
        return isset($_SESSION['login']);
    }

    private function renderAdmin(Router $router, $params = [], $page)
    {
        $search = $_GET['search'] ?? null;

        $patients = $router->db->getPatients($search);

        $router->renderView($page, $params + ['patients' => $patients]);
    }

    private function renderLogin(Router $router, $params = [])
    {
        $router->renderView(self::LOGIN_VIEW, $params);
    }

    public static function createPatient(Router $router)
    {
        $patient = [];
        $errors = [];
        $success = '';

        if ($router->getMethod() !== 'post') $router->renderView('404');

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

        if (empty($errors)) $success = 'creato';
        else $fillForm = $data;

        $patients = $router->db->getPatients();

        $router->renderView('/admin/pazienti', ['layout' => self::LAYOUT, 'patients' => $patients, 'errors' => $errors, 'success' => $success, 'fillForm' => $fillForm]);
    }

    public static function deletePatient(Router $router)
    {
        if ($router->getMethod() !== 'post') $router->renderView('404');

        $router->db->deletePatient($_POST['id']);

        $success = 'eliminato';

        $patients = $router->db->getPatients();

        $router->renderView('/admin/pazienti', ['layout' => self::LAYOUT, 'patients' => $patients, 'success' => $success]);
    }
}
