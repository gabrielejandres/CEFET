<?php

include_once '../model/Cliente.php';
include_once '../dao/ClienteDAO.php';

$id= $_GET['id'];
$clienteDAO = new ClienteDAO();
$clienteDAO->excluir($id);
