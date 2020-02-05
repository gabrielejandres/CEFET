<?php
include_once '../model/Cliente.php';
include_once '../dao/ClienteDAO.php';

$nome= $_GET['nome'];
$clientes = Array();

$clienteDAO = new ClienteDAO();
$clientes = $clienteDAO->listar($nome);
session_start();


$_SESSION['clientes']= $clientes;
header('Location: /sisvenda/html/clientelistar.php');