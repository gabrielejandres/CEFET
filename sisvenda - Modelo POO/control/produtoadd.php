<?php
include_once '../model/Produto.php';
include_once '../dao/ProdutoDAO.php';

$nome= $_GET['nome'];
$descricao= $_GET['descricao'];
$preco=$_GET['preco'];
$idcategoria=$_GET['idcategoria'];
$promocao=$_GET['promocao'];
$produto = new Produto($nome,$descricao, $preco, $promocao);
$categoria= new Categoria(null);
$categoria->setId($idcategoria);
$produto->setCategoria($categoria);
    $produtoDAO = new ProdutoDAO();
    $produtoDAO->adicionar($produto);
    
