<?php
include_once '../model/Produto.php';
include_once '../dao/ProdutoDAO.php';

$nome= $_GET['nome'];
$descricao= $_GET['descricao'];
$preco=$_GET['preco'];
$produto = new Produto($nome,$descricao, $preco);

$produtoDAO = new ProdutoDAO();
$produtoDAO->alterar($produto);
