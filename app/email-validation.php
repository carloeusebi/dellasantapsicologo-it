<?php

namespace App;

use \Verifalia\VerifaliaRestClient;

require '../vendor/autoload.php';

class Validator
{

    private function checkVerifalia($verifalia)
    {
        $balance = $verifalia->credits->getBalance();

        return ($balance->freeCredits > 0);
    }

    public function checkIfBot()
    {

        if (isset($_POST['miele-cb'])) {

            $_SESSION['status'] = 'Qualcosa è andato storto, riprovare';

            updateLog(2);

            return true;
        }
        return false;
    }

    public function checkIfValid($emailFrom)
    {
        if (filter_var($emailFrom, FILTER_VALIDATE_EMAIL) === false) {

            $_SESSION['status'] = 'Formato Email non valido, deve contenere una @ e un .it o .com';

            return true;
        }
        return false;
    }

    public function checkIfDeliverable($emailFrom)
    {
        include 'config/config.php';

        $verifalia = new VerifaliaRestClient([
            'username' => $verifaliaUsername,
            'password' => $verifaliaPassword
        ]);

        if ($this->checkVerifalia($verifalia)) {

            $validation = $verifalia->emailValidations->submit($emailFrom, true);
            $entry = $validation->entries[0];

            if ($entry->classification === 'Undeliverable') {

                $_SESSION['status'] = 'Email non valida, per favore riprovare con un indirizzo valido';

                updateLog(3);

                return true;
            }
            return false;
        }
        return false;
    }
}
