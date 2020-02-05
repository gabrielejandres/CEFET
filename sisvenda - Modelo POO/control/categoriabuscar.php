<?php
include_once '../model/Categoria.php';
include_once '../dao/CategoriaDAO.php';

extract($_GET);
$categorias = Array();

$categoriaDAO = new CategoriaDAO();
$categoria = $categoriaDAO->listar($descricao);
session_start();
$_SESSION['categorias'] = $categorias;
header('Location: /sisvenda/html/categorialistar.php');
