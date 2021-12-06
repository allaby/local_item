<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
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

        $mail = new Mailer(true);
        return $mail;
    }
}
