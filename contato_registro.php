<?php
//session_start();
include_once("db/conexao.php");


$nomeCompleto = filter_input(INPUT_POST, 'nomeCompleto', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$whatsApp = filter_input(INPUT_POST, 'whatsApp', FILTER_SANITIZE_STRING);

$contatoVerifica = mysqli_query($conn, "SELECT * FROM contatos WHERE email = '$email' OR whatsApp = '$whatsApp'");

if (mysqli_num_rows($contatoVerifica) > 0) {

   $_SESSION['mensagemErro'] = "Já existe um e-mail/whatsApp cadastrados!";
   header("Location:index.php");

} else {

    $contatoSql = "INSERT INTO contatos (nome, email, whatsApp) VALUES ('$nomeCompleto', '$email', '$whatsApp')";

    $contatoResultado = mysqli_query($conn, $contatoSql);

    if (mysqli_insert_id($conn)) {

        $_SESSION['mensagem'] = "Cadastro realizado com sucesso!";
        header("Location:index.php");
    } else {
        $_SESSION['mensagem'] = "Erro ao realizar o cadastro!";
        header("Location:index.php");
    }
}
