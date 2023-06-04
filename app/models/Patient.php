<?php

namespace app\models;

use app\db\Database;
use Exception;

class Patient
{

    public $id;
    public $fname;
    public $lname;
    public $age;
    public $birthday;
    public $birthplace;
    public $address;
    public $fiscalcode;
    public $begin;
    public $email;
    public $phone;
    public $consent;
    public $weight;
    public $height;
    public $job;
    public $sex;
    public $cohabitants;
    public $username;

    public function load($data)
    {

        foreach ($data as $key => $value) {

            $this->$key = $value ?? null;
        }
    }

    public function save()
    {

        $errors = [];

        $usernameFirst = strtolower(preg_replace('/\s+/', '', $this->fname));
        $usernameLast = strtolower(preg_replace('/\s+/', '', $this->lname));

        $this->username = $usernameFirst . '.' . $usernameLast;

        if (!$this->fname) $errors['fname'] = "Il nome è obbligatorio";
        if (!$this->lname) $errors['lname'] = "Il cognome è obbligatorio";
        if (!$this->birthday) $errors['birthday'] = "La data di nascita è obbligatiora";
        if (!$this->begin) $errors['begin'] = "La data di inizio terapia è obbligatorio";

        if (empty($errors)) {

            try {

                if ($this->id) Database::$db->updatePatient($this);
                else Database::$db->createPatient($this);
            } catch (Exception $e) {

                dd($e);
            }
        }

        return $errors;
    }
}
