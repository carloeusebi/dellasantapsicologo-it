<?php

namespace app;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use app\config\Config;

class Mailer
{

    public function send($emailTo, $subject, $message, $emailFrom = '', $name = '')
    {

        $mail = new PHPMailer(true);

        if ($emailFrom !== '') {
            $mail->AddReplyTo($emailFrom, $name);
        }

        try {
            $mail->SMTPAuth = true;

            $mail->Host = Config::$mailHost;
            $mail->Username = Config::$mailUsername;
            $mail->Password = Config::$mailPassword;

            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            // $mail->SMTPSecure = 'tls';

            $mail->Port = 587;

            $mail->isSMTP();
            $mail->isHTML(true);

            // $mail->SMTPDebug = 2;

            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ]
            ];

            $mail->setFrom("contactme@dellasantapsicologo.it", "Dr Federico Dellasanta");
            $mail->addAddress($emailTo);
            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();

            return true;
        } catch (Exception) {

            $error = $mail->ErrorInfo;
            updateLog(4, $error);

            $_SESSION['status'] = "Qualcosa è andato storto, per favore riprovare più tardi";

            return false;
        }

        $mail->ClearAllRecipients();
    }
}
