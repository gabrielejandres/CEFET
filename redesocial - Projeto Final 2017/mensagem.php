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
		<title>Chat</title>
		
		<meta charset="utf-8"/>
			
		<link rel="stylesheet" href="./css/index.css"/>
		
		<link rel="icon" href="./img/fundo.png" />
		
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		<style>
			.chat{
				
				width: 500px;
				margin: 150px auto;
				padding: 5px;
				background:rgba(0,0,0,0.5);
				color:rgba(255,255,255,1);
				border:rgba(255,255,255,0.6) solid 1.5px;
				text-decoration: none;
				font-family: 'Josefin Sans', sans-serif;
			}
			.destinatario{
				background: rgba(178,34,34, 0.7);
				color: white;
				padding: 5px;
			}
			#ent{
				margin-top: -55px;
				float: right;
				margin-right: 10px;
			}
			#campomsg{
				margin-left: 15px;
				margin-top: 10px;
				background: rgba(255,255,255, 0.7);
				color: white;
			}
			.data{
				margin-top: -30px;
				float: right;
				margin-right: 10px;
				opacity: 0.6;
				font-size: 0.8em;
			}
			.msg{
				padding: 10px;
			}
			.chat:hover{
				background-color:rgba(0,0,0,0.8);
			}
		</style>
		
	</head>
	<body>
<?php	
		$username = $_SESSION['username'];
		$idamigo = $_SESSION['idamigo'];
		
		$query="SELECT id FROM usuarios where username = '$username'";
		$select_id = mysqli_query($conexao,$query);
		$idArray = mysqli_fetch_array($select_id);
		$id_remetente = $idArray[0];
		//echo $id_remetente;
		//echo $idamigo;
		date_default_timezone_set('America/Sao_Paulo');
		$date = date('Y-m-d H:i');
		//echo $date;

		if(isset($_POST['mensagem'])){
			$mensagem = $_POST['mensagem'];
			$sql = mysqli_query($conexao,"INSERT INTO mensagens(remetente, destinatario, mensagem, data) VALUES($id_remetente, $idamigo, '$mensagem', '$date')") or die("Erro ao tentar enviar mensagem");
			header("Location: mensagem.php"); //redireciona para os dados não serem duplicados
			echo $mensagem;
		}

?>
		<div class="chat">
			<div class="destinatario">
				<?php
					$select_nome = mysqli_query($conexao,"SELECT * FROM usuarios WHERE id = '$idamigo' ") or die("Erro ao procurar nome");
					$Arraynome = mysqli_fetch_array($select_nome);
					$nomedest = $Arraynome['nome'];
					echo $nomedest;
				?>
			</div>
			<div class="mensagens">
				<?php
					$select_msgs = mysqli_query($conexao,"SELECT * FROM mensagens WHERE destinatario = '$idamigo' and remetente = '$id_remetente' or destinatario = '$id_remetente' and remetente = '$idamigo' order by data ") or die("Erro ao procurar mensagens");
					$row = mysqli_num_rows($select_msgs);
					if($row>0){
						$select_msgs = mysqli_query($conexao,"SELECT * FROM mensagens WHERE destinatario = '$idamigo' and remetente = '$id_remetente' or destinatario = '$id_remetente' and remetente = '$idamigo' order by data ") or die("Erro ao procurar mensagens");
						$i = 0;
						while($msg = mysqli_fetch_array($select_msgs)){
							//print_r($msg);
							//$linha = $msg[$i];
							//echo "linha".$linha;
							$idrem = $msg['remetente'];
							//echo $idrem;
							$nome = mysqli_query($conexao,"SELECT nome FROM usuarios WHERE id = $idrem ") or die("Erro ao procurar remetente");
							$ArrayNome = mysqli_fetch_array($nome);
							$nome = $ArrayNome['nome'];
							echo "<div class='msg'>".$nome . ": <br/>";
							$mensagem = $msg['mensagem'];
							echo $mensagem . "</div>  ";
							$data = $msg['data'];
							echo "<div class='data'>". $data . "</div>";
							$i++;
						}
					}
				?>
			</div>
			<form action="#" method="post">
					<input type="text" placeholder="Digite sua mensagem" name="mensagem" size="45" id="campomsg"/></br></br>
					
					<input type="submit" value="Enviar" id="ent"/>
			</form>
		</div>
		<button class="cad"><a href="home.php">Meu Perfil</a></button>
		<?php
			mysqli_close($conexao);
		?>
	</body>
</html>