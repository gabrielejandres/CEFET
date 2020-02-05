<?php
include_once '../model/Medico.php';
include_once '../dao/medicoDAO.php';

extract($_GET);

$medicoDAO = new MedicoDAO();
$medico = new Medico( $nome, $area);

$medicoDAO->adicionar($medico);
  echo "Medico adicionado com sucesso";
