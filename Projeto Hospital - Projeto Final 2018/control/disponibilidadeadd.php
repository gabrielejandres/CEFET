<?php
include_once '../model/Disponibilidade.php';
include_once '../dao/disponibilidadeDAO.php';

extract($_GET);

$disponibilidade = new Disponibilidade($idMedico,$diaDaSemana, $horaInicio, $HoraFim);

$disponibilidadedao = new DisponibilidadeDAO();

$disponibilidadedao->adicionar($disponibilidade);

echo "Disponibilidade adicionada com sucesso";
