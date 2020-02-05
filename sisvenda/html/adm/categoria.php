<html>
<head>
	<meta charset="UTF-8">
	
</head>
<body>
	<form method="get" action="/sisvenda/control/control.php">
	<fieldset>
		<legend>Registrar Categoria</legend>
		<label for="descricao">Descrição</label>
		<input type="text" name="descricao"><br>
		<input type="hidden" name="nomeClasse" value="CategoriaControl">
		<input type="hidden" name="metodo" value="incluir">
		<input type="hidden" name="nextPage" value="/sisvenda/html/msg.php">
		<input type="submit">
	</fieldset>
	</form>
<p> <?php if (isset($_GET['msg'])){
    echo ($_GET['msg']);
}?>	
</body>
</html>
<?php
