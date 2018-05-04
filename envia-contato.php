<?php
require_once("banco/verifica-usuario.php");

$nome = $_GET["nome"];
$email = $_GET["email"];
$mensagem = $_GET["mensagem"];

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\SMTP;
use \PHPMailer\PHPMailer\Exception;

require_once("PHPMailer-master/src/PHPMailer.php");
require_once("PHPMailer-master/src/SMTP.php");
require_once("PHPMailer-master/src/Exception.php");
$mail = new PHPMailer();


$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "blostyes@gmail.com";
$mail->Password = "mlkpiranha";
$mail->SMTPDebug = 2;

$mail->setFrom("blostyes@gmail.com", "Alura Curso PHP e MySQL");
$mail->addAddress("blostyes@gmail.com");
$mail->Subject = "Email de contato da loja";
$mail->msgHTML("<html>de: {$nome}<br/>email: {$email}<br/>mensagem: {$mensagem}</html>");
$mail->AltBody = "de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";

if($mail->send()) {
    
    $_SESSION["success"] = "Mensagem enviada com sucesso";
    header("Location: index.php");

} else {
    var_dump($mail->ErrorInfo);
    die;
    $_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
    header("Location: contato.php");
}

 

