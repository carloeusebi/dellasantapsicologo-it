<?php

namespace app;

use app\db\Database;
use app\models\Patient;

class App
{

    public static App $app;
    public Router $router;
    public Database $db;
    public Session $session;
    public Patient $patient;

    public function __construct()
    {
        $this->router = new Router();
        $this->db = new Database();
        $this->session = new Session();
        $this->patient = new Patient();

        self::$app = $this;
    }

    public function run()
    {
        $this->router->resolve();
    }
}
