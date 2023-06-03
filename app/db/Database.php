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

            echo '<pre>';
            var_dump($e->getMessage());
            echo '</pre>';
            exit;
        }

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        self::$db = $this;
    }

    public function getQuestions($search)
    {

        $query = 'SELECT * FROM test ';

        if ($search) $query .= 'WHERE question LIKE :search ';

        $query .= "ORDER BY id";

        $statement = $this->pdo->prepare($query);

        if ($search) $statement->bindValue('search', "%$search%");

        try {

            $statement->execute();

            $questions = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $questions;
        } catch (Exception $e) {
            echo '<pre>';
            var_dump($e->getMessage());
            echo '</pre>';
            exit;
        }
    }
}
