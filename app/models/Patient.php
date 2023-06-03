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

    public function load($data)
    {

        foreach ($data as $key => $value) {

            $this->$key = $value ?? null;
        }
    }

    public function save()
    {

        $errors = [];

        if (!$this->fname) $errors['fname'] = "Il nome è obbligatorio";
        if (!$this->lname) $errors['lname'] = "Il cognome è obbligatorio";
        if (!$this->email) $errors['email'] = "L'email è obbligatiora";
        if (!$this->fiscalcode) $errors['fiscalcode'] = "Il CF è obbligatorio";

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
