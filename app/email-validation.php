<?php

function validateEmail($emailFrom, $mail, $verifalia){

    $balance = $verifalia
    ->credits
    ->getBalance();

    if (isset($_POST['miele-cb'])){

        $_SESSION['status'] = 'sei un bot';
        
        // ? send an email to let know a bot tried to compile the form
        $mail->addAddress('carloeusebi@gmail.com');
        $mail->Subject = 'A bot tried to complie the form';
        $mail->Body = 'A bot tried to complie the form';
        $mail->send();

        header("Location: $location");

        return false;
        
    } else if (filter_var($emailFrom, FILTER_VALIDATE_EMAIL) === false){

        $_SESSION['status'] = 'Formato Email non valido, deve contenere una @ e un .it o .com';

        return false;

    } else if ($balance->freeCredits > 0){
 
        $validation = $verifalia
        ->emailValidations
        ->submit($emailFrom, true);
        
        $entry = $validation->entries[0];

        if ($entry->classification === 'Undeliverable'){

            $_SESSION['status'] = 'Email non valida';
            header("Location: $location");
            
            return false;

        } else {

            return true;

        }
    }
    
    return true;
}