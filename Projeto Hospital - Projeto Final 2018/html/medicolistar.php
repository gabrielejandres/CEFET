<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Buscar medicos</title>
<link rel="shortcut icon" href="../docs/logo.png" type="image/x-icon" />
</head>
<body>
    <form action="\Projeto Hospital\control\medicobuscar.php" method="get">
      Area: <br/>
      <input type="text" name="area">

      <input type="submit" name="Enviar"/>
    </form>
    <table border="1">

    <tr>

      <td> Id </td>
      <td> Nome </td>
      <td> Area </td>

    </tr>

    <?php
        include_once '../model/Medico.php';
        session_start();

        if(isset($_SESSION['medicos'])){
          $medicos = $_SESSION['medicos'];

          foreach ($medicos as $p) {
            echo "<tr>";

           echo "<td>".$p->getId()."</td>";

           echo "<td>".$p->getNome()."</td>";

           echo "<td>".$p->getArea()."</td>";

           echo "</tr>";
          }
          unset($_SESSION['medicos']);
        }

     ?>
    </form>
</body>
</html>
