<!DOCTYPE html>
<?php require_once("cabecalho.php");
require_once("banco/verifica-usuario.php");
require_once("banco/mostra-alerta.php");

mostrarAlerta("success");
mostrarAlerta("danger");
?>

<h1> Bem vindo </h1>

<?php
if (usuarioEstaLogado()) { ?>
	<p class="text-success"> Logado com <?= usuarioLogado()  ?> <a class="btn btn-primary" href="logout.php"> Deslogar </a></p>
<?php
} else { ?> 

<h2> Login </h2>
	<form action="login.php" method="POST">
    <table class="table"> 
    	<tr>
        	<td> Email: </td>
        	<td> <input class="form-control" type ="email" name="email"> </td>
      	</tr>  
      	<tr>
        	<td> Senha: </td>
        	<td> <input class="form-control" type="password" name="senha"> </td> 
      	</tr>
     	<tr>
        	<td><button type="submit" class="btn btn-primary"> Login </button></td>
      	</tr>  
    </table>
	</form>
	
<?php } ?>
<?php require_once("rodape.php"); ?>