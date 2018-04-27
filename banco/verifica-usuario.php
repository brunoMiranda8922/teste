<?php require_once("conexao.php");

session_start();
function usuarioEstaLogado() {
    return isset($_SESSION["Usuario_logado"]);
}

function verificarUsuario() {
    if (!usuarioEstaLogado()) {
        $_SESSION["danger"] = "Você não tem acesso a esta funcionalidade";
        header("Location: index.php");
        die();
    }
}

function usuarioLogado() {
    return $_SESSION["Usuario_logado"];
}

function logaUsuario($email) {
    $_SESSION["Usuario_logado"] = $email;
}

function logout() {
    session_destroy();
    session_start();
}
?>
