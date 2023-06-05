<?php

namespace app;

use app\db\Database;
use app\models\Patient;
use app\models\Question;

class App
{

    public static App $app;
    public Router $router;
    public Database $db;
    public Session $session;
    public Patient $patient;
    public Question $question;

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
    }

    public function run()
    {
        $this->router->resolve();
    }
}
