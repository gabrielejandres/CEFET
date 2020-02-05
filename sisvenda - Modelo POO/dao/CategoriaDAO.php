<?php
include_once '../model/Categoria.php';
include_once '../dao/Conexao.php';

class CategoriaDAO
{
    public function adicionar($categoria) {
        try {
            $pdo = Conexao::connect();
            $sql = 'INSERT categoria(descricao) VALUES(:descricao)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':descricao' => $categoria->getDescricao()
        ));
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        
    }
    
    public function listarUm($id)
    {
        try {
            $pdo = Conexao::connect();
            $sql = "SELECT id, descricao  FROM categoria where id = :id";
            $consulta = $pdo->prepare($sql);
            $consulta->execute(array(
                ':id' => $id,
            ));
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $categoria = new Categoria();
                $categoria->setId($linha['id']);
                $categoria->setDescricao($linha['descricao']);
            }
        } catch (PDOException $e) {
            throw $e;
        }
        return $categoria;
    }
    
    public function listarTodos()
    {
        try {
            $pdo = Conexao::connect();
            $consulta = $pdo->query("SELECT id, descricao from categoria");
            $categorias = Array();
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $categoria = new Categoria();
                $categoria->setId($linha['id']);
                $categoria->setDescricao($linha['descricao']);
                $categorias[] = $categoria;
            }
        } catch (PDOException $e) {
           throw $e;
        }
        return $categorias;
    }
}