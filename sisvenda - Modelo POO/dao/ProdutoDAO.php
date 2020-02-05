<?php
include_once '../model/Produto.php';
include_once '../dao/Conexao.php';
include_once '../dao/CategoriaDAO.php';
class ProdutoDAO
{

    public function adicionar($produto)
    {
        try {
            $pdo = Conexao::connect();
            $sql = 'INSERT produto(nome, descricao, preco,idcategoria) VALUES(:nome, :descricao, :preco,:idcategoria)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':nome' => $produto->getNome(),
                ':descricao' => $produto->getDescricao(),
                ':preco' => $produto->getPreco(),
                ':idcategoria'=>$produto->getCategoria()->getId()
            ));
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function alterar($produto)
    {
        try {
            $pdo = Conexao::connect();
            $sql = 'UPDATE produto SET nome=:nome, descricao=:descricao, preco=:preco, idcategoria=:idcategoria where id=:id;';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':id' => $produto->getId(),
                ':nome' => $produto->getNome(),
                ':descricao' => $produto->getDescricao(),
                ':preco' => $produto->getPreco(),
                ':idcategoria'=>$produto->getCategoria()->getId()
            ));
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function excluir($produto)
    {
        try {
            $pdo = Conexao::connect();
            $stmt = $pdo->prepare('DELETE from produto where id=:id');
            $stmt->execute(array(
                ':id' => $produto->getId()
            ));
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function listar($nome)
    {
        $nome = "%" . $nome . "%";
        try {
            $categoriaDAO= new CategoriaDAO();
            $pdo = Conexao::connect();
            $sql = "SELECT id,nome, preco, descricao,idcategoria,promocao FROM produto where nome like :nome";
            $consulta = $pdo->prepare($sql);
            $consulta->execute(array(
                ':nome' => $nome
            ));
            $produtos = Array();
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $produto = new Produto( $linha['nome'], $linha['descricao'], $linha['preco'], $linha['promocao']);
                $produto->setId($linha['id']);
                $categoriaDAO = new CategoriaDAO();
                $produto->setCategoria($categoriaDAO->listarUm($linha['idcategoria']));
                $produtos[] = $produto;
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        return $produtos;
    }

    public function listarUm($id)
    {
        try {
            $categoriaDAO= new CategoriaDAO();
            $pdo = Conexao::connect();
            $sql = "SELECT id, nome, preco, descricao, idcategoria, promocao FROM produto where id = :id";
            $consulta = $pdo->prepare($sql);
            $consulta->execute(array(
                ':id' => $id
            ));
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $produto = new Produto( $linha['nome'], $linha['descricao'], $linha['preco'], $linha['promocao']);
                $produto->setId($linha['id']);
                $produto->setCategoria($categoriaDAO->listarUm($linha['idcategoria']));
            }
        } catch (PDOException $e) {
            throw $e;
        }
        return $produto;
    }

    public function listarTodos()
    {
        try {
            $categoriaDAO= new CategoriaDAO();
            $pdo = Conexao::connect();
            $consulta = $pdo->query("SELECT id, nome, preco, descricao, idcategoria from produto");
            $produtos = Array();
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $produto = new Produto( $linha['nome'], $linha['descricao'], $linha['preco']);
                $produto->setId($linha['id']);
                $produto->setCategoria($categoriaDAO->listarUm($linha['idcategoria']));
                $produtos[] = $produto;
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        return $produtos;
    }

    public function listarPromocao()
    {
        try {
            $categoriaDAO= new CategoriaDAO();
            $pdo = Conexao::connect();
            $consulta = $pdo->query("SELECT id, nome, preco, descricao, idcategoria, promocao from produto where promocao!=0");
            $produtos = Array();
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $produto = new Produto( $linha['nome'], $linha['descricao'], $linha['preco'],$linha['promocao']);
                $produto->setId($linha['id']);
                $produto->setCategoria($categoriaDAO->listarUm($linha['idcategoria']));
                $produtos[] = $produto;
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        return $produtos;
    }
}

