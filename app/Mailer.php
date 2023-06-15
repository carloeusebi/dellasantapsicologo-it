<?php

namespace app;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use app\config\Config;

class Mailer
{
    private const EMAIL_FROM = "contactme@dellasantapsicologo.it";
    private const EMAIL_NAME = "Dr Federico Dellasanta";

    private $name;
    private $phone;
    private $emailFrom;
    private $message;
    private $emailTo;
    private $subject;
    private $body;


    public function prepare()
    {
        $this->name = htmlspecialchars($_POST['name']);
        $this->phone = htmlspecialchars($_POST['phone']);
        $this->emailFrom = htmlspecialchars($_POST['mail']);
        $this->message = htmlspecialchars($_POST['message']);

        $this->emailTo = 'carloeusebi@gmail.com';
        $this->subject = 'Un cliente ti ha scritto';
        $this->body =
            "Da: $this->name <br>
            Numero di telefono: $this->phone <br>
            Email: $this->emailFrom <br><br>
            Messaggio:<br> $this->message";

        $validator = new Validator;

        return $validator->validateMail($this->emailFrom);
    }


    public function send()
    {
        $mail = new PHPMailer(true);

        $mail->AddReplyTo($this->emailFrom, $this->name);


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

            $mail->setFrom(self::EMAIL_FROM, self::EMAIL_NAME);
            $mail->addAddress($this->emailTo);
            $mail->Subject = $this->subject;
            $mail->Body = $this->body;

            $mail->send();

            $mail->ClearAllRecipients();

            return false;
        } catch (Exception) {

            $error = $mail->ErrorInfo;
            $this->updateLog(4, $error);

            return "Qualcosa è andato storto, per favore riprovare più tardi";
        }
    }



    public static function updateLog($code, $error = '')
    {
        $filePath = __DIR__ . '/../public/log.txt';

        fopen($filePath, 'a+');


        $message = match ($code) {
            1 => "An email was succesfully sent.",
            2 => "Form was submitted with honeybox checked.",
            3 => "Form was submitted with an undeliverable email.",
            4 => $error,
            default => "Something went unexpected.",
        };

        $message = $code . ' - ' . $date . ' - ' . $message . PHP_EOL;

        file_put_contents($filePath, $message, FILE_APPEND);
    }
}
