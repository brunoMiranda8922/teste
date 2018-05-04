<?php require_once("cabecalho.php");
require_once("banco/banco-categoria.php"); 
require_once("banco/banco-produto.php");

$id = $_GET['id'];
$produtoDAO = new ProdutoDAO($conexao);
$produto = $produtoDAO->alterarProduto($id);

$categoriaDAO = new CategoriaDAO($conexao);
$categorias = $categoriaDAO->listarCategoria();

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