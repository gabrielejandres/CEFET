<?php
include_once '../model/Produto.php';
include_once '../model/Item.php';
include_once '../dao/ProdutoDAO.php';
include_once '../model/Categoria.php';
include_once '../dao/CategoriaDAO.php';

class Carrinho
{
    
    
    public function criar(){
        $carrinho = Array();
        $_SESSION['carrinho'] = $carrinho;
    }
    
    public function add(){
        $id = $_REQUEST['id'];
        $produtoDao = new ProdutoDAO();
        $produto = $produtoDao->listarUm($id);
        $item = new Item();
        $item->setProduto($produto);
        $item->setQtd(1);
        
        session_start();
        if (!isset($_SESSION['carrinho'])){
            $this->criar();
        }
        $carrinho = $_SESSION['carrinho'];
        $carrinho[] = $item;
        $_SESSION['carrinho'] = $carrinho;
        
        header('Location: '.$_REQUEST['nextPage']);
        
    }
    
}

