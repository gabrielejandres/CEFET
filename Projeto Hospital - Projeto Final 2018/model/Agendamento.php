<?php

class Agendamento
{
    private $idPaciente;
    private $idMedico;
    private $dia;
    private $horario;


     public function getIdPaciente()
     {
         return $this->idPaciente;
     }
     
     public function setIdPaciente($idPaciente)
     {
         $this->idPaciente = $idPaciente;
     }
     
     public function getIdMedico()
     {
         return $this->idMedico;
     }
     
     public function setIdMedico($idMedico)
     {
         $this->idMedico = $idMedico;
     }
     
     public function getDia()
     {
         return $this->dia;
     }
     
     public function setDia($dia)
     {
         $this->dia = $dia;
     }
     
     public function getHorario()
     {
         return $this->horario;
     }
     
     public function setHorario($horario)
     {
         $this->horario = $horario;
     }


}
