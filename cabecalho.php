<?php 
    function carregaClasse($nomeDaClasse){
        require_once("class/".$nomeDaClasse.".php");
    }
        spl_autoload_register("carregaClasse");
        require_once("banco/conexao.php");
?>
<html>
<head>                                                      
    <meta charset="latin1">
    <title> Minha loja </title>
    
    <link href= "css/bootstrap.css" rel="stylesheet">
    <link href= "css/loja.css" rel="stylesheet"> 
</head>

<body> 
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
            <a  class="navbar-brand" href="index.php"> Minha loja </a>
            </div>
                <div>
                    <ul class="nav navbar-nav">
                        <li><a href="produto-formulario.php"> Adicionar produto </a></li>
                        <li><a href="produto-lista.php"> Consultar produto </a></li>
                        <li><a href="contato.php"> Contato </a></li>
                    </ul>
                </div>

        </div>
    </div>

    <div class="container">
        <div class="principal">
 



