<?php
 $conexao = mysqli_connect("localhost", "root", "","cadastro");

 if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
  }

?>
<html>
	<head>
		<title>Cadastrando...</title>
		
		<meta charset="utf-8"/>
			
		<link rel="stylesheet" href="./css/index.css"/>
		
		<link rel="icon" href="./img/fundo.png" />
		
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		
	</head>
	<body>
<?php
if(isset($_POST['username'])){
	if(isset($_FILES['portrait']) && isset($_FILES['background'])){
		
		$nome=trim($_POST['nome']);
		$sobrenome=trim($_POST['sobrenome']);
		$sexo=$_POST['sexo'];
		$email=$_POST['email'];
		$username=trim($_POST['username']);
		$senha=$_POST['senha'];
		//$senha_crip = hash("SHA512", $senha);
		$confirm=$_POST['csenha'];
		$portrait=$_FILES['portrait']['tmp_name']; 
		$background=$_FILES['background']['tmp_name']; 
		$erroimg = $errosenha = $nomevazio = $errouser = $sucesso = false;
		
		//coluna salt - segurança de senha
		$salt = rand();
		$senha_crip = hash('sha512',$senha.$salt);
		
		if($_FILES['background']['type']!= "image/jpeg" || $_FILES['portrait']['type']!= "image/jpeg"){
			$erroimg = true;
			echo "<br/><h1 id='msg'>Formato de imagem inválido! </h1> <br/> ";
		}
		if($nome == ""){
			$nomevazio = true;
			echo "<br/><h1 id='msg'>Nome inválido. </h1> <br/>";
		}
		if($senha != $confirm ){
			$errosenha = true;
			echo "<br/><h1 id='msg'>Senhas não correspondem!!! </h1> <br/>";
		}
		if($username == "" or substr_count($username," ")!=0){
			$errouser = true;
			echo "<br/><h1 id='msg'>Usuário inválido. <br/> Insira um nome de usuário válido. </h1> <br/>";
		}
		
		 $query="SELECT * FROM usuarios";
		 echo $username;
 
		if ($usuario = mysqli_query($conexao, "SELECT * FROM usuarios WHERE username = '$username'")){
			 $row = mysqli_num_rows(mysqli_query($conexao, $query));
			 $row_igual = mysqli_num_rows($usuario);
			 echo $row_igual;
			 $id = $row+1;
			
			if($errosenha == false && $erroimg == false && $nomevazio == false && $errouser == false){
				if($row_igual==0){
					if(!(file_exists('usuarios/'.$username))){
					
						$dir=mkdir('usuarios/'.$username);
					
						if($dir==1){
							
							$dst='usuarios/'.$username.'/portrait.jpeg'; 
							$dst2 = 'usuarios/'.$username.'/background.jpeg';
									
							move_uploaded_file($_FILES['portrait']['tmp_name'],$dst);
							move_uploaded_file($_FILES['background']['tmp_name'],$dst2);
							
							$sql = mysqli_query($conexao,"INSERT INTO usuarios(id,nome,sobrenome,sexo,email,username,senha,salt) VALUES($id,'$nome', '$sobrenome', '$sexo', '$email', '$username', '$senha_crip',$salt)") or die("Erro ao tentar cadastrar registro");
							$sucesso = true;
						}
					}
				}
				else{
					echo "<br/><h1 id='msg'>Usuário já cadastrado. </h1> <br/> <a href='index.php'><button class='logar'>Fazer login</button></a>";
				}	
			}				
		}		
			 mysqli_free_result($usuario);
		}
		else {
			echo "Erro inserindo novo valor. Listando erros ... <br>";
			echo "<pre>";
			print_r(mysqli_error_list($conexao));
			echo "</pre>";
		}
	 
		mysqli_close($conexao);
		
	}
	echo $sucesso;
if($sucesso == true){
	echo "<br/><h1 id='msg'>Cadastro Efetuado com Sucesso</h1> <br/> <a href='index.php'><button class='logar'>Fazer login</button></a>";
}
if($errosenha == true or $nomevazio == true or $erroimg == true or $errouser == true ){
	echo " <a href='cadastrar.php'><button class='logar'>Cadastrar</button></a>";
}
mysqli_close($conexao);
?>
	</body>
</html>
