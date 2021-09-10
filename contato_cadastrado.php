<?php

session_start();



require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once("db/conexao.php");


$nomeCompleto = filter_input(INPUT_POST, 'nomeCompleto', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$whatsApp = filter_input(INPUT_POST, 'whatsApp', FILTER_SANITIZE_STRING);

$contatoSql = "INSERT INTO contatos (nome, email, whatsApp) VALUES ('$nomeCompleto', '$email', '$whatsApp')";
$contatoResultado = mysqli_query($conn,$contatoSql);

if(mysqli_insert_id($conn)){
  $_SESSION['mensagem'] = "Cadastro realizado com sucesso!";
  header("Location:index.php");
}else{
  $_SESSION['mensagem'] = "Erro ao realizar o cadastro!";
  header("Location:index.php");

}

$nomeCompleto = $_POST["nomeCompleto"];
$email = $_POST["email"];
$whatsApp = $_POST["whatsApp"];

$mensagem_boas_vindas = "Olá, " . $nomeCompleto . " é um prazer ter você conosco! Entraremos em contato!";

//require_once("src/PHPMailerAutoload.php");

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





