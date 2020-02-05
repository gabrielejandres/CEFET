<?php
    include_once '../model/disponibilidade.php';
    include_once '../dao/Conexao.php';

	class DisponibilidadeDAO{
    function adicionar($disponibilidade){
        try{
            $pdo = Conexao::connect();
            $sql = 'INSERT disonibilidade (idMedico, diaDaSemana, horaInicio, horaFim) VALUES (:idMedico,:diaDaSemana, :horaInicio, :horaFim)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':idMedico' => $disponibilidade->diaDaSemana(),
                ':diaDaSemana' => $disponibilidade->diaDaSemana(),
                ':horaInicio' => $disponibilidade->horaInicio(),
				':horaFim' => $disponibilidade->horaFim()
            ));
        } catch(PDOException $e) {
            echo 'Error: '. $e->getMessage();
        }
    }

    function listar($data){
		 $data = "%" . $data . "%";
        try{
          $pdo = Conexao::connect();
          $sql = "SELECT idMedico, diaDaSemana, horaInicio, horaFim FROM disponibilidade where data like :diaDaSemana";
          $consulta = $pdo->prepare($sql);
          $consulta->execute(array(
            ':nome' => $nome
          ));

          $disponibilidades = Array();

          while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            $disponibilidade = new Disponibilidade($linha['idMedico'], $linha['diaDaSemana'], $linha['horaInicio'], $linha['horaFim']);
            $disponibilidades[] = $disponibilidade;
          }

        } catch(PDOException $e){
          echo "Error: " . $e->getMessage;
        }
        return $disponibilidades;
      }}
