<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Buscar clientes</title>
</head>
<body>
    <form action="\sisvenda\control\clientebuscar.php" method="get">
        Nome: <br/>
        <input type="text" name="nome"/><br/>

        <input type="submit" name="Enviar"/>
	</form>
	<table border="1">

	<tr>

		<td> Id </td>
		<td> Nome </td>
		<td> CPF </td>
		<td> Login </td>
		<td> Endere�o </td>

	</tr>

	<?php
	   include_once '../model/Cliente.php';
	   session_start();
	   if (isset($_SESSION['clientes'])){

	       $clientes = $_SESSION['clientes'];

	       foreach ($clientes as $c){

	           echo "<tr>";

	           echo "<td>".$c->getId()."</td>";

	           echo "<td>".$c->getNome()."</td>";

	           echo "<td>".$c->getCPF()."</td>";

	           echo "<td>".$c->getLogin()."</td>";

	           echo "<td>".$c->getEnd()."</td>";

	           echo "</tr>";

	       }

	       unset($_SESSION['clientes']);

	   }

	?>
	</table>
</body>
</html>
