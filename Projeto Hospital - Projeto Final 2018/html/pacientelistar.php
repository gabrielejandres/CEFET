<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Buscar pacientes</title>
<link rel="shortcut icon" href="../docs/logo.png" type="image/x-icon" />
</head>
<body>
    <form action="\Projeto Hospital\control\pacientebuscar.php" method="get">
      Nome: <br/>
      <input type="text" name="nome">

      <input type="submit" name="Enviar"/>
    </form>
    <table border="1">
    <br/>
    <tr>
      <td> Id </td>
      <td> Nome </td>
      <td> Sobrenome </td>
      <td> Cpf </td>
	  <td> Endereço </td>
      <td> Email </td>
      <td> Telefone </td>
      <td> Celular </td>
	  <td> RG </td>
      <td> Data de Nascimento </td>
    </tr>

    <?php
        include_once '../model/Paciente.php';
        session_start();

        if(isset($_SESSION['pacientes'])){
          $pacientes = $_SESSION['pacientes'];

          foreach ($pacientes as $p) {
           echo "<tr>";

           echo "<td>".$p->getId()."</td>";

           echo "<td>".$p->getNome()."</td>";

           echo "<td>".$p->getSobrenome()."</td>";

           echo "<td>".$p->getCpf()."</td>";

		   echo "<td>".$p->getEnd()."</td>";

		   echo "<td>".$p->getEmail()."</td>";

		   echo "<td>".$p->getTel()."</td>";

		   echo "<td>".$p->getCel()."</td>";

		   echo "<td>".$p->getRg()."</td>";

		   echo "<td>".$p->getDataNas()."</td>";

           echo "</tr>";
          }
          unset($_SESSION['pacientes']);
        }

     ?>
    </form>
</body>
</html>
