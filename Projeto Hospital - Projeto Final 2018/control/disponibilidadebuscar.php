<?php
    include_once '../model/Disponibilidade.php';
    include_once '../dao/disponibilidadeDAO.php';

    extract($_GET);
    $disponibilidadeDao = new DisponibilidadeDAO();
    $disponibilidade = Array();
    $disponibilidade = $disponibilidadeDao->listar($nome);
    session_start();
    $_SESSION['disponibilidade'] = $disponibilidade;
    header('Location: /Projeto Hospital/html/disponibilidadelistar.php')
 ?>
