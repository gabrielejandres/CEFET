<?php
include_once '../model/Agendamento.php';
include_once '../dao/agendamentoDAO.php';

extract($_GET);
//print_r($_GET);

$agendamento = new Agendamento($idPaciente, $idMedico, $data, $horario);

$agendamentodao = new AgendamentoDAO();

$agendamentodao->adicionar($agendamento);

echo "Consulta agendada com sucesso";
