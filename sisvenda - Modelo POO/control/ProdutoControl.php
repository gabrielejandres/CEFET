<?php
include_once '../model/Produto.php';
include_once '../dao/ProdutoDAO.php';
include_once '../model/Categoria.php';
include_once '../dao/CategoriaDAO.php';

class ProdutoControl
{

    public function verificar()
    {
        extract($_REQUEST);
        $msg = NULL;
        if ((! isset($nome)) || (empty($nome))) {
            $msg = "Nome do produto não informado. Por favor, informe um nome válido! <br>";
        }
        if ((! isset($descricao)) || (empty($descricao))) {
            $msg = $msg . " Descrição do produto não informada. Por favor, informe uma descrição válida! <br>";
        }
        if ((! isset($preco)) || (empty($preco)) || ($preco <= 0)) {
            $msg = $msg . " O preço do produto deve ser maior que zero! <br>";
        }
        
        if ((! isset($idCategoria)) || (empty($idCategoria))) {
            $msg = $msg . " Selecione uma categoria válida! <br>";
        }
        
        if (! empty($msg)) {
            header('Location: /sisvenda/html/produto.php?msg=' . $msg);
        } else {
            $produto = new Produto($nome, $descricao, $preco);
            return $produto;
        }
    }

    public function incluir()
    {
        extract($_REQUEST);
        $produto = $this->verificar();
        $catDao = new CategoriaDAO();
        $categoria = $catDao->listarUm($idCategoria);
       $produto->setCategoria($categoria);
        try {
            $produtoDAO = new ProdutoDAO();
            $produtoDAO->adicionar($produto);
            $msg = "O produto " . $produto->getNome() . " foi registrado com sucesso";
        } catch (PDOException $e) {
            $msg = "Não foi possível salvar! Tente novamente";
        }
        header('Location: /sisvenda/html/msg.php?msg=' . $msg);
    }

    public function listarUm()
    {
        session_start();
        $id = $_REQUEST['id'];
        try {
            $produtoDao = new ProdutoDAO();
            $produto = $produtoDao->listarUm($id);
            $_SESSION['produto']= $produto;
        } catch (Exception $e) {
            $msg = "N�o foi poss�vel listar o produto!";
            header('Location: /sisvenda/html/adm/msg.php?msg='.$msg);
        }

        $catDao = new CategoriaDAO();
        $categorias = $catDao->listarTodos();
        $_SESSION['categorias']= $categorias;
        
        header('Location: '.$_REQUEST['nextPage']);
        
    }

    public function listar()
    {
        $nome= $_GET['nome'];
        $produtos = Array();
        
        $produtoDAO = new ProdutoDAO();
        $produtos = $produtoDAO->listar($nome);
        session_start();
        
        
        $_SESSION['produtos']= $produtos;
        header('Location: '.$_REQUEST['nextPage']);  
    }
        
    public function alterar()
    {
        extract($_REQUEST);
        $produto = $this->verificar();
        $produto->setId($_REQUEST['id']);
        $catDao = new CategoriaDAO();
        $categoria = $catDao->listarUm($idCategoria);
        $produto->setCategoria($categoria);
        try {
            $produtoDAO = new ProdutoDAO();
            $produtoDAO->alterar($produto);
            $msg = "O produto " . $produto->getNome() . " foi alterado com sucesso";
        } catch (PDOException $e) {
            $msg = "N�o foi poss�vel salvar! Tente novamente";
        }
        header('Location: /sisvenda/html/msg.php?msg=' . $msg);
    }
    
    public function excluir()
    {
        $produto = new Produto(null,null,null);
        $produto->setId($_REQUEST['id']);
       
        try {
            $produtoDAO = new ProdutoDAO();
            $produtoDAO->excluir($produto);
            $msg = "O produto foi excluido com sucesso!";
        } catch (PDOException $e) {
            $msg = "N�o foi poss�vel salvar! Tente novamente";
        }
        header('Location: /sisvenda/html/msg.php?msg=' . $msg);
    }
    
    public function listarPromocao()
    {
        $produtos = Array();
        
        $produtoDAO = new ProdutoDAO();
        $produtos = $produtoDAO->listarPromocao();
        session_start();
        
        
        $_SESSION['produtos']= $produtos;
        header('Location: '.$_REQUEST['nextPage']);
        
        
    }
    
}



