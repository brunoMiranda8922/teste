<?php

class ProdutoDAO {
    private $conexao;


    function __construct($conexao) {
        $this->conexao = $conexao;

    }

   
    function listarProdutos() {
        $produtos = array();
        $query = "select p.*, c.nome as categoria_nome from produtos as p join categoria as c on c.id = p.categoria_id";
        $resultado = mysqli_query($this->conexao, $query);  
        
        while($produto_array = mysqli_fetch_assoc($resultado)){
            //array_push($produtos, $produto);
            
            $categoria = new Categoria();
            $categoria->setNome($produto_array['categoria_nome']);  

            $nome = $produto_array['nome']; 
            $preco = $produto_array['preco'];
            $descricao = $produto_array['descricao'];
            $usado = $produto_array['usado'];
                        
            $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
            $produto->setId($produto_array['id']); 
            $produto->setCategoria($categoria);
            $produto->setIsbn($produto_array['isbn']);
            $produto->setTipoProduto($produto_array['tipoProduto']);
            $produtos[] = $produto;
        }
        return $produtos;
    }

    function inserirProduto(Produto $produto){
    
        $query = "insert into produtos (nome, preco, descricao, categoria_id, usado, isbn, tipoProduto) 
            values ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', 
                {$produto->getCategoria()->getId()}, {$produto->getUsado()}, '{$produto->getIsbn()}', '{$produto->getTipoProduto()}')";
                
        return mysqli_query($this->conexao, $query);
    
    }

    function deletarProdutos($id) {
        $query = "delete from produtos where id = {$id}";
        return mysqli_query($this->conexao, $query);
    }

    function alterarProduto($id) {
        
        $query = "select * from produtos where id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        $alterar_array =  mysqli_fetch_assoc($resultado); 

        
        $categoria = new Categoria();
        $categoria->setId($alterar_array['categoria_id']);  
        
        $nome = $alterar_array['nome'];
        $preco = $alterar_array['preco'];
        $descricao = $alterar_array['descricao'];
        $usado = $alterar_array['usado'];

        $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
        $produto->setId($alterar_array['id']);
        $produto->setCategoria($categoria);
        return $produto;
    }
        

    function atualizarProduto(Produto $produto) {
        
        $query = "update produtos set nome = '{$produto->getNome()}', 
            preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', 
                categoria_id= {$produto->getCategoria()->getId()}, 
                    usado = {$produto->getUsado()} where id = '{$produto->getId()}'";
        $atualizar = mysqli_query($this->conexao, $query);
        return $atualizar;
    }
}