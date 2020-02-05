<?php
class Medico
{
    private $id;
    private $nome;
    private $area;

    public function __construct($nome, $area)
    {
        $this->nome = $nome;
        $this->area = $area;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
          $this->nome = $nome;
    }

    public function getArea()
    {
        return $this->area;
    }

    public function setArea($area)
    {
          $this->area = $area;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

}
