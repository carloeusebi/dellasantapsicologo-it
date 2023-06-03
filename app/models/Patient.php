<?php

namespace app\models;

use app\db\Database;
use Exception;

class Patient
{

    public $id;
    public $fname;
    public $lname;
    //TODO ADD ALL FIELDS

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
