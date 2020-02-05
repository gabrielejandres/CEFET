<!DOCTYPE html>
<html>
	<head>
		<title>Cadastre-se</title>
		<meta charset="utf-8"/>
		
		<link rel="stylesheet" href="./css/index.css"/>
		
		<link rel="icon" href="./img/fundo.png" />
		
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		
	</head>
	<body>
			<button class="cad"><a href="index.php">Voltar</a></button>
		<div class="caixa">
			<img class="logo "src="./img/logo.png"/>
			<h1 class="title"> Novo por aqui? Cadastre-se: </h1>
			<form name="signup" method="post" action="cadastrando.php" enctype="multipart/form-data">
				<input type="text" placeholder="Nome" name="nome" class="box"/>
				<input type="text" placeholder="Sobrenome" name="sobrenome" class="box"/></br></br>
				
				<label for="sexo">Sexo:</label>
				<input type="radio" name="sexo" class="sexo" value="F">F</input>
				<input type="radio" name="sexo" class="sexo" value="M">M</input>
				<input type="radio" name="sexo" class="sexo" value="Outro">Outro</input></br></br>
				
				
				<input type="email" placeholder="Email" name="email" class="box" size="46"/></br></br>
				<input type="text" placeholder="Nome de usuário" name="username" class="box" size="46"/></br></br>
				
				<input type="password" placeholder="Senha" name="senha" class="box" size="18"/>
				<input type="password" placeholder="Confirmação da senha" name="csenha" class="box" size="21"/>
				</br></br>
				
				<label for="portrait">Ícone:</label>
				<input type="file" name="portrait" class="arq"/><br/>
						
				<label for="background">Background:</label>
				<input type="file" name="background" class="arq"/><br/><br/>
				
				<input type="submit" value="Cadastrar" id="ent"/>
			</form>
		</div>
		<footer class="footer">
			<div class="autoria">
				<p> © Created by Ana Clara Faria & Gabriele Jandres</p>
			</div>
		</footer>
	</body>
</html>