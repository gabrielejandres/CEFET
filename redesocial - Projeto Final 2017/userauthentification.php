<?php

$conexao = mysqli_connect("localhost", "root", "","cadastro");

 if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
  }

?>

<html>

	<head>
		<title>Autentificando Usuário</title>
		<meta charset="utf-8"/>
		
		<link rel="stylesheet" href="./css/index.css"/>
		
		<link rel="icon" href="./img/fundo.png" />
		
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		
	</head>

<body>

<?php
session_start();
	if ($_SERVER['REQUEST_METHOD']=="POST"){
		$username=$_POST['username'];
		$password=$_POST['senha'];

		$sql = mysqli_query($conexao, "SELECT * FROM usuarios WHERE username = '$username'") or die("Erro ao listar usuarios");
		$arrayUsuario = mysqli_fetch_array($sql);
		//echo $arrayUsuario['senha'];
		$row = mysqli_num_rows($sql);
		//echo $row;

		if($row > 0){
			$senha_BD = $arrayUsuario['senha'];
			$salt = $arrayUsuario['salt'];
			$confirm = hash('sha512',$password.$salt);
			if($senha_BD==$confirm){
				$id = mysqli_query($conexao,"SELECT id FROM usuarios WHERE username = '$username'") or die("Erro ao listar usuarios");
				$_SESSION['username']=$_POST['username'];
				$_SESSION['id']=$id;
				header("Location: home.php"); 
				die();
			}
		} 
		else{
			header("Location: errologin.php");
			die();
		}
	}

	mysqli_close($conexao);
?>
</body>

</html>﻿