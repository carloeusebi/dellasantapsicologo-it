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

    public function getPatients($search = '')
    {

        $query = 'SELECT * FROM patients ';

        if ($search) $query .= 'WHERE fname LIKE :search OR lname LIKE :search ';

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
        $query = 'UPDATE patients SET fname=:fname, lname=:lname, age=:age, birthday=:birthday, birthplace=:birthplace, address=:address, fiscalcode=:fiscalcode, begin=:begin, email=:email, phone=:phone, weight=:weight, height=:height, job=:job, sex=:sex, cohabitants=:cohabitants, username=:username';

        $statement = $this->pdo->prepare($query);

        $this->bindStatement($statement, $patient);

        try {

            $statement->execute();
        } catch (Exception $e) {

            dd($e);
        }
    }

    public function createPatient(Patient $patient)
    {
        $query = 'INSERT INTO patients (fname, lname, age, birthday, birthplace, address, fiscalcode, begin, email, phone, weight, height, job, sex, cohabitants, username) VALUES (:fname, :lname, :age, :birthday, :birthplace, :address, :fiscalcode, :begin, :email, :phone, :weight, :height, :job, :sex, :cohabitants, :username)';

        $statement = $this->pdo->prepare($query);

        $this->bindStatement($statement, $patient);

        try {

            $statement->execute();
        } catch (Exception $e) {

            dd($e);
        }
    }

    public function deletePatient($id)
    {

        $statement = $this->pdo->prepare('DELETE FROM patients WHERE id = :id');

        $statement->bindValue('id', $id);

        try {

            $statement->execute();
        } catch (Exception $e) {

            dd($e);
        }
    }

    private function bindStatement($statement, Patient $patient)
    {
        $statement->bindValue('fname', $patient->fname);
        $statement->bindValue('lname', $patient->lname);
        $statement->bindValue('age', $patient->age);
        $statement->bindValue('birthday', $patient->birthday);
        $statement->bindValue('birthplace', $patient->birthplace);
        $statement->bindValue('address', $patient->address);
        $statement->bindValue('fiscalcode', $patient->fiscalcode);
        $statement->bindValue('begin', $patient->begin);
        $statement->bindValue('email', $patient->email);
        $statement->bindValue('phone', $patient->phone);
        $statement->bindValue('weight', $patient->weight);
        $statement->bindValue('height', $patient->height);
        $statement->bindValue('job', $patient->job);
        $statement->bindValue('sex', $patient->sex);
        $statement->bindValue('cohabitants', $patient->cohabitants);
        $statement->bindValue('username', $patient->username);
    }
}
