<?php

namespace app\controllers;

use app\App;

class TestsController extends Controller
{
    protected string $LOGIN_VIEW = '/sondaggio';

    protected $layout = 'test';


    private function __constructor()
    {
        App::$app->connect();
    }


    public static function index($page)
    {
        $admin = new self();

        $admin->page = $page;

        $admin->renderPage();
    }
}
