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

        if (self::isLogged()) {

            $admin->addToParams('surveys', $_SESSION['surveys'])
                ->addToParams('isFilled', true)
                ->addToParams('test', true);

            foreach ($_SESSION['user'] as $key => $value) {
                $admin->addToParams($key, $value);
            }
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


    public static function updatePatientInformation()
    {
        header('Content-Type: application/json');

        if (self::isLogged()) {

            $errors = [];

            $data = (array) json_decode(file_get_contents("php://input"));

            App::$app->connect();
            App::$app->patient->load($data);
            $errors = App::$app->patient->save();

            if (empty($errors)) {
                http_response_code('201');
                echo json_encode('success');
            }
        } else {
            http_response_code('401');
        }
    }



    private static function isLogged()
    {
        return isset($_SESSION['login']) ? $_SESSION['login'] : false;
    }
}
