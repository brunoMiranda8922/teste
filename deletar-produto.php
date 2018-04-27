<?php require_once("cabecalho.php");  
require_once("banco/banco-produto.php"); 
require_once("banco/verifica-usuario.php");

$id = $_POST['id'];
deletarProdutos($conexao, $id);
$_SESSION["success"] = "Produto removido com sucesso";
header("location: produto-lista.php");
die();
require_once("rodape.php") ?> 


