<?php require_once("conexao.php");
require_once("class/categoria.php");
    

function listarCategoria($conexao){
    $categorias = array();
    $query = "select * from categoria";
    $resultado = mysqli_query($conexao, $query);

    while ($categoria_array = mysqli_fetch_assoc($resultado)) {

        $categoria = new Categoria();
        $categoria->setId($categoria_array['id']);
        $categoria->setNome($categoria_array['nome']);

        array_push($categorias, $categoria);
    }

    return $categorias;
}

?>