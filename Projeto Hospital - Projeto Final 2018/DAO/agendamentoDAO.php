<?php
    include_once '../model/Agendamento.php';
    include_once '../DAO/PacienteDAO.php';
    include_once '../DAO/MedicoDAO.php';
    include_once '../dao/Conexao.php';


	class AgendamentoDAO{
    function adicionar($agendamento){
        try{
            $pdo = Conexao::connect();
            $sql = 'INSERT Agendamento (id_paciente, id_medico, dia, horario) VALUES (:idPaciente, :idMedico, :dia, :horario)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':idPaciente' => $agendamento->getIdPaciente(),
                ':idMedico' => $agendamento->getIdMedico(),
                ':dia' => $agendamento->getDia(),
                ':horario' => $agendamento->getHorario()
            ));
        } catch(PDOException $e) {
            echo 'Error: '. $e->getMessage();
        }
    }

    function listar($paciente){
        try{
          $pdo = Conexao::connect();
          echo $paciente;
          $sql = "SELECT id_paciente, id_medico, dia, horario FROM agendamento where id_paciente = $paciente";
          $consulta = $pdo->prepare($sql);
          $consulta->execute();
          $agendamentos = Array();

          while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
            print_r($linha);
                $agendamento = new Agendamento();
                $pacienteDAO = new PacienteDAO();
                $agendamento->setIdPaciente($pacienteDAO->listarUm($linha['id_paciente']));
                $medicoDAO = new MedicoDAO();
                $agendamento->setIdMedico($medicoDAO->listarUm($linha['id_medico']));
                $agendamento->setDia($linha['dia']);
                $agendamento->setHorario($linha['horario']);
                $agendamentos[] = $agendamento;
          }

        } catch(PDOException $e){
          echo "Error: " . $e->getMessage;
        }
        return $agendamentos;
      }}



