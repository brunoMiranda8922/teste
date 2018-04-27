<?php 
require_once("banco/banco-usuario.php");  
require_once("banco/verifica-usuario.php");
$usuario = buscarUsuario($conexao, $_POST["email"], $_POST["senha"]);


if ($usuario == null) {
    $_SESSION['danger'] = "Usuario ou Senha inválido";
    header("Location: index.php");
} else { 
    $_SESSION['success'] = "Login efetuado com sucesso";
    logaUsuario($usuario["email"]);  
    header("Location: index.php");
    
}
die();





?>