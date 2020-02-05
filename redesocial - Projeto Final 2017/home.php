<?php

$conexao = mysqli_connect("localhost", "root", "","cadastro");

 if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
 }

?>
<?php
	session_start();
	$sem = false;

	if(!isset($_SESSION['username'])){
		if(isset($_GET['uid'])){
			$sem = true;
			$uid = $_GET['uid'];
			
			$ids = mysqli_query($conexao,"SELECT count(id) FROM usuarios ") or die("Erro ao contar ids");
			$arrayIds = mysqli_fetch_array($ids);
			$qtd = $arrayIds[0];
			//echo $qtd;
			if($uid<=$qtd){

				$sql = mysqli_query($conexao,"SELECT * FROM usuarios WHERE id = '$uid' ") or die("Erro ao procurar id");
				$array = mysqli_fetch_array($sql);
				
				$usuario['id'] = $array['id'];
				$usuario['nome'] = $array['nome'];
				$usuario['sobrenome'] = $array['sobrenome'];
				$usuario['sexo'] = $array['sexo'];
				$usuario['email'] = $array['email'];
				$usuario['username'] = $array['username'];
				
				$dadosusuario = $usuario;
			}
			else{
					header("Location: usuarioinvalido.php");
			}		
		}
		else{
			header("Location: erros.php");
			die();
		}
	}
	else{
			$username = $_SESSION['username'];
			//echo $username;
			$sql1 = mysqli_query($conexao,"SELECT id FROM usuarios WHERE username = '$username' ") or die("Erro ao procurar id do usuario");
			$array = mysqli_fetch_array($sql1);
			$id = $array['id'];
			//echo $id;
			$sql = mysqli_query($conexao,"SELECT * FROM amigos WHERE id_pessoa = '$id' and status_amizade = 'Confirmado' or id_amigo = '$id' and status_amizade = 'Confirmado'") or die("Erro ao procurar amigos");

			$i = 0;
			while( $linha = mysqli_fetch_array($sql)){
				if($linha['id_pessoa']==$id){
					$amigos[$i] = $linha['id_amigo'];
					//echo $amigos[$i]."<br/>";
				}
				elseif($linha['id_amigo']==$id){
					$amigos[$i] = $linha['id_pessoa'];
					//echo $amigos[$i]."<br/>";
				}
				$i++;
			}
			if(isset($amigos)){
				$_SESSION['amigosArray'] = $amigos;
			}
			//solicitações de amizade
			$novosamigos[0]="Não há solicitações";
			//echo $username;
			$select_id = mysqli_query($conexao,"SELECT id FROM usuarios WHERE username = '$username' ") or die("Erro ao procurar id");
			$idArray = mysqli_fetch_array($select_id);	
			$id = $idArray[0];
			//echo $id;
			$sql = mysqli_query($conexao,"SELECT * FROM amigos WHERE id_amigo = '$id' and status_amizade = 'Solicitado' ") or die("Erro ao procurar amigos");
			$a=1;
			while($array = mysqli_fetch_array($sql)){
				//print_r($array);
				$novoamigo = $array['id_pessoa'];
				//echo $novoamigo . "<br/>";
				$select_nome = mysqli_query($conexao,"SELECT nome FROM usuarios WHERE id = '$novoamigo' ") or die("Erro ao procurar nome de usuario");
				$arraynome = mysqli_fetch_array($select_nome);
				$novosamigos[$a] = $arraynome['nome'];
				$a++;
			}
			//print_r($novosamigos);
			//echo "variavel" . $sol;
			
			//print_r($amigos);
			if(isset($_GET['uid'])){
				$sem = true;
				$uid = $_GET['uid'];
				
				$ids = mysqli_query($conexao,"SELECT count(id) FROM usuarios ") or die("Erro ao contar ids");
				$arrayIds = mysqli_fetch_array($ids);
				$qtd = $arrayIds[0];
				//echo $qtd;
				
				if($uid<=$qtd){

					$sql = mysqli_query($conexao,"SELECT * FROM usuarios WHERE id = '$uid' ") or die("Erro ao procurar id");
					$array = mysqli_fetch_array($sql);	
					
					$usuario['nome'] = $array['nome'];
					$usuario['sobrenome'] = $array['sobrenome'];
					$usuario['sexo'] = $array['sexo'];
					$usuario['email'] = $array['email'];
					$usuario['username'] = $array['username'];
						
					$dadosusuario = $usuario;
					$_SESSION['idamigo'] = $uid;
					echo "<br/><a href='adicionar.php'><button class='adc'>Adicionar amigo</button></a>";
					echo "<br/><a href='mensagem.php'><button class='enviar_msg'>Enviar mensagem</button></a>";
				}
				else{
					header("Location: usuarioinvalido.php");
				}
				
			}
		else{
				$sql = mysqli_query($conexao,"SELECT * FROM usuarios WHERE username = '$username' ") or die("Erro ao procurar id");
				$array = mysqli_fetch_array($sql);
				
				$usuario['nome'] = $array['nome'];
				$usuario['sobrenome'] = $array['sobrenome'];
				$usuario['sexo'] = $array['sexo'];
				$usuario['email'] = $array['email'];
				$usuario['username'] = $array['username'];
					
				$dadosusuario = $usuario;
		}
	}
		
?>

