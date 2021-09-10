<?php

session_start();

include_once("contato_registro.php");



require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



$nomeCompleto = $_POST["nomeCompleto"];
$email = $_POST["email"];
$whatsApp = $_POST["whatsApp"];

$mensagem_boas_vindas = "Olá," . $nomeCompleto . ", Sou a Luana e
                 é um prazer ter você como o meu contato! Mais tarde, a gente conversa!!!";



$mail = new PHPMailer;
$mail->IsSMTP();
$mail->SMTPDebug = false;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->Username = 'testee681@gmail.com	';
$mail->Password = '@Teste123';

$mail->SetFrom($email);
$mail->addAddress($email);
$mail->Subject = ("E-mail de Boas-Vindas");
$mail->msgHTML(utf8_decode($mensagem_boas_vindas));
//$mail->AltBody = 'De: {$nomeCompleto}\nEmail: {$email}\nWhatsApp: {$whatsApp}';

if($mail->send()) {
    echo 'Email enviado com sucesso.' ;
} else {
    echo 'Email não enviado. ' . $mail->ErrorInfo;
}





