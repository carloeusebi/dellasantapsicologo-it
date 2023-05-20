<?php

use \Verifalia\VerifaliaRestClient;

require '../vendor/autoload.php';
include 'config/credentials.php';

function sendDebugEmail($mail, $message){
    
    $mail->addAddress('carloeusebi@gmail.com');
    $mail->Subject = 'Debug email from dellasantapsicologo.it';
    $mail->Body = $message;
    $mail->send();    
}


function validateEmail($emailFrom, $mail){

    if (isset($_POST['miele-cb'])){

        $_SESSION['status'] = 'Qualcosa è andato storto, riprovare';

        sendDebugEmail($mail, 'Someone checked the honeybox and tried to send an email');  

        header("Location: $location");

        return false;
        
    } else if (filter_var($emailFrom, FILTER_VALIDATE_EMAIL) === false){

        $_SESSION['status'] = 'Formato Email non valido, deve contenere una @ e un .it o .com';

        return false;

    } else {
        
        include 'config/credentials.php';        

        $verifalia = new VerifaliaRestClient([
            'username' => $verifaliaUsername,
            'password' => $verifaliaPassword
        ]);
        
        //verify if the address is deliverable
        $validation = $verifalia->emailValidations->submit($emailFrom, true);        
        $entry = $validation->entries[0];

        if ($entry->classification === 'Undeliverable'){

            $_SESSION['status'] = 'Email non valida, per favore riprovare con un indirizzo valido';

            sendDebugEmail($mail, 'Someone tried to send the form with an undeliverable email address');

            header("Location: $location");
            
            return false;

        } else {

            return true;

        }
    }
    
    return true;
}