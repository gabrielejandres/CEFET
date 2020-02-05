<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Buscar produtos</title>
</head>
<body>
    <form action="\sisvenda\control\produtobuscar.php" method="get">
        Nome: <br/>
        <input type="text" name="nome"/><br/>
        
        <input type="submit" name="Enviar"/>
	</form>
	<table border="1">

	<tr>

		<td> Id </td> <td> Nome </td> 

		<td> Descrição </td> <td> Preço </td>

	</tr>	
	
	<?php 
	   include_once '../model/Produto.php';
	   session_start();
	   if (isset($_SESSION['produtos'])){
	       
	       $produtos = $_SESSION['produtos'];
	       
	       foreach ($produtos as $p){
	           
	           echo "<tr>";
	           
	           echo "<td>".$p->getId()."</td>";
	           
	           echo "<td>".$p->getNome()."</td>";
	           
	           echo "<td>".$p->getDescricao()."</td>";
	           
	           echo "<td>".$p->getPreco()."</td>";
	           
	           echo "</tr>";
	           
	       }
	       
	       unset($_SESSION['produtos']);
	       
	   }
	   
	?>
	</table>
</body>
</html>