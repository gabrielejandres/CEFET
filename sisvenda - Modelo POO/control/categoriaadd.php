<?php
include_once '../model/Categoria.php';
include_once '../dao/CategoriaDAO.php';

$descricao= $_GET['descricao'];
$categoria = new Categoria($descricao);
$categoriaDAO = new CategoriaDAO();
$categoriaDAO->adicionar($categoria);