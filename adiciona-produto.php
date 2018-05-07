<?php 
require_once("cabecalho.php");
require_once("banco/verifica-usuario.php");

verificarUsuario();

$categoria = new Categoria();
$categoria->setId($_POST["categoria_id"]);  

$nome = $_POST["nome"];
$preco = $_POST["preco"]; 
$descricao = $_POST["descricao"];
#$produto->setCategoria($categoria);
$isbn = $_POST["isbn"];
$tipoProduto = $_POST["tipoProduto"];

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

#$produto->setTipoProduto($tipoProduto);
$produtoDAO = new ProdutoDAO($conexao);

if ($produtoDAO->inserirProduto($produto)) { 

?>
    <p class="alert-success"> Produto <?= $produto->getNome() ?> de  <?= $produto->getPreco() ?> R$, adicionado com sucesso! </p>
<?php

} else {
        $msg = mysqli_error($conexao);
?>
    <p class="alert-danger"> Produto <?= $produto->getNome() ?>, <?= $produto->getPreco() ?> não foi adicionado, erro <?= $msg ?></p>  

<?php }

mysqli_close($conexao);
?>

<?php require_once("rodape.php");?>
