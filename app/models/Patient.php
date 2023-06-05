<?php

namespace app\models;

use app\db\Database;
use app\db\DbModel;
use Exception;

class Patient extends DbModel
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

    public static function tableName(): string
    {
        return 'patients';
    }

    public function attributes(): array
    {
        return [
            'fname', 'lname', 'age', 'birthday', 'birthplace', 'address', 'fiscalcode', 'begin', 'email', 'phone', 'consent', 'weight', 'height', 'job', 'sex', 'cohabitants', 'username', 'id'
        ];
    }

    public function labels(): array
    {
        return [
            'fname' => 'Nome',
            'lname' => 'Cognome',
            'age' => 'Età',
            'birthday' => 'Data di nascita',
            'birthplace' => 'Luogo di nascita',
            'address' => 'Indirizzo',
            'fiscalcode' => 'Codice Fiscale',
            'begin' => 'Data di inizio Terapia',
            'email' => 'Email',
            'phone' => 'Numero di Telefono',
            'consent' => 'Consenso',
            'weight' => 'Peso',
            'height' => 'Altezza',
            'job' => 'Occupazione',
            'sex' => 'Sesso',
            'cohabitants' => 'Conviventi',
            'username' => 'Username'
        ];
    }

    public function load($data)
    {

        foreach ($data as $key => $value) {

            $this->$key = trim($value) ?? null;
        }
    }

    public function get($search = '', $order = 'id', $type = 'asc')
    {
        return parent::get($search, $order, $type);
    }

    public function save()
    {

        $errors = [];

        $usernameFirst = strtolower(preg_replace('/\s+/', '', $this->fname));
        $usernameLast = strtolower(preg_replace('/\s+/', '', $this->lname));

        $this->username = $usernameFirst . '.' . $usernameLast;

        if ($this->checkIfExists()) $errors['exists'] = '<em>Un Paziente con questno nome esiste già!!</em>';


        if (!$this->fname) $errors['fname'] = "Il nome è obbligatorio";
        if (!$this->lname) $errors['lname'] = "Il cognome è obbligatorio";
        if (!$this->birthday) $errors['birthday'] = "La data di nascita è obbligatiora";
        if (!$this->begin) $errors['begin'] = "La data di inizio terapia è obbligatorio";

        if (empty($errors)) {

            if ($this->id) parent::update();
            else parent::create();
        }

        return $errors;
    }

    public function delete($id)
    {
        parent::delete($id);
    }

    private function checkIfExists()
    {
        $patients = self::get();

        foreach ($patients as $patient) {

            if ($this->fname === $patient['fname'] && $this->lname === $patient['lname'] && $this->id != $patient['id']) return true;
        }

        return false;
    }
}
