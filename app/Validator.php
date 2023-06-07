<?php


namespace app;

use \Verifalia\VerifaliaRestClient;
use app\config\Config;

class Validator
{

    private function checkBalance($verifalia)
    {
        $balance = $verifalia->credits->getBalance();
        return ($balance->freeCredits > 0);
    }

    private function checkIfBot()
    {
        if (isset($_POST['miele-cb'])) {
            Mailer::updateLog(2);
            return 'Qualcosa è andato storto, riprovare';
        }
        return false;
    }

    private function checkIfValid($emailFrom)
    {
        if (filter_var($emailFrom, FILTER_VALIDATE_EMAIL) === false) {
            return 'Formato Email non valido, deve contenere una @ e un .it o .com';
        }
        return false;
    }

    private function checkIfDeliverable($emailFrom)
    {
        $verifalia = new VerifaliaRestClient([
            'username' => Config::VERIFALIA_USERNAME,
            'password' => Config::VERIFALIA_PASSWORD
        ]);

        if (!$this->checkBalance($verifalia)) {
            return false;
        }

        $validation = $verifalia->emailValidations->submit($emailFrom, true);
        $entry = $validation->entries[0];

        if ($entry->classification === 'Undeliverable') {
            Mailer::updateLog(3);
            return 'Email non valida, per favore riprovare con un indirizzo valido';
        }
        return false;
    }

    public function validateMail($emailFrom)
    {
        $status = $this->checkIfBot();
        if ($status) return $status;

        $status = $this->checkIfValid($emailFrom);
        if ($status) return $status;

        $status = $this->checkIfDeliverable($emailFrom);
        if ($status) return $status;

        return false;
    }
}
