<?php

namespace app\controllers;

use app\App;

class QuestionsController extends AdminController
{

    public static function index($page)
    {
        $admin = new parent($page);

        $admin->GetQuestions();

        $admin->renderPage();
    }


    public static function create()
    {
    }


    public static function update()
    {
    }


    public static function delete()
    {
    }
}
