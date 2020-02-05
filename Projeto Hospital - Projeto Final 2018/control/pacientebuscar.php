<?php
    include_once '../model/Paciente.php';
    include_once '../dao/PacienteDAO.php';

    extract($_GET);
    $pacientedao = new PacienteDAO();
    $pacientes = Array();
    $pacientes = $pacientedao->listar($nome);
    session_start();
    $_SESSION['pacientes'] = $pacientes;
    header('Location: /Projeto Hospital/html/Pacientelistar.php')
 ?>
