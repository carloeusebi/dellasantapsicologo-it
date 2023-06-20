<?php

namespace app\controllers;

use app\App;

class TestsController extends Controller
{
    protected const VIEW = '/test';

    protected string $page = '/test';
    protected string $layout = 'test';


    private function __constructor()
    {
        App::$app->connect();
    }


    public static function index()
    {
        $admin = new self();

        if ($admin->isLogged()) {
            $admin->addToParams('user', $_SESSION['user'])
                ->addToParams('surveys', $_SESSION['surveys']);
        }

        $admin->renderPage();
    }


    public static function login()
    {
        $admin = new self();

        $username = strtolower(trim($_POST['name'])) ?? null;

        App::$app->connect();

        $patients = App::$app->patient->get();
        $surveys = App::$app->survey->get();

        $user = null;
        $userSurveys = [];

        foreach ($patients as $patient) {
            if ($patient['username'] === $username) {
                $user = $patient;
                break;
            }
        }

        if ($user) {
            foreach ($surveys as $survey) {
                if ($survey['patient_id'] === $user['id'] && !$survey['completed']) {
                    array_push($userSurveys, $survey);
                }
            }
        }

        if (empty($userSurveys)) {
            App::$app->session->setFlash('isInvalid', 'Username sbagliato, oppure non ci sono test da compilare per te');
        } else {
            $_SESSION['login'] = $user['id'];
            $_SESSION['user'] = $user;
            $_SESSION['surveys'] = $userSurveys;
        }

        header('Location: ' . self::VIEW);

        $admin->renderPage();
    }


    private function isLogged()
    {
        return isset($_SESSION['login']) ? $_SESSION['login'] : false;
    }
}
