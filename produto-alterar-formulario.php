<?php require_once("cabecalho.php");
require_once("banco/banco-categoria.php"); 
require_once("banco/banco-produto.php");
require_once("class/produto.php");
require_once("class/categoria.php");

$id = $_GET['id'];
$produto = alterarProduto($conexao, $id);
$categorias = listarCategoria($conexao);

$usado = $produto->getUsado() ? "checked='checked'" : "";
?>
<h1> Alterando produtos </h1><br/>
    <form action="altera-produto.php" method="POST"> 
        <input type="hidden" name="id" value="<?= $produto->getId() ?>">
		<table class="table">
            <?php 
                require_once("formulario-base.php");
            ?>
			<tr>
		 		<td><input class="btn btn-primary" type="submit" value="Alterar"></td>
			</tr>
        </table>
	</form>
<?php require_once("rodape.php");?>