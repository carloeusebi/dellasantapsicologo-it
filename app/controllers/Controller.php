<?php

namespace app\controllers;

use app\App;

class Controller
{
    protected array $params = [];
    protected string $page;
    protected string $LOGIN_VIEW = '';

    protected string $layout;


    protected function addToParams(string $param, $value)
    {
        $this->params[$param] = $value;
        return $this;
    }


    protected function renderPage()
    {
        App::$app->router->setLayout($this->layout);
        App::$app->router->renderView($this->page, $this->params);
    }


    public static function logout()
    {
        $location = App::$app->router->getPreviousPage();
        session_destroy();
        header("Location: $location");
        exit();
    }
}
