


<html>
<head><meta charset="UTF-8">
<title>lOGIN</title>
</head>
<body>
	<form action="/sisvenda/control/clienteLogin.php" method="get">
		<label for="login">Usuário</label>
		<input type="text" name="login"><br/>
		<label for="senha">Senha</label>
		<input type="password" name="senha"><br/>
		<input type="submit" value="Logar">
	</form>
	
<?php	
	session_start();
	if(isset($_SESSION['msg'])){
	    echo $_SESSION['msg'];
	}
	?>
</body>
</html>



