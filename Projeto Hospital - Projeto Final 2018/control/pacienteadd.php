<?php
include_once '../model/Paciente.php';
include_once '../dao/PacienteDAO.php';

extract($_GET);

$paciente = new Paciente($nome, $sobrenome, $cpf, $rg, $endereco, $email, $tel, $cel, $dataNas);

$pacientedao = new PacienteDAO();

$pacientedao->adicionar($paciente);
echo "Paciente adicionado com sucesso";
