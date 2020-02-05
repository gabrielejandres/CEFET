<!DOCTYPE html>
<html>
	<head>
		<title>Login - Sugar Pics</title>
		
		<meta charset="utf-8"/>
		
		<link rel="stylesheet" href="./css/index.css"/>
		
		<link rel="icon" href="./img/fundo.png" />
		
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		
	</head>
	<body>
			<button class="cad"><a href="cadastrar.php">Cadastrar-se</a></button>
		
		<div class="log">
			<img class="logo" src="./img/logo.png"/>
			<h1 class="title">Welcome to Sugar Pics </h1>
			<form action="userauthentification.php" method="post">
			
				<input type="text" placeholder="Nome de usuário" name="username" class="box"/></br></br>
				<input type="password" placeholder="Senha" name="senha"class="box"/></br></br>
				
				<input type="submit" value="Entrar" id="ent"/>
			</form>
		</div>
		<footer class="footer">
			<div class="autoria">
				<p> © Created by Ana Clara Faria & Gabriele Jandres</p>
			</div>
		</footer>
	</body>
</html>