<?php
include_once '../model/Produto.php';
include_once '../dao/ProdutoDAO.php';

$nome= $_GET['nome'];
$descricao= $_GET['descricao'];
$preco=$_GET['preco'];
$promocao=$_GET['promocao'];
$produto = new Produto($nome,$descricao, $preco, $promocao);

$produtoDAO = new ProdutoDAO();
$produtoDAO->alterar($produto);
