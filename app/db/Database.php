<?php

namespace app\db;

use app\config\Config;
use PDO;
use Exception;

class Database
{
    private $pdo;

    public static $db;

    public function __construct()
    {
        $user = Config::DB_USERNAME;
        $password = Config::DB_PASSWORD;
        $host = Config::DB_HOST;
        $db_name = Config::DB_NAME;

        $dsn = "mysql:host=$host;dbname=$db_name;charset=utf8mb4";

        try {

            $this->pdo = new PDO($dsn, $user, $password);
        } catch (Exception $e) {

            dd($e);
        }

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        self::$db = $this;
    }

    public function prepare($query)
    {
        return $this->pdo->prepare($query);
    }


    public function getLastInsertId()
    {
        return $this->pdo->lastInsertId();
    }
}
