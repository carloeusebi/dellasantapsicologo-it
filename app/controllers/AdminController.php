<?php

namespace app\controllers;

use app\Router;
use app\config\Config;

class AdminController
{
    const LAYOUT = 'admin';
    const ADMIN_VIEW = 'admin';
    const LOGIN_VIEW = 'login';
    private $isInvalid;

    public static function admin(Router $router)
    {
        session_set_cookie_params(3600);

        session_start();

        $admin = new self();

        if ($router->getMethod() === 'post') $admin->adminPost($admin);

        $params = ['layout' => self::LAYOUT, 'isInvalid' => $admin->isInvalid];

        $loggedIn = $admin->checkIfLogged();

        if ($loggedIn) $admin->renderAdmin($router, $params);
        else $admin->renderLogin($router, $params);
    }

    private function adminGet()
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

    private function checkIfLogged()
    {
        return isset($_SESSION['login']);
    }

    private function renderAdmin(Router $router, $params = [])
    {
        $router->renderView(self::ADMIN_VIEW, $params);
    }

    private function renderLogin(Router $router, $params = [])
    {
        $router->renderView(self::LOGIN_VIEW, $params);
    }
}
