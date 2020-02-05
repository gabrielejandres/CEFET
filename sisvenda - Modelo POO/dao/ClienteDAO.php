<?php
include_once '../model/Cliente.php';
include_once '../dao/Conexao.php';

class ClienteDAO
{

    public function adicionar($cliente)
    {
        try {
            $pdo = Conexao::connect();
            $sql = 'INSERT cliente(nome, cpf, login, endereco, senha) VALUES(:nome, :cpf, :login, :endereco, :senha)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':nome' => $cliente->getNome(),
                ':cpf' => $cliente->getCpf(),
                'login' => $cliente->getLogin(),
                'endereco' => $cliente->getEndereco(),
                'senha' => $cliente->getSenha()
            ));
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function alterar($cliente)
    {
        try {
            $pdo = Conexao::connect();
            ;
            $sql = 'UPDATE cliente SET nome=:nome, cpf=:cpf, login=:login, endereco=:endereco, senha=:senha where id=:id';
            $stmt = $pdo->prepare($sql);
            
            $stmt->execute(array(
                ':id' => $cliente->getId(),
                ':nome' => $cliente->getNome(),
                ':cpf' => $cliente->getCpf(),
                ':login' => $cliente->getLogin(),
                ':endereco' => $cliente->getEndereco(),
                ':senha' => $cliente->getSenha()
            ));
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function excluir($id)
    {
        try {
            $pdo = Conexao::connect();
            $stmt = $pdo->prepare('DELETE from cliente where id= :id');
            $stmt->execute(array(
                ':id' => $id
            ));
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function listar($nome)
    {
        $nome = "%" . $nome . "%";
        try {
            $pdo = Conexao::connect();
            $sql = "SELECT id,nome, cpf, login, endereco, senha FROM cliente where nome like :nome";
            $consulta = $pdo->prepare($sql);
            $consulta->execute(array(
                ':nome' => $nome
            ));
            $clientes = Array();
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $cliente = new Cliente($linha['nome'], $linha['cpf'], $linha['login'], $linha['endereco'], $linha['senha']);
                $cliente->setId($linha['id']);
                $clientes[] = $cliente;
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        return $clientes;
    }

    public function listarUm($id)
    {
        try {
            $pdo = Conexao::connect();
            $sql = "SELECT id,nome, cpf, login, endereco, senha FROM cliente where id = :id";
            $consulta = $pdo->prepare($sql);
            $consulta->execute(array(
                ':id' => $id
            ));
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $cliente = new Cliente($linha['nome'], $linha['cpf'], $linha['login'], $linha['endereco'], $linha['senha']);
                $cliente->setId($linha['id']);
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        return $cliente;
    }

    public function listarTodos()
    {
        try {
            $pdo = Conexao::connect();
            $consulta = $pdo->query("SELECT id,nome, cpf, login, endereco, senha FROM cliente");
            $clientes = Array();
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $cliente = new Cliente($linha['nome'], $linha['cpf'], $linha['login'], $linha['endereco'], $linha['senha']);
                $cliente->setId($linha['id']);
                $clientes[] = $cliente;
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        return $clientes;
    }

    public function validarCliente($login, $senha)
    {
        try {
            $pdo = Conexao::connect();
            $sql = "SELECT id,nome, cpf, login, endereco, senha FROM cliente where login = :login and senha= :senha";
            $cliente= null;
            $consulta = $pdo->prepare($sql);
            $consulta->execute(array(
                ':login' => $login,
                ':senha' => $senha
            ));

            if ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $cliente = new Cliente($linha['nome'], $linha['cpf'], $linha['login'], $linha['endereco'], $linha['senha']);
                $cliente->setId($linha['id']);
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        return $cliente;
    }
}
