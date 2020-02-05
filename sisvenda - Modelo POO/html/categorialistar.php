<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Buscar categorias</title>
</head>
<body>
    <form action="\sisvenda\control\categoriabuscar.php" method="get">
        Descricao: <br/>
        <input type="text" name="descricao"/><br/>

        <input type="submit" name="Enviar"/>
	</form>
	<table border="1">

	<tr>

		<td> Id </td>
		<td> Nome </td>

	</tr>

	<?php
	   include_once '../model/Categoria.php';
	   session_start();
	   if (isset($_SESSION['categorias'])){

	       $categorias = $_SESSION['categorias'];

	       foreach ($categorias as $c){

	           echo "<tr>";

	           echo "<td>".$c->getId()."</td>";

	           echo "<td>".$c->getNome()."</td>";

	           echo "</tr>";

	       }

	       unset($_SESSION['categorias']);

	   }

	?>
	</table>
</body>
</html>
