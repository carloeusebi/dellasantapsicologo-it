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
    private $patients;
    private $questions;
    private $gotById;
    private array $params = ['layout' => self::LAYOUT];
    private string $page;

    public function __construct(string $page)
    {
        $this->admin = $this;

        $this->page = $page;

        $loggedIn = $this->checkIfLogged();

        if (!$loggedIn) {

            if (isset($_POST['login'])) $this->login();
            else $this->renderLogin();
        }

        App::$app->connect();
    }

    public static function index($page)
    {
        $admin = new self($page);

        if (App::$app->router->getMethod() === 'post') $admin->adminPost();

        $admin->renderPage();

        return $admin;
    }

    public function adminPost()
    {
        if (isset($_POST['logout']))  $this->admin->logout();

        elseif (isset($_POST['login'])) $this->admin->login();
    }


    public function GetPatients()
    {
        if (isset($_GET['id'])) {
            $this->gotById = App::$app->patient->getById($_GET['id']);
            App::$app->session->setFlash('form', $this->gotById);
        } else $this->patients = App::$app->patient->get();
    }

    public function GetQuestions()
    {
        if (isset($_GET['id'])) {
            $this->gotById = App::$app->question->getById($_GET['id']);
        } else $this->questions = App::$app->question->get();
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

            App::$app->session->setFlash('isInvalid', true);
        }

        header("Location: /admin");
    }

    public function renderPage()
    {
        $this->params += ['patients' => $this->admin->patients];
        $this->params += ['questions' => $this->admin->questions];
        $this->params += ['element' => $this->gotById];

        App::$app->router->renderView($this->page, $this->params);
    }


    public static function checkIfLogged()
    {
        return $_SESSION['login'] ?? false;
    }


    private function renderLogin()
    {
        if ($this->page !== '/admin') header('Location: /admin');
        App::$app->router->renderView(self::LOGIN_VIEW, $this->params);
    }


    public static function render404($notFound)
    {
        App::$app->router->renderView(self::ADMIN_404, ['layout' => self::LAYOUT, 'notFound' => $notFound]);
    }
}
