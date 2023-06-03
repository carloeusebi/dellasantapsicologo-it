<?php

namespace app\db;

use app\config\Config;
use app\models\Patient;
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

    public function getPatients($search)
    {

        $query = 'SELECT * FROM patients ';

        if ($search) $query .= 'WHERE question LIKE :search ';

        $query .= "ORDER BY id";

        $statement = $this->pdo->prepare($query);

        if ($search) $statement->bindValue('search', "%$search%");

        try {

            $statement->execute();

            $patients = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $patients;
        } catch (Exception $e) {

            dd($e);
        }
    }

    public function updatePatient(Patient $patient)
    {
    }

    public function createPatient(Patient $patient)
    {
        $statement = $this->pdo->prepare('INSERT INTO patients (fname, lname) VALUES (:fname, :lname)');

        $statement->bindValue('fname', $patient->fname);
        $statement->bindValue('lname', $patient->lname);

        try {

            $statement->execute();
        } catch (Exception $e) {

            dd($e);
        }
    }
}
