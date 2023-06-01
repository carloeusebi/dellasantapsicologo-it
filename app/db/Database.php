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

        $dsn = "mysql:host=$host;dbname=$db_name";

        try {

            $this->pdo = new PDO($dsn, $user, $password);
        } catch (Exception $e) {

            echo '<pre>';
            var_dump($e->getMessage());
            echo '</pre>';
            exit;
        }

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        self::$db = $this;
    }

    public function getQuestions()
    {

        $query = 'SELECT * FROM test ORDER BY id';

        $statement = $this->pdo->prepare($query);

        try {
            $statement->execute();
            $teams = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $teams;
        } catch (Exception $e) {
            echo '<pre>';
            var_dump($e->getMessage());
            echo '</pre>';
            exit;
        }
    }
}
