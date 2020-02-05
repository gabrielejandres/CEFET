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
		<title>Adicionando...</title>
		
		<meta charset="utf-8"/>
			
		<link rel="stylesheet" href="./css/index.css"/>
		
		<link rel="icon" href="./img/fundo.png" />
		
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		
	</head>
	<body>
<?php
		$username = $_SESSION['username'];
		$idamigo = $_SESSION['idamigo'];
		if(isset($_SESSION['amigosArray'])){
				$amigos_confirm = $_SESSION['amigosArray'];
		}
	
		$select_id = mysqli_query($conexao,"SELECT id FROM usuarios WHERE username = '$username' ") or die("Erro ao procurar id");
		$idArray = mysqli_fetch_array($select_id);
		$id = $idArray[0];
		$select_amigos = mysqli_query($conexao,"SELECT * FROM amigos WHERE id_pessoa = '$id' and status_amizade='Confirmado' or id_amigo = '$id' and status_amizade='Confirmado'") or die("Erro ao procurar id");
		$select_solic = mysqli_query($conexao,"SELECT * FROM amigos WHERE id_pessoa = '$id' and status_amizade='Solicitado' or id_amigo = '$id' and status_amizade='Solicitado'") or die("Erro ao procurar id");
		$cont = 0;
		while($linha = mysqli_fetch_array($select_amigos)){
			if($linha['id_pessoa']==$id){
					$amigos[$cont] = $linha['id_amigo'];
					//echo $amigos[$cont]."<br/>";
				}
				elseif($linha['id_amigo']==$id){
					$amigos[$cont] = $linha['id_pessoa'];
					//echo $amigos[$cont]."<br/>";
				}
			$cont++;
		}
		$solic = false;
		$cont2 = 0;
		echo $idamigo;
		while($linha = mysqli_fetch_array($select_solic)){
			if($linha['id_pessoa']==$id and $linha['id_amigo']==$idamigo){
					$solic = true;
				}
			$cont2++;
		}
		//print_r($amigos);
		$sucesso = $jaadc = false;
		if(isset($amigos)){
			if (count($amigos)>0){
				//echo "teste";
				//echo "<br/>";
				//print_r($amigos);
				foreach ($amigos as $i => $valor){
						if($amigos[$i] == $idamigo){
							echo "<br/><h1 id='msg'>Amigo ja adicionado</h1> <br/> <a href='home.php'><button class='logar'>Voltar</button></a>";
							$jaadc = true;
							break;
						}
				}	
			}
		}
			if($jaadc == false){
				//echo $username;
				//echo $id;
				//echo $idamigo;
				if($solic==false){
					$newamigo = mysqli_query($conexao, "INSERT INTO amigos(id_pessoa, id_amigo, status_amizade) VALUES ($id, $idamigo, 'Solicitado')") or die("Erro ao adicionar amigo");
					$sucesso = true;		
					$sql = mysqli_query($conexao,"SELECT id_amigo FROM amigos WHERE id_pessoa = '$id' ") or die("Erro ao procurar id");
					$amigos = mysqli_fetch_array($sql);	
					
					$_SESSION['amigosArray'] = $amigos;
				}
				else{
					echo "<br/><h1 id='msg'>Solicitacao ja enviada anteriormente</h1> <br/> <a href='home.php'><button class='logar'>Voltar</button></a>";
				}
			}		
		
	 
		mysqli_close($conexao);
		
if($sucesso == true){
	echo "<br/><h1 id='msg'>Solicitacao enviada com sucesso</h1> <br/> <a href='home.php'><button class='logar'>Voltar</button></a>";
}

mysqli_close($conexao);
?>
	</body>
</html>
