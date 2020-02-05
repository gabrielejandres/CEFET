<?php

class disponibilidade
{
    private $idMedico;
    private $diaDaSemana;
    private $horaInicio;
    private $HoraFim;

    public function __construct($idMedico,$diaDaSemana, $horaInicio, $HoraFim)
    {
        $this->$idMedico = $idMedico;
        $this->$diaDaSemana = $diaDaSemana;
        $this->$horaInicio = $horaInicio;
        $this->$HoraFim = $HoraFim;
      }
      
      public function getIdMedico()
      {
          return $this->IdMedico;
      }
      
      public function setIdMedico($IdMedico)
      {
          $this->IdMedico = $IdMedico;
      }

    public function getDiaDaSemana()
    {
        return $this->diaDaSemana;
    }

    public function setDiaDaSemana($diaDaSemana)
    {
        $this->diaDaSemana = $diaDaSemana;
    }

    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    public function getHoraFim()
    {
        return $this->HoraFim;
    }
    public function setHoraInicio($horaInicio)
    {
        $this->horaInicio = $horaInicio;
    }

    public function setHoraFim($HoraFim)
    {
        $this->horaFim = $HoraFim;
    }
}
