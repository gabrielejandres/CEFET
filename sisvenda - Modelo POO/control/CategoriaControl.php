<?php
include_once '../model/Categoria.php';
include_once '../dao/CategoriaDAO.php';

class CategoriaControl
{
    public function verificar(){
        extract($_REQUEST);
        if((!isset($descricao)) || (empty($descricao))){
            $msg = "Descricao da categoria não informada. Por favor, informe uma descrição válida!";
            header('Location: /sisvenda/html/categoria.php?msg='.$msg);
        }else{
            $categoria = new Categoria(null);
            $categoria->setDescricao($descricao);
            return $categoria;
        }
        
    }
    
    public function listarTodos(){
        extract($_REQUEST);
        $catDAO= new CategoriaDAO();
        $categorias = $catDAO->listarTodos();
        session_start();
        $_SESSION['categorias']=$categorias;
        header('Location: '.$nextPage);
    }
    
    public function incluir(){
        $categoria = $this->verificar();
        $catDAO= new CategoriaDAO();
        try{
            $catDAO->adicionar($categoria);
            $msg= "A categoria ".$categoria->getDescricao()." foi adicionada!";
        } catch (Exception $e){
            $msg= "Não foi possível registrar a categoria"."<br>".$e->getMessage();
        }
        header('Location: /sisvenda/html/msg.php?msg='.$msg);
    }
}

