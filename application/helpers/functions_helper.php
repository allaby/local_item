<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Role: Genere un numero a partir du dernier numero de la table
 * @parametres: string $table , $champs , $prefixe
 * @retourne: string  ou int
 */
if (!function_exists('genereateNumero')) {
    function generateNumero($table, $champs, $prefixe = FALSE, $lenght = FALSE)
    {
        //Recupere le derniere code ou numero
        $ci = &get_instance();
        $ci->load->database();
        if (empty($prefixe))
            $query = $ci->db->select_max($champs)->get($table);
        if ($prefixe) $query = $ci->db->select($champs)
            ->where($champs . " like '" . $prefixe . "%'")
            ->order_by($champs, "DESC")
            ->limit(1)
            ->get($table);
        $resultat = $query->row_array();

        $prefixe_len = strlen($prefixe);
        $code = $resultat[$champs];
        $number = 0;
        if (!empty($code)) {
            $number = substr($code, $prefixe_len);
        }
        $number++;
        if ($lenght == FALSE)
            return $prefixe . $number;
        $number_len = $lenght - $prefixe_len;
        return $prefixe . sprintf('%0' .  $number_len . 'd', $number);
    }
}

/**
 * Role: Formate une date
 * @param date $date
 * @param String $format
 * @return bool|string
 */
if (!function_exists('formatDate')) {
    function formatDate($date, $format)
    {
        if ($date == null) return null;
        $date = str_replace('/', '-', $date);
        $date = new DateTime($date);
        return $date->format($format);
    }
}


if (!function_exists('getExtension')) {
    function getExtension($fileName)
    {
        $fileName_explode  = explode('.', $fileName);
        foreach ($fileName_explode as $chaine) {
            if (strlen($chaine) == 3) {
                $extension = $chaine;
            }
        }
        if (isset($extension)) {
            return $extension;
        } else {
            return FALSE;
        }
    }
}


/**
 * Crypte un mot de passe avec un algorithme asymetrique
 * @param string $password
 * @return string
 */
function crypte($password)
{
    return sha1($password);
}



function get_client_ip()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR')) $ipaddress = getenv('REMOTE_ADDR');
    else $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function getHumanReadableSize($size, $unit = null, $decemals = 2)
{
    $byteUnits = [ // 'o' ,  Ici en televersant les fichier la taille est exprimee en Ko
        'Ko', 'Mo', 'Go', 'To', 'Po', 'Eo', 'Zo', 'Yo'
    ];
    if (!is_null($unit) && !in_array($unit, $byteUnits)) {
        $unit = null;
    }
    $extent = 1;
    foreach ($byteUnits as $rank) {
        if ((is_null($unit) && ($size < $extent <<= 10)) || ($rank == $unit)) {
            break;
        }
    }
    return number_format($size / ($extent >> 10), $decemals) . $rank;
}


function byteConvert($bytes)
{
    if ($bytes == 0) return "0.00 B";
    $s = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
    $e = floor(log($bytes, 1024));
    return round($bytes / pow(1024, $e), 2) . $s[$e];
}


if (!function_exists('getImageDataSrc')) {
    function getImageDataSrc($image_path)
    {
        if (!file_exists($image_path)) return false;
        $image_data = base64_encode(file_get_contents($image_path));
        return "data:" . mime_content_type($image_path) . ";base64," . $image_data;
    }
}

function strip_chars($string)
{
    $string = trim($string);
    str_replace("'", '_', $string);
    $charToChange = array(
        '??' => 'e',
        '??' => 'e',
        '??' => 'e',
        '??' => 'e',
        '??' => 'e',
        '??' => 'e',
        '??' => 'a',
        '??' => 'a',
        '??' => 'a',
        '??' => 'a',
        '??' => 'a',
        '??' => 'a',
        '??' => 'c',
        '??' => 'i',
        '??' => 'i',
        '??' => 'i',
        '??' => 'i',
        '??' => 'n',
        '??' => 'o',
        '??' => 'o',
        '??' => 'o',
        '??' => 'o',
        '??' => 'o',
        '??' => 'u',
        '??' => 'u',
        '??' => 'u',
        '??' => 'u',
        "'" => '_',
        "/" => '_',
        "\"" => '_',
        "|" => '_',
        "(" => '_',
        ")" => '_',
        "???" => '_',
        '???' => '_',
        ' ' => '_',
    );
    $string = strtr($string, $charToChange);
    $string = strtolower($string);
    //	$string = strtoupper($string);
    return $string;
}


/**
 * Genere une chaine de caracteres aleatoire
 * @param int $length 
 * @return string 
 */
function randomToken($length)
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr(str_shuffle($chars), 0, $length);
    return $password;
}

function refomat_date($date, $format = false)
{
    $time = '';
    if (strpos($date, ' ') > 0) {
        $date = explode(' ', $date);
        $time = $date[1];
        $date = $date[0];
    }
    if (!empty($time) && $time != "")
        $time = ' ?? ' . $time;
    $months = array(
        'Janv',
        'F??v',
        'Mar',
        'Avr',
        'Mai',
        'Juin',
        'Juil',
        'Ao??t',
        'Sept',
        'Oct',
        'Nov',
        'D??c'
    );
    $odldate = explode("-", $date);
    $small_date = "";
    if (count($odldate) < 2)
        $date = '01 Janvier 1970';
    else {
        $year = date('Y');
        $today = date('Y-m-d H:m:s');
        $the_date = $date;
        $date = (intval($odldate[2]) == 1 ? '1er' : $odldate[2]) . ' ' . $months[intval($odldate[1]) - 1] . ' ' . $odldate[0];
        $small_date = (intval($odldate[2]) == 1 ? '1er' : $odldate[2]) . ' ' . $months[intval($odldate[1]) - 1];

        $diff = strtotime($today) - strtotime($the_date);

        if ($format != 'full') {
            if ($diff >= 0 && $diff < 86400) {
                $date = "Aujourd'hui";
                $small_date = "Aujourd'hui";
            } else if ($diff >= 0 && $diff >= 86400 && $diff < 172800) {
                $date = "Hier";
                $small_date = "Hier";
            } else if (intval($odldate[0]) == intval($year)) {
                $date = $small_date;
            }
        }
    }

    if ($format == 'time')
        return $time;
    else if ($format == 'date')
        return $date;
    else if ($format == 'small-date')
        return $small_date;

    return $date . $time;
}



function phoneFormat($phone_number)
{
    if (preg_match('/^\+\d(\d{3})(\d{3})(\d{4})$/', $phone_number,  $matches)) {
        $result = $matches[1] . '-' . $matches[2] . '-' . $matches[3];
        return $result;
    }
}


function sender($to, $to_name, $subject, $mailContent)
{
    $CI = &get_instance();
    // load library 
    $CI->load->library('sender');
    $mail = $CI->sender->load();
    // var_dump(APPPATH);exit;
    try { 

        //Recipients
        $mail->setFrom('allabytell94em@gmail.com', 'Mailer');
        $mail->addAddress($to, $to_name);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $mailContent;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo $e->getMessage(); //Boring error messages from anything else!
        return false;
    }
}


function get_time_ago( $time )
{
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'an',
                30 * 24 * 60 * 60       =>  'mois',
                24 * 60 * 60            =>  'jour',
                60 * 60                 =>  'heure',
                60                      =>  'minute',
                1                       =>  'seconde'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return 'il y a ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' );
        }
    }
}
