<?php


class Cliente
{
    private $id;
    private $nome;
    private $cpf;
    private $login;
    private $endereco;
    private $senha;
    
    public function __construct($nome, $cpf, $login, $endereco, $senha)
    {
        
        $this->nome= $nome;
        $this->cpf= $cpf;
        $this->login= $login;
        $this->endereco= $endereco;
        $this->senha= $senha;
        
    }
    
    public  function getId(){
        return $this->id;
    }
    public function getNome()
    {
        return $this->nome;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    public function setId($id){
        $this->id= $id;
    }
    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setEndereco($endereco)
    {
        $this->endereço = $endereco;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    
}

