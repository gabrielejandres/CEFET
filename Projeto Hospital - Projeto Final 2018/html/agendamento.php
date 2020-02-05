<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registrar Agendamento</title>
<link rel="stylesheet" type="text/css" href="../css/agendamento.css">
<link rel="shortcut icon" href="../docs/logo.png" type="image/x-icon" />
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
	integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
	crossorigin="anonymous">
<style>
	legend{
	font-family: 'Amatic SC', cursive;
	font-size: 280%; 
	color: white;
	text-decoration: bold;
	text-shadow: 3px 5px 4px black;
}
</style>
</head>
<body>
<div class="agendamento">
	<form action="\Projeto Hospital\control\agendamentoadd.php" method="get">
		<fieldset>
			<legend>Registrar Agendamento</legend>	
					Data: <br/>
					<input type="date" name="data" class="inputs"/><br/><br/>
	
					Horario: <br/>
					<select class="inputs" name="horario">
					  <option value="08:00">08:00</option>
					  <option value="08:30">08:30</option>
					  <option value="09:00">09:00</option>
					  <option value="09:30">09:30</option>
					  <option value="10:00">10:00</option>
					  <option value="10:30">10:30</option>
					  <option value="11:00">11:00</option>
					  <option value="11:30">11:30</option>
					  <option value="12:00">12:00</option>
					  <option value="12:30">12:30</option>
					  <option value="13:00">13:00</option>
					  <option value="13:30">13:30</option>
					  <option value="14:00">14:00</option>
					  <option value="14:30">14:30</option>
					  <option value="15:00">15:00</option>
					  <option value="15:30">15:30</option>
					  <option value="16:00">16:00</option>
					  <option value="16:30">16:30</option>
					  <option value="17:00">17:00</option>
					  <option value="17:30">17:30</option>
					  <option value="18:00">18:00</option>
					</select><br/><BR/>
					
					Selecione seu nome: <BR/>
					<select name="idPaciente" class="inputs"> 
							<?php
		                    include_once '../model/Paciente.php';
                   			include_once '../DAO/PacienteDAO.php';

							$pacientedao = new PacienteDAO();
							$pacientes = $pacientedao->listarTodos();
							
							print_r($pacientes);

                   			if (isset($pacientes)) {
                        		foreach ($pacientes as $p) {
                            		echo "<option value='".$p->getId()."'";
                            		echo ">". $p->getNome() . " " . $p->getSobrenome();
                            	   echo "</option>";	
                    		}
                   			}
                    		?>        
					</select> <br/><BR/>
					
					Selecione o medico: <BR/>
					<select name="idMedico" class="inputs"> 
							<?php
		                    include_once '../model/Medico.php';
                   			include_once '../DAO/MedicoDAO.php';

							$medicodao = new MedicoDAO();
							$medicos = $medicodao->listarTodos();

                   			if (isset($medicos)) {
                        		foreach ($medicos as $m) {
                            		echo "<option value='".$m->getId()."'";
                            		echo ">". $m->getArea() . " - " . $m->getNome();
                            	   echo "</option>";	
                    		}
                   			}
                    		?>        
					</select> <br/><BR/>
	
					<input type="submit" name="agendar" value="Agendar" class="submit" />
		</fieldset>
	</form>
</div>
</body>
</html>