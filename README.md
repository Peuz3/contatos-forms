# contatos-forms

# Trabalhando com PHP e Mysql para o cadastramento de usuários para contato.

Versão do PHP 7.4.14

Bulma Versão 0.9.3 - Framework open source para componentes front-end (https://bulma.io/)

XAMPP v3.2.4

HTML5

Mysql

URL da Aplicação: http://localhost/cadastroClientes/index.php

Criação de um formulário com os campos: Nome Completo, E-mail e WhatsApp para salvar os contatos de um usuário.

A aplicação não aceita e-mails e WhatsApp já cadastrados no banco de dados;

# PHPMailer
Biblioteca de código aberto para enviar e-mails com protocolo SMTP para ser utilizado em plataformas que não tenham um servidor de e-mail nativo.
Código fonte: https://github.com/PHPMailer/PHPMailer/archive/master.zip

Funcionamento:
Após baixar a biblioteca, copiar a pasta src e colar no projeto.

No arquivo fazer as importações:

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

Para enviar os e-mails foi preciso criar um e-mail teste para ver se de fato a aplicação estava disparando os e-mails.

Adicionar também (Foi utilizado os serviços do Gmail)

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

# Possivel problema de SMTP connect() failed PHPmailer - PHP
Isso ocorre porque o Google tem um mecanismo de defesa que impede o acesso de apps terceiros, para resolver basta ir nas configurações do Gmail e Ativar as permissões.
