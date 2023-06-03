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

    private $isInvalid = false;

    public static function index(Router $router, $page)
    {
        session_set_cookie_params(3600);

        session_start();

        $admin = new self();

        if ($router->getMethod() === 'post') $admin->adminPost($admin, $router);
        else $admin->adminGet($admin);

        $admin->renderPage($router, $admin, $page);
    }

    private function adminGet(AdminController $admin)
    {
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

        if ($router->getMethod() !== 'post') $router->renderView('404');

        extract($_POST);
        $data['fname'] = $fname;
        $data['lname'] = $lname;

        // TODO REST OF FIELDS

        $patient = new Patient();
        $patient->load($data);
        $errors = $patient->save();

        if (empty($errors)) $success = 'creato';

        $router->renderView('/admin/pazienti', ['layout' => self::LAYOUT, 'patients' => $patients, 'errors' => $errors, 'success' => $success]);
    }
}
