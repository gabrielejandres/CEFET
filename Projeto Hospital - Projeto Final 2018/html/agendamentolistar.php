<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Agendamentos</title>
<link rel="shortcut icon" href="../docs/logo.png" type="image/x-icon" />
</head>
<body>
    <form action="\Projeto Hospital\control\agendamentobuscar.php" method="get">
      Selecione seu nome: <BR/>
          <select name="paciente" class="inputs"> 
              <?php
                        include_once '../model/Paciente.php';
                        include_once '../DAO/PacienteDAO.php';

              $pacientedao = new PacienteDAO();
              $pacientes = $pacientedao->listarTodos();
              

                        if (isset($pacientes)) {
                            foreach ($pacientes as $p) {
                                echo "<option value='".$p->getId()."'";
                                echo ">". $p->getNome() . " " . $p->getSobrenome();
                                 echo "</option>";  
                        }
                        }
                        ?>        
          </select> <br/><BR/>

      <input type="submit" value="Mostrar agendamentos"/><br/>
    </form><br/>
    <table border="1">

    <tr>
      <td> Paciente </td>
      <td> Médico </td>
      <td> Dia </td>
      <td> Horário </td>

    </tr>

    <?php
        /* allow_url_include php.ini*/
        define('RAIZ','http://localhost/Projeto Hospital');
        include_once '../model/Agendamento.php';
        include_once '../model/Medico.php';
        include_once  '../DAO/MedicoDAO.php';
        include_once '../model/Paciente.php';
        include_once  '../DAO/PacienteDAO.php';
        session_start();

        if(isset($_SESSION['agendamentos'])){
          $agendamentos = $_SESSION['agendamentos'];

          foreach ($agendamentos as $a) {
            echo "<tr>";

           echo "<td>".$a->getIdPaciente()->getNome() . " ". $a->getIdPaciente()->getSobrenome() ."</td>";

           echo "<td>".$a->getIdMedico()->getNome() . " - ".  $a->getIdMedico()->getArea()  ."</td>";

           echo "<td>".$a->getDia() ."</td>";

           echo "<td>".$a->getHorario() ."</td>";

           echo "</tr>";
          }
          unset($_SESSION['agendamentos']);
        }

     ?>
    </form>
</body>
</html>
