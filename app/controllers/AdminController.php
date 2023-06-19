<?php

namespace app\controllers;

use app\App;

class AdminController extends Controller
{
    protected const LAYOUT = 'admin';
    protected const ADMIN_VIEW = 'admin';
    protected const ADMIN_404 = '/admin/404';

    protected static $notFound = 'Pagina non trovata';
    protected $layout = self::LAYOUT;

    protected static $created;
    protected static $updated;
    protected static $deleted;

    protected static $header;

    protected static $model;


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


    public static function save()
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


    public static function delete()
    {
        if (!App::$app->router->isPost()) self::render404(self::$notFound);

        App::$app->connect();
        App::$app->{self::$model}->delete($_POST['id']);
        App::$app->session->setFlash('success', self::$deleted);

        header(self::$header);
    }

    public static function render404($notFound)
    {
        App::$app->router->setLayout(self::LAYOUT);
        App::$app->router->renderView(self::ADMIN_404, ['notFound' => $notFound]);
    }
}
