<?php 

class Produto {

    private $id;
    private $nome;
    protected $preco;
    private $descricao;
    private $categoria;
    private $usado; 
    private $tipoProduto;

    function __construct($nome, $preco, $descricao, Categoria $categoria, $usado){
        $this->nome = $nome;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->categoria = $categoria;
        $this->usado = $usado;
    }

    function __toString(){
        return $this->nome;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
    
    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) { 
        $this->nome = $nome;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setPreco($preco) {
        if ($preco > 0 ){
            $this->preco = $preco;
        }
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) { 
        $this->descricao = $descricao;
    }
    
    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function getUsado() {
        return $this->usado;
    }

    #public function setUsado($usado) {
    #    $this->usado  = $usado;
    #}

    #public function getTipoProduto() {
    #    return $this->tipoProduto;
    #}

    public function setTipoProduto($tipoProduto) {
        $this->tipoProduto = $tipoProduto;
    }

    public function descontoProduto($valor) {
        if ($valor > 0 && $valor <= 0.5) {
                $this->preco -= $this->preco * $valor;
        }
        return $this->preco;

    }

    public function temIsbn() { 
        return $this instanceof Livro;  
    }

    public function temTaxaImpressao() { 
        return $this instanceof LivroFisico;  
    }

    public function temWaterMake() { 
        return $this instanceof Ebook;  
    }

    public function calcularImposto() {
        return $this->preco * 0.195;
    }
}


?> 