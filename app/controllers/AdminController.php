<?php

namespace app\controllers;

use app\Router;
use app\config\Config;
use app\db\Database;

class AdminController
{
    const LAYOUT = 'admin';
    const ADMIN_VIEW = 'admin';
    const LOGIN_VIEW = 'login';

    private $isInvalid = false;
    private $db;


    public static function index(Router $router)
    {
        session_set_cookie_params(3600);

        session_start();

        $admin = new self();

        if ($router->getMethod() === 'post') $admin->adminPost($admin);
        else $admin->adminGet($admin);

        $admin->renderPage($router, $admin);
    }

    private function adminGet(AdminController $admin)
    {
    }

    private function adminPost(AdminController $admin)
    {
        if (isset($_POST['logout'])) $admin->logout();

        elseif (isset($_POST['login'])) $admin->login();
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

    private function renderPage(Router $router, AdminController $admin)
    {

        $loggedIn = $admin->checkIfLogged();

        $params = ['layout' => self::LAYOUT];


        if ($loggedIn) $admin->renderAdmin($router, $params);

        else $admin->renderLogin($router, $params = $params += ['isInvalid' => $admin->isInvalid]);
    }

    private function checkIfLogged()
    {
        return isset($_SESSION['login']);
    }

    private function renderAdmin(Router $router, $params = [])
    {
        $this->db = new DATABASE();

        $questions = $this->db->getQuestions();

        $router->renderView(self::ADMIN_VIEW, $params += ['questions' => $questions]);
    }

    private function renderLogin(Router $router, $params = [])
    {
        $router->renderView(self::LOGIN_VIEW, $params);
    }
}
