<?php

namespace app\controllers;

use app\App;
use app\config\Config;

class AdminController extends Controller
{
    protected const LAYOUT = 'admin';
    protected const ADMIN_VIEW = 'admin';
    protected const ADMIN_404 = '/admin/404';
    protected string $LOGIN_VIEW = '/login';

    protected static $notFound = 'Pagina non trovata';
    protected string $layout = self::LAYOUT;

    protected static $created;
    protected static $updated;
    protected static $deleted;

    protected static $header;

    protected static $model;


    protected function __construct($page = '')
    {
        $this->page = $page;

        $loggedIn = $this->checkIfLogged();

        if (!$loggedIn) {

            if (isset($_POST['login'])) $this->login();
            else {
                if ($this->page !== '/admin') header('Location: /admin');
                $this->renderLogin();
            }

            exit();
        }

        App::$app->connect();
    }


    public static function index($page)
    {
        $admin = new self($page);

        $admin->renderPage();
    }


    protected function get()
    {
        $entries = App::$app->{self::$model}->get();
        $this->addToParams('entries', $entries);
        return $entries;
    }


    protected function getById($id)
    {
        $gotById = App::$app->{self::$model}->getById($id);
        $this->addToParams('element', $gotById);
        return $gotById;
    }


    protected function getId()
    {
        return $_GET['id'] ?? null;
    }


    protected static function save()
    {
        $errors = [];

        $id = $_POST['id'];

        $message = $id ? self::$updated : self::$created;

        foreach ($_POST as $key => $value) {
            $data[$key] = $value;
        }

        App::$app->connect();
        App::$app->{self::$model}->load($data);
        $errors = App::$app->{self::$model}->save();

        if (empty($errors)) {

            App::$app->session->setFlash('success', $message);
        } else {

            App::$app->session->setFlash('form', $data);
            App::$app->session->setFlash('errors', $errors);
        }

        $id = $id ?? App::$app->db->getLastInsertId();

        $location = $id === '0' ? self::$header : self::$header . '?id=' . $id;

        header($location);
    }


    protected static function delete()
    {
        if (!App::$app->router->isPost()) self::render404(self::$notFound);

        App::$app->connect();
        App::$app->{self::$model}->delete($_POST['id']);
        App::$app->session->setFlash('success', self::$deleted);

        header(self::$header);
    }


    protected static function render404($notFound)
    {
        App::$app->router->setLayout(self::LAYOUT);
        App::$app->router->renderView(self::ADMIN_404, ['notFound' => $notFound]);
    }


    public static function login()
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($username === Config::ADMIN_USERNAME && $password === Config::ADMIN_PASSWORD) {

            $_SESSION['login'] = 'ADMIN';
        } else {

            App::$app->session->setFlash('isInvalid', true);
        }

        header("Location: /admin");
    }


    protected function renderLogin()
    {
        App::$app->router->renderOnlyView($this->LOGIN_VIEW, $this->params);
    }


    protected static function checkIfLogged()
    {
        return isset($_SESSION['login']) && $_SESSION['login'] === 'ADMIN';
    }
}
