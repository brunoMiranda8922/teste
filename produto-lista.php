<?php require_once("cabecalho.php");
require_once("banco/verifica-usuario.php"); 
require_once("banco/mostra-alerta.php");
?>

<?php 
    mostrarAlerta("success");  
?>

<table class="table table-striped table-bordered">    
    <?php
        $produtoDAO = new ProdutoDAO($conexao);
        $produtos = $produtoDAO->listarProdutos();
        foreach($produtos as $produto){
    ?>

    <tr>
        <td><?= $produto->getNome() ?></td>
        <td><?= $produto->getPreco() ?></td>
        <td><?= $produto->calcularImposto() ?></td>
        <td><?= utf8_encode(substr($produto->getDescricao(), 0 , 40))?></td>
        <td><?= $produto->getCategoria()->getNome() ?></td>
        <td>
            <?php 
                if($produto->temIsbn()) {
                    echo "ISBN: ".$produto->getIsbn();
                } 
            ?>
        </td>
       
        <td><a class="btn btn-primary" href="produto-alterar-formulario.php?id=<?= $produto->getId()?>">Alterar</a></td>
        
        <td>
            <form action ="deletar-produto.php" method ="POST">
                <input type ="hidden" name = "id"  value ="<?= $produto->getId() ?>">
                    <button class="btn btn-danger"> Remover </button>
            </form>   
        </td>   
            
    </tr> 

   

<?php }
?>
</table>



<?php require_once("rodape.php"); ?>
