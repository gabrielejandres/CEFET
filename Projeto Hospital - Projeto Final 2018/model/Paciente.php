<?php

class Paciente
{
    private $id;
    private $nome;
    private $sobrenome;
    private $CPF;
    private $RG;
    private $end;
    private $email;
    private $tel;
    private $cel;
    private $dataNas;

    public function __construct($nome, $sobrenome, $CPF, $RG, $end, $email, $tel, $cel, $dataNas)
    {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->CPF = $CPF;
        $this->RG = $RG;
        $this->end = $end;
        $this->email = $email;
        $this->tel = $tel;
        $this->cel = $cel;
        $this->dataNas = $dataNas;
      }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    public function getCPF()
    {
        return $this->CPF;
    }

    public function getRG()
    {
        return $this->RG;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function getCel()
    {
        return $this->cel;
    }

    public function getDataNas()
    {
        return $this->dataNas;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;
    }

    public function setCPF($CPF)
    {
        $this->CPF = $CPF;
    }

    public function setRG($RG)
    {
        $this->RG = $RG;
    }

    public function setEnd($end)
    {
        $this->end = $end;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    public function setCel($cel)
    {
        $this->cel = $cel;
    }

    public function setDataNas($dataNas)
    {
        $this->dataNas = $dataNas;
    }

}
