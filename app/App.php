<?php

namespace app;

use app\db\Database;
use app\models\Patient;
use app\models\Question;
use app\models\Survey;

class App
{

    public static App $app;
    public Router $router;
    public Database $db;
    public Session $session;
    public Patient $patient;
    public Question $question;
    public Survey $survey;

    public function __construct()
    {
        $this->router = new Router();
        $this->session = new Session();

        self::$app = $this;
    }

    public function connect()
    {
        $this->db = new Database();
        $this->patient = new Patient();
        $this->question = new Question();
        $this->survey = new Survey();
    }

    public function run()
    {
        $this->router->resolve();
    }
}
