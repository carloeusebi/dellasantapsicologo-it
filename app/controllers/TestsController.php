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
    }


    public static function login()
    {
        $data = (array) json_decode(file_get_contents("php://input"));

        $username = isset($data['username']) ? strtolower(trim($data['username'])) : null;

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
            http_response_code('401');

            $response = [
                "status" => "404",
                "response" => "unauthorized"
            ];

            echo json_encode($response);
        } else {
            $_SESSION['login'] = $user['id'];
            http_response_code('200');

            $response = [
                "status" => 200,
                "user" => $user,
                "surveys" => $userSurveys
            ];

            echo json_encode($response);

            $_SESSION['user'] = $user;
            $_SESSION['surveys'] = $userSurveys;
        }
    }


    public static function update_patient_info()
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

    public static function update_survey()
    {
        header('Content-Type: application/json');

        if (self::isLogged()) {

            $data = (array) json_decode(file_get_contents("php://input"));

            //todo

        } else {
            http_response_code('401');
        }
    }


    public static function logout()
    {
        session_destroy();
        http_response_code('204');
    }


    private static function isLogged()
    {
        return isset($_SESSION['login']) ? $_SESSION['login'] : false;
    }
}
