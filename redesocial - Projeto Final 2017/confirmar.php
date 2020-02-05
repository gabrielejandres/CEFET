<?php

 $conexao = mysqli_connect("localhost", "root", "","cadastro");

 if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
  }

 session_start();
?>
<html>
	<head>
		<title>Confirmando amizade...</title>
		
		<meta charset="utf-8"/>
			
		<link rel="stylesheet" href="./css/index.css"/>
		
		<link rel="icon" href="./img/fundo.png" />
		
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		
	</head>
	<body>
<?php
	$usuario = $_SESSION['username'];
	//echo $usuario;
	$amigo = $_GET['confirmar'];
	
	//pegando o valor do nome do amigo
	list ($confirmar, $amigo) = explode (' ', $amigo);
	
	//echo $amigo;
	
		$sql1 = mysqli_query($conexao, "SELECT * FROM usuarios WHERE username = '$usuario'") or die("Erro ao listar id");
		$array1 = mysqli_fetch_array($sql1);
		//print_r($array1);
		$id = $array1['id'];
		//echo $id;

		$sql = mysqli_query($conexao, "SELECT * FROM usuarios WHERE nome = '$amigo'") or die("Erro ao listar id");
		$row = mysqli_num_rows($sql);
		$array = mysqli_fetch_array($sql);
		//print_r($array);

		if($row > 0){
			$idamigo = $array['id'];
			//echo $id;
			//echo $idamigo;
			$sql = mysqli_query($conexao,"update amigos set status_amizade='Confirmado' where id_amigo=$id and id_pessoa=$idamigo ") or die("Erro ao tentar confirmar amizade");
			echo "<br/><h1 id='msg'>Amizade confirmada com Sucesso</h1> <br/> <a href='home.php'><button class='logar'>Voltar</button></a>";
		} 
		mysqli_close($conexao);
?>
	</body>
</html>