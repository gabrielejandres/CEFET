<?php

include_once '../model/Cliente.php';
include_once '../dao/ClienteDAO.php';

$id = $_GET['id'];
$nome= $_GET['nome'];
$cpf= $_GET['cpf'];
$login=$_GET['login'];
$endereco= $_GET['endereco'];
$senha= $_GET['senha'];
$cliente = new Cliente($nome,$cpf, $login, $endereco, $senha);
$cliente->setId($id);
$clienteDAO = new ClienteDAO();
$clienteDAO->alterar($cliente);
