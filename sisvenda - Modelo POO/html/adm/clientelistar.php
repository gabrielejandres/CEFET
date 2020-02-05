<html>
<head>
<meta charset="UTF-8">
<title>Buscar Cliente</title>
</head>
<body>
	<form action="/sisvenda/control/clientebuscar.php" method="get">
		<p>
			Nome: <input type="text" name="nome">
		
		
		<p>
			<input type="submit" name="adicionar" value="Adicionar">
	
	</form>
	<table border="1">
		<tr>
			<td>ID</td>
			<td>Nome</td>
			<td>CPF</td>
			<td>Login</td>
			<td>Endereço</td>
			<td>Senha</td>
		</tr>
		<?php
    include_once '../model/Cliente.php';
    session_start();
    if(isset($_SESSION['clientes'])){
        $clientes= $_SESSION['clientes'];
        foreach ($clientes as $c){
            echo "<tr>";
            echo "<td>" . $c->getId() . "</td>";
            echo "<td>" . $c->getNome() . "</td>";
            echo "<td>" . $c->getCpf() . "</td>";
            echo "<td>" . $c->getLogin() . "</td>";
            echo "<td>" . $c->getEndereco() . "</td>";
            echo "<td>" . $c->getSenha() . "</td>";
            echo "</tr>";
        }
        unset($_SESSION['clientes']);
    }
    ?>
	</table>
    