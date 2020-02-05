<?php
include_once '../model/Agendamento.php';
include_once '../dao/agendamentoDAO.php';

	extract($_GET);

    $agendamentodao = new AgendamentoDAO();
    $agendamentos = Array();
    $agendamentos = $agendamentodao->listar($paciente);
    session_start();
    $_SESSION['agendamentos'] = $agendamentos;
    header('Location: /Projeto Hospital/html/Agendamentolistar.php')
 ?>
