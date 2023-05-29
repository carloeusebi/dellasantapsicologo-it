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
            $_SESSION['status'] = 'Qualcosa è andato storto, riprovare';
            updateLog(2);
            return true;
        }
        return false;
    }

    private function checkIfValid($emailFrom)
    {
        if (filter_var($emailFrom, FILTER_VALIDATE_EMAIL) === false) {
            $_SESSION['status'] = 'Formato Email non valido, deve contenere una @ e un .it o .com';
            return true;
        }
        return false;
    }

    private function checkIfDeliverable($emailFrom)
    {
        include 'config/config.php';

        $verifalia = new VerifaliaRestClient([
            'username' => Config::$verifaliaUsername,
            'password' => Config::$verifaliaPassword
        ]);

        if (!$this->checkBalance($verifalia)) {
            return false;
        }

        $validation = $verifalia->emailValidations->submit($emailFrom, true);
        $entry = $validation->entries[0];

        if ($entry->classification === 'Undeliverable') {
            $_SESSION['status'] = 'Email non valida, per favore riprovare con un indirizzo valido';
            updateLog(3);
            return true;
        }
        return false;
    }

    public function validateMail($emailFrom)
    {
        // if any of the checks returns TRUE it means that something is wrong and we should not send the email
        if ($this->checkIfBot() || $this->checkIfValid($emailFrom) || $this->checkIfDeliverable($emailFrom)) {
            return true;
        }

        return false;
    }
}
