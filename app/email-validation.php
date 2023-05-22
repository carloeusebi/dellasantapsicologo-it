<?php

use \Verifalia\VerifaliaRestClient;

require '../vendor/autoload.php';
require '../stats/stats-update.php';

function validateEmail($emailFrom)
{

    if (isset($_POST['miele-cb'])) {

        $_SESSION['status'] = 'Qualcosa è andato storto, riprovare';

        sendDebugEmail('Someone checked the honeybox and tried to send an email');

        statsFormUpdate(2);

        return false;
    } else if (filter_var($emailFrom, FILTER_VALIDATE_EMAIL) === false) {

        $_SESSION['status'] = 'Formato Email non valido, deve contenere una @ e un .it o .com';

        return false;
    } else {

        include 'config/config.php';

        $verifalia = new VerifaliaRestClient([
            'username' => $verifaliaUsername,
            'password' => $verifaliaPassword
        ]);

        $balance = $verifalia->credits->getBalance();

        // check verifalia only if account has credits
        if ($balance->freeCredits > 0) {

            //verify if the address is deliverable
            $validation = $verifalia->emailValidations->submit($emailFrom, true);
            $entry = $validation->entries[0];

            if ($entry->classification === 'Undeliverable') {

                $_SESSION['status'] = 'Email non valida, per favore riprovare con un indirizzo valido';

                sendDebugEmail('Someone tried to send the form with an undeliverable email address');

                statsFormUpdate(3);

                return false;
            }
            return true;
        }
        return true;
    }

    return true;
}
