<?php

namespace app;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use app\config\Config;
use app\controllers\Controller;

class Mailer
{
    private const EMAIL_FROM = "contactme@dellasantapsicologo.it";
    private const EMAIL_NAME = "Dr Federico Dellasanta";

    public function send($emailTo, $subject, $message, $emailFrom = '', $name = '')
    {

        $mail = new PHPMailer(true);

        if ($emailFrom !== '') {
            $mail->AddReplyTo($emailFrom, $name);
        }

        try {
            $mail->SMTPAuth = true;

            $mail->Host = Config::MAIL_HOST;
            $mail->Username = Config::MAIL_USERNAME;
            $mail->Password = Config::MAIL_PASSWORD;

            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            // $mail->SMTPSecure = 'tls';
            // $mail->SMTPDebug = 2;

            $mail->Port = 587;

            $mail->isSMTP();
            $mail->isHTML(true);

            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ]
            ];

            $mail->setFrom(Mailer::EMAIL_FROM, Mailer::EMAIL_NAME);
            $mail->addAddress($emailTo);
            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();

            $mail->ClearAllRecipients();

            return false;
        } catch (Exception) {

            $error = $mail->ErrorInfo;
            Controller::updateLog(4, $error);

            return "Qualcosa è andato storto, per favore riprovare più tardi";
        }
    }
}
