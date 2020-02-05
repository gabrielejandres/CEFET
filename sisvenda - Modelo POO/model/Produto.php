<?php
class Produto
{
    private $id;
    private $nome;
    private $descricao;
    private $preco;
    private $categoria;
    private $promocao;

    public function __construct($nome, $descricao, $preco, $promocao)
    {
        
        $this->nome = $nome;
        $this->descricao= $descricao;
        $this->preco= $preco;
        $this->promocao= $promocao;
    }
   
   public function getPromocao()
    {
        return $this->promocao;
    }

    public function setPromocao($promocao)
    {
        $this->promocao = $promocao;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    
}

