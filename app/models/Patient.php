<?php

namespace app\models;

use app\db\DbModel;

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
    public $MAX_FILE_SIZE;

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

    public function save()
    {
        $errors = [];

        // dd($_FILES['consent']);

        $usernameFirst = strtolower(preg_replace('/\s+/', '', $this->fname));
        $usernameLast = strtolower(preg_replace('/\s+/', '', $this->lname));

        $this->username = $usernameFirst . '.' . $usernameLast;

        if ($this->checkIfExists()) $errors['exists'] = '<em>Un Paziente con questo nome esiste già!!</em>';

        // obligatory fields
        if (!$this->fname) $errors['fname'] = "Il nome è obbligatorio.";
        if (!$this->lname) $errors['lname'] = "Il cognome è obbligatorio.";
        if (!$this->birthday) $errors['birthday'] = "La data di nascita è obbligatiora.";
        if (!$this->begin) $errors['begin'] = "La data di inizio terapia è obbligatorio.";

        // errors with file upload
        if ($this->checkFileType()) $errors['not-pdf'] = 'Si possono caricare solamente files in formato PDF.';
        if ($_FILES['consent']['error'] === 2) $errors['max-size'] = 'La dimensione del file non può superare 1MB.';


        $this->sex = strtoupper($this->sex);

        if (empty($errors)) {

            // file upload
            if (isset($_FILES['consent'])) {
                $filename = preg_replace("/\s+/", "_", $_FILES['consent']['name']);
                $filename = '/uploads/' . rand(1000, 10000) . "-" . $filename;
                $filepath = __DIR__ . '/../../public' .  $filename;

                move_uploaded_file($_FILES['consent']['tmp_name'], $filepath);

                $this->consent = $filename;
            }

            if ($this->id) parent::update();
            else parent::create();
        }

        return $errors;
    }

    private function checkIfExists()
    {
        $patients = parent::get();

        foreach ($patients as $patient) {

            if ($this->fname === $patient['fname'] && $this->lname === $patient['lname'] && $this->id != $patient['id']) return true;
        }

        return false;
    }


    private function checkFileType()
    {
        return isset($_FILES['consent']['type']) && $_FILES['consent']['type'] !== 'application/pdf' && ($_FILES['consent']['type']) !== '';
    }
}
