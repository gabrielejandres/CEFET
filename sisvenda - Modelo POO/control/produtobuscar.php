<?php
include_once '../model/Produto.php';
include_once '../dao/produtodao.php';

extract($_GET);
$produtos = Array();

$produtoDAO = new ProdutoDAO();
$produtos = $produtoDAO->listar($nome);
session_start();
$_SESSION['produtos'] = $produtos;
header('Location: /sisvenda/html/produtolistar.php');
