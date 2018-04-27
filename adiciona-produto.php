<?php 
require_once("cabecalho.php");
require_once("banco/banco-produto.php"); 
require_once("banco/verifica-usuario.php");
require_once("class/produto.php");
require_once("class/categoria.php");

verificarUsuario();


$categoria = new Categoria();
$categoria->setId($_POST["categoria_id"]);  

$nome = $_POST["nome"];
$preco = $_POST["preco"]; 
$descricao = $_POST["descricao"];
#$produto->setCategoria($categoria);

if (array_key_exists('usado', $_POST)) {
    $usado = "true";
} else {
    $usado = "false";
} 

$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);

if (inserirProduto($conexao,  $produto)) { 

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