<html>
	<head>
		<title>Sugar Pics</title>
		<meta charset="utf-8"/>
		
		<link rel="stylesheet" href="./css/index.css"/>
		
		<link rel="icon" href="./img/fundo.png" />
		
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		
		
		<?php
			$url = "usuarios/".$dadosusuario['username']."/background.jpeg";
			$perfil = "usuarios/".$dadosusuario['username']."/portrait.jpeg";
		?>
		<style rel="stylesheet" type="text/css">
			body{
				margin:auto;
				background: url("<?php echo $url;?>");
				background-size: 100%;
				height: 100%;
			}
			.lista_sol{
				background-color: rgba(255,255,255,0.4);
				border-radius: 20px;
				text-align: center;
				width: 250px;
				margin-right: 50px;
				float: right;
				color: #fff;
				text-shadow: 2px 2px 2px #000;
				font-family: 'Josefin Sans', sans-serif;
			}
			.adc{	
				position: absolute;
				margin-top: 200px;
				margin-left: 750px; 
				border-radius:25px;
				width: 150px;
				padding: 5px;
				background:rgba(0,0,0,0.7);
				color:rgba(255,255,255,0.8);
				border:rgba(255,255,255,0.8) solid 1.5px;
				text-decoration: none;
				font-family: 'Pacifico', cursive;
			}
			.enviar_msg{
				position: absolute;
				margin-top: 240px;
				margin-left: 750px; 
				border-radius:25px;
				width: 150px;
				padding: 5px;
				background:rgba(0,0,0,0.7);
				color:rgba(255,255,255,0.8);
				border:rgba(255,255,255,0.8) solid 1.5px;
				text-decoration: none;
				font-family: 'Pacifico', cursive;
			}
			.confirmar{
				position: absolute;
				float: left;
				border-radius:25px;
				width: 120px;
				padding: 5px;
				margin-top: 1%;
				background:rgba(0,0,0,0.7);
				color:rgba(255,255,255,0.8);
				border:rgba(255,255,255,0.8) solid 1.5px;
				text-decoration: none;
				font-family: 'Pacifico', cursive;
			}
			.negar{
				margin-top: -6.5%;
				float: left;
				border-radius:25px;
				width: 120px;
				padding: 5px;
				background:rgba(0,0,0,0.7);
				color:rgba(255,255,255,0.8);
				border:rgba(255,255,255,0.8) solid 1.5px;
				text-decoration: none;
				font-family: 'Pacifico', cursive;
			}
		</style>
		<script src="./JS/jquery.min.js"></script>
	</head>
	<body>
	<header class="header">
			<div class="menu">
				<img class="logo" src="./img/logo.png"/>
				<nav>
					<ul>
						<li><a href="home.php" >Minha conta</a></li>
						<li><a href="#">Timeline </a></li>
						<li><a href="#">Explorar </a></li>
					</ul>
				</nav>	
			</div>
		<div>
			<img src="<?php echo $perfil;?>" class="perfil"/>
		</div>
		<div class="informations">
			<h1><?php 
				echo $dadosusuario['nome'] . " ";
				echo $dadosusuario['sobrenome'];
			?></h1>
			<h3 class="information"><?php 
				echo "Sexo:" . " " . $dadosusuario['sexo'];
				echo "<br/>";
			?></h3>
			<h3 class="information"><?php 
				echo "Usuário:" . " " .  $dadosusuario['username'];
				echo "<br/>";
			?></h3>
			<h3 class="information"><?php 
				echo "E-mail:" . " " .  $dadosusuario['email'];
				echo "<br/>";
			?></h3>
			
		</div>
		<?php if(!isset($_SESSION['username'])){?>
			<a href="index.php"><button class="logout">Login</button></a>
		<?php } ?>
		
		<?php if($sem===false){?>
		<div class="lista">
			<h1> Meus amigos: </h1>
			<?php 
			if(isset($amigos)){
				if(count($amigos)>0){
					//print_r($amigos);
					foreach ($amigos as $i => $valor){
							$idamigo = $amigos[$i];
						$sql = mysqli_query($conexao,"SELECT nome FROM usuarios WHERE id = '$idamigo' ") or die("Erro ao procurar nome dos amigos");
						$array = mysqli_fetch_array($sql);
						//print_r($array);
						
						$amigo['nome'] = $array['nome'];
						echo $amigo['nome'] . "<br/>";
					}
				}
			}
			else{
				echo "Ainda não há amigos.";
			}
		}?>
		</div>
		<!--solicitações-->
		<?phpif($sem==false){?>
		<div class="lista_sol">
		<h1> Solicitações: </h1>
			<?php 
			if(count($novosamigos)>0){
				if(count($novosamigos)==1){
					echo $novosamigos[0];
				}
				else{
					foreach ($novosamigos as $i => $valor){
						?>
						<div class="nome">
						<?php
						if($valor !="Não há solicitações"){
							echo $valor; 
						
						?></div>
						<?php
						echo "<form action='confirmar.php'><input class='confirmar' type='submit' name='confirmar' value='Confirmar $valor'></input></form>" . "<br/>";
						echo "<form action='negar.php'><input class='negar' type='submit' name='negar' value='Negar $valor'></input></form>" . "<br/>";
						}
					}
				}
			}?>
		</div>
		<?php}
		mysqli_close($conexao);
		?>
		<a href="logout.php"><button class="logout">Sair</button></a>
		
	</body>
</html>