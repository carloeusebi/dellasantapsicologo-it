<?php

namespace app\controllers;

use app\Router;
use app\config\Config;

class AdminController
{
    const LAYOUT = 'admin';
    const ADMIN_VIEW = 'admin';
    const LOGIN_VIEW = 'login';
    const ADMIN_404 = '/admin/404';

    private $isInvalid = false;

    public function __construct()
    {

        session_set_cookie_params(3600);

        session_start();
    }

    public static function index(Router $router, $page)
    {
        $admin = new self();

        if ($router->getMethod() === 'post') $admin->adminPost($admin, $router);
        else $admin->adminGet($admin, $router, $page);

        $admin->renderPage($router, $admin, $page);
    }


    private function adminGet(AdminController $admin, Router $router, $page)
    {
    }


    private function adminPost(AdminController $admin, Router $router)
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


    public function renderPage(Router $router, AdminController $admin, $page, $params = [])
    {

        $loggedIn = $admin->checkIfLogged();

        $params += ['layout' => self::LAYOUT];

        if ($loggedIn) $admin->renderAdmin($router, $params, $page);

        else $admin->renderLogin($router, $params += ['isInvalid' => $admin->isInvalid]);
    }


    private function checkIfLogged()
    {
        return isset($_SESSION['login']);
    }


    private function renderAdmin(Router $router, $params = [], $page)
    {
        $router->renderView($page, $params);
    }


    private function renderLogin(Router $router, $params = [])
    {
        $router->renderView(self::LOGIN_VIEW, $params);
    }

    public static function render404(Router $router, $notFound)
    {
        $router->renderView(self::ADMIN_404, ['layout' => self::LAYOUT, 'notFound' => $notFound]);
    }
}
