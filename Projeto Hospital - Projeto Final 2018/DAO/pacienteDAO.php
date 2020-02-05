<?php
    include_once '../model/Paciente.php';
    include_once '../dao/Conexao.php';

	class PacienteDAO{
    function adicionar($paciente){
        try{
            $pdo = Conexao::connect();
            $sql = 'INSERT Paciente (nome, sobrenome, cpf, endereco, email, telefone, celular, rg, dataNascimento) VALUES (:nome, :sobrenome, :cpf, :endereco, :email, :telefone, :celular, :rg, :dataNascimento)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':nome' => $paciente->getNome(),
                ':sobrenome' => $paciente->getSobrenome(),
        				':cpf' => $paciente->getCpf(),
        				':endereco' => $paciente->getEnd(),
        				':email' => $paciente->getEmail(),
        				':telefone' => $paciente->getTel(),
        				':celular' => $paciente->getCel(),
        				':rg' => $paciente->getRg(),
                ':dataNascimento' => $paciente->getDataNas()
            ));
        } catch(PDOException $e) {
            echo 'Error: '. $e->getMessage();
        }
    }
    
    function listar($nome){
		 $nome = "%" . $nome . "%";
        try{
          $pdo = Conexao::connect();
          $sql = "SELECT id, nome, sobrenome, cpf, endereco, email, telefone, celular, rg, dataNascimento FROM paciente where nome like :nome";
          $consulta = $pdo->prepare($sql);
          $consulta->execute(array(
            ':nome' => $nome
          ));

          $pacientes = Array();

          while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $paciente = new Paciente($linha['nome'], $linha['sobrenome'], $linha['cpf'], $linha['endereco'], $linha['email'], $linha['telefone'], $linha['celular'],$linha['rg'], $linha['dataNascimento']);
            $paciente->setId($linha['id']);
            $pacientes[] = $paciente;
          }

        } catch(PDOException $e){
          echo "Error: " . $e->getMessage;
        }
        return $pacientes;
      }
      
      function listarTodos(){
          try{
              $pdo = Conexao::connect();
              $sql = "SELECT id, nome, sobrenome, cpf, endereco, email, telefone, celular, rg, dataNascimento FROM paciente order by nome";
              $consulta = $pdo->prepare($sql);
              $consulta->execute(array(

              ));
              
              $pacientes = Array();

              while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
                  $paciente = new Paciente($linha['nome'], $linha['sobrenome'], $linha['cpf'], $linha['endereco'], $linha['email'], $linha['telefone'], $linha['celular'],$linha['rg'], $linha['dataNascimento']);
                  $paciente->setId($linha['id']);
                  $pacientes[] = $paciente;
              }
              
          } catch(PDOException $e){
              echo "Error: " . $e->getMessage;
          }
          return $pacientes;
      }

      public function listarUm($id)
    {
        try {
            $pdo = Conexao::connect();
            $sql = 'SELECT id, nome, sobrenome, cpf, endereco, email, telefone, celular, rg, dataNascimento FROM paciente where id = :id';
            $consulta = $pdo->prepare($sql);
            $consulta->execute(array(
                ':id' => $id,
            ));
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $paciente = new Paciente($linha['nome'], $linha['sobrenome'], $linha['cpf'], $linha['endereco'], $linha['email'], $linha['telefone'], $linha['celular'],$linha['rg'], $linha['dataNascimento']);
                  $paciente->setId($linha['id']);
            }
        } catch (PDOException $e) {
            throw $e;
        }
        return $paciente;
    }
	
	}

 
