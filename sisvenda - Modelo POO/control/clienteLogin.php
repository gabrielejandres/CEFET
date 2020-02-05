<?php
include_once '../model/Cliente.php';
include_once '../dao/ClienteDAO.php';

$login= $_GET['login'];
$senha=$_GET['senha'];
$clienteDAO= new ClienteDAO();
$cliente= $clienteDAO->validarCliente($login, $senha);
if($cliente== null){
    session_start();
    $_SESSION['msg']= "Falha ao logar";
    header('Location: /sisvenda/html/clienteLogar.php');
}
else{
    header('Location: /sisvenda/html/index.html');
}
