<?php

namespace app\controllers;

use app\App;
use app\config\Config;

class Controller
{
    const LAYOUT = 'admin';
    const ADMIN_VIEW = 'admin';
    const LOGIN_VIEW = 'login';
    const ADMIN_404 = '/admin/404';

    private Controller $admin;
    protected $entries;
    protected $gotById;
    protected array $params = ['layout' => self::LAYOUT];
    private string $page;

    protected static $header;
    protected static $notFound;
    protected static $model = '';


    public function __construct($page = '')
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

        $admin->get();

        $admin->renderPage();

        return $admin;
    }


    public function get()
    {

        if (self::$model) {

            if (isset($_GET['id'])) {

                $this->gotById = App::$app->{self::$model}->getById($_GET['id']);
                if (!$this->gotById) {
                    $this->render404(self::$notFound);
                }
                App::$app->session->setFlash('form', $this->gotById);
                $labels = App::$app->{self::$model}->labels();
                $this->params += ['labels' => $labels];
            } else {
                $this->entries = App::$app->{self::$model}->get();
            }
        }
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
        $this->params += ['entries' => $this->entries];
        $this->params += ['element' => $this->gotById];

        $isFilled = false;

        if (App::$app->session->getFlash('form')) {
            $data = App::$app->session->getFlash('form');
            App::$app->session->remove('form');
            $isFilled = true;

            foreach ($data as $key => $value) {
                $this->params += [$key => $value];
            }
        }

        $this->params += ['isFilled' => $isFilled];

        App::$app->router->renderView($this->page, $this->params);
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

    public function addToParams(string $param, $value)
    {
        $this->params += [$param => $value];
    }
}
