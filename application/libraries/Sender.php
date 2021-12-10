<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Sender
{

    public function __construct()
    {
        log_message('Debug', 'Mailer class is loaded');
    }

    public function load()
    {
        require_once APPPATH . 'third_party/PHPMailer/src/Exception.php';
        require_once APPPATH . 'third_party/PHPMailer/src/PHPMailer.php';
        require_once APPPATH . 'third_party/PHPMailer/src/SMTP.php';

        $mail = new PHPMailer(true);

        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'allabytell94em@gmail.com';                     //SMTP username
        $mail->Password   = '@imer123';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;

        return $mail;
    }
}
