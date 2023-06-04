<?php

namespace app;

use app\db\Database;

class App
{

    public static App $app;
    public Router $router;
    public Database $db;

    public function __construct()
    {
        $this->router = new Router();
        $this->db = new Database();

        self::$app = $this;
    }

    public function run()
    {
        $this->router->resolve();
    }
}
