<?php

namespace app\controllers;

use app\App;
use app\config\Config;

class AdminController
{
    const LAYOUT = 'admin';
    const ADMIN_VIEW = 'admin';
    const LOGIN_VIEW = 'login';
    const ADMIN_404 = '/admin/404';

    private AdminController $admin;
    private $isInvalid = false;

    public function __construct()
    {
        $this->admin = $this;
    }

    public static function index($page)
    {
        $admin = new self();

        if (App::$app->router->getMethod() === 'post') $admin->adminPost();
        else $admin->adminGet();

        $admin->renderPage($page);
    }


    private function adminGet()
    {
    }


    private function adminPost()
    {
        if (isset($_POST['logout']))  $this->admin->logout();

        elseif (isset($_POST['login'])) $this->admin->login();
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

        // $_SESSION['login'] = false;

        if ($username === Config::ADMIN_USERNAME && $password === Config::ADMIN_PASSWORD) {

            $_SESSION['login'] = true;

            header("Location: /admin");
        } else {

            $this->isInvalid = true;
        }
    }


    public function renderPage($page, $params = [])
    {

        $loggedIn = AdminController::checkIfLogged();

        $params += ['layout' => self::LAYOUT];

        if ($loggedIn) AdminController::renderAdmin($page, $params);

        else AdminController::renderLogin($params += ['isInvalid' => $this->isInvalid]);
    }


    public static function checkIfLogged()
    {
        return $_SESSION['login'] ?? false;
    }


    private static function renderAdmin($page, $params = [])
    {
        App::$app->router->renderView($page, $params);
    }


    private static function renderLogin($params = [])
    {
        App::$app->router->renderView(self::LOGIN_VIEW, $params);
    }

    public static function render404($notFound)
    {
        App::$app->router->renderView(self::ADMIN_404, ['layout' => self::LAYOUT, 'notFound' => $notFound]);
    }
}
