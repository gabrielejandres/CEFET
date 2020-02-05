<?php
    include_once '../model/Medico.php';
    include_once '../dao/MedicoDAO.php';

    extract($_GET);

    $medicos = Array();
    $medicoDAO = new MedicoDAO();
    $medicos = $medicoDAO->listar($area);
    session_start();
    $_SESSION["medicos"] = $medicos;
    header('Location: \Projeto Hospital\html\medicolistar.php');
 ?>
