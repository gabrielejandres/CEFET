<?php

include_once '../model/Produto.php';
include_once '../dao/ProdutoDAO.php';

$nome= $_GET['nome'];
$descricao= $_GET['descricao'];
$preco=$_GET['preco'];
$preco=$_GET['promocao'];
$produto = new Produto($nome,$descricao, $preco, $promocao);
$produtoDAO = new ProdutoDAO();
$produtoDAO->excluir($produto);
