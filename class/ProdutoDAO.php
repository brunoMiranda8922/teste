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
            $tipoProduto = $produto_array['tipoProduto'];
            $isbn = $produto_array['isbn'];

            if ($tipoProduto == 'Livro'){ 
                $produto = new Livro($nome, $preco, $descricao, $categoria, $usado, $tipoProduto);
                $produto-> setIsbn($isbn);
                
            } else { 
                $produto = new Produto($nome, $preco, $descricao, $categoria, $usado, $tipoProduto);
            }
                
            $produto->setId($produto_array['id']); 
            $produto->setCategoria($categoria);
            $produto->setTipoProduto($produto_array['tipoProduto']);
            $produtos[] = $produto;
        }
        return $produtos;
    }

    function inserirProduto(Produto $produto){
        $isbn = "";
        if ($produto->temIsbn()) { 
            $isbn = $produto->getIsbn();
        }
        $tipoProduto = get_class($produto);
        $query = "insert into produtos (nome, preco, descricao, categoria_id, usado, isbn, tipoProduto) 
                    values ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', 
                        {$produto->getCategoria()->getId()}, {$produto->getUsado()}, '{$isbn}',
                             '{$tipoProduto}')";
                
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
        $isbn = $alterar_array['isbn'];
        $tipoProduto = $alterar_array['tipoProduto'];
        if ($tipoProduto == 'Livro'){ 
            $produto = new Livro($nome, $preco, $descricao, $categoria, $usado, $tipoProduto);
            $produto-> setIsbn($isbn);
            
        } else { 
            $produto = new Produto($nome, $preco, $descricao, $categoria, $usado, $tipoProduto);
        }


        $produto->setId($alterar_array['id']);
        $produto->setCategoria($categoria);
        return $produto;
    }
        

    function atualizarProduto(Produto $produto) {
        $isbn = "";
        if ($produto->temIsbn()) { 
            $isbn = $produto->getIsbn();
        }
        $tipoProduto = get_class($produto);
        $query = "update produtos set nome = '{$produto->getNome()}', 
                    preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', 
                        categoria_id= {$produto->getCategoria()->getId()}, 
                            usado = {$produto->getUsado()}, isbn = '{$isbn}', tipoProduto = '{$tipoProduto}' where id = '{$produto->getId()}'";

        $atualizar = mysqli_query($this->conexao, $query);
        return $atualizar;
    }
}