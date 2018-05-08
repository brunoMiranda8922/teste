<?php require_once("cabecalho.php");
require_once("banco/banco-categoria.php"); 
require_once("banco/verifica-usuario.php");
require_once("class/Categoria.php");
require_once("class/Produto.php");

verificarUsuario();

#$produto = array("nome" => "", "preco" => "", "descricao" => "", "categoria_id" => "");
$usado = "";
$categorias = listarCategoria($conexao); 	

$categoria = new Categoria();
$produto = new Produto("", "", "", $categoria, "");

?>
	<h1> Formulario de produtos </h1><br/>
	<form action="adiciona-produto.php" method="POST"> 
		<table class="table">
		<?php
		
			require_once("formulario-base.php");
			
		?>
			<tr>
		 		<td><input class="btn btn-primary" type="submit" value="cadastrar"></td>
			</tr>
	</table>
	</form>
<?php require_once("rodape.php");?>