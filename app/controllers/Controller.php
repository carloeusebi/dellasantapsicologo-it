<?php

namespace app\controllers;

use app\App;
use app\config\Config;

class Controller
{
    const LOGIN_VIEW = 'login';

    protected array $params = [];
    private string $page;

    protected $layout;

    protected static $notFound;
    protected static $header;
    protected static $model = '';


    public function __construct($page = '')
    {
        $this->page = $page;

        $loggedIn = $this->checkIfLogged();

        if (!$loggedIn) {

            if (isset($_POST['login'])) $this->login();
            else $this->renderLogin();
        }

        App::$app->connect();
    }


    public static function logout()
    {
        session_start();

        session_destroy();

        header("Location: /admin");

        exit();
    }


    public static function login()
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($username === Config::ADMIN_USERNAME && $password === Config::ADMIN_PASSWORD) {

            $_SESSION['login'] = true;
        } else {

            App::$app->session->setFlash('isInvalid', true);
        }

        header("Location: /admin");
    }

    public static function checkIfLogged()
    {
        return $_SESSION['login'] ?? false;
    }


    public function renderPage()
    {
        App::$app->router->setLayout($this->layout);
        App::$app->router->renderView($this->page, $this->params);
    }


    private function renderLogin()
    {
        App::$app->router->setLayout($this->layout);
        if ($this->page !== '/admin') header('Location: /admin');
        App::$app->router->renderView(self::LOGIN_VIEW, $this->params);
    }

    public function addToParams(string $param, $value)
    {
        $this->params += [$param => $value];
    }
}
