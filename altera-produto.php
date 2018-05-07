<?php 
require_once("cabecalho.php");
require_once("banco/banco-produto.php"); 

$categoria = new Categoria();
$categoria->setId($_POST["categoria_id"]); 

$nome = $_POST["nome"];
$preco = $_POST["preco"]; 
$descricao = $_POST["descricao"]; 
$tipoProduto = $_POST['tipoProduto'];
$isbn = $_POST['isbn'];
#$produto->setCategoria($categoria);

if (array_key_exists('usado', $_POST)) {
    $usado = "true";
} else {
    $usado = "false";
} 

if ($tipoProduto == 'Livro'){ 
    $produto = new Livro($nome, $preco, $descricao, $categoria, $usado, $tipoProduto);
    $produto-> setIsbn($isbn);
} else { 
    $produto = new Produto($nome, $preco, $descricao, $categoria, $usado, $tipoProduto);
}


$produto->setId($_POST["id"]);
#$produto->setUsado($usado);


$produdoDAO = new ProdutoDAO($conexao);
if ($produdoDAO->atualizarProduto($produto)) { 
?>
    <p class="alert-success"> Produto <?= $produto->getNome() ?> de  <?= $produto->getPreco() ?> R$, alterado com sucesso! </p>
    
<?php

} else {
    $msg = mysqli_error($conexao);
?>
    <p class="alert-danger"> Produto <?= $produto->getNome() ?>, <?= $produto->getPreco() ?> não foi alterado, erro <?= $msg ?></p>
    
<?php } 
mysqli_close($conexao);
?>

<?php require_once("rodape.php");?>
