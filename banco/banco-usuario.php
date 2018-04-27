<?php require_once("conexao.php");

function buscarUsuario($conexa, $email, $senha){
    $senhaMd5 = md5($senha);
    $email = mysqli_real_escape_string($conexa, $email);
    $query = "select * from usuarios where email='{$email}' and senha = '{$senhaMd5}'";
    $resultado = mysqli_query($conexa, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}

?>
