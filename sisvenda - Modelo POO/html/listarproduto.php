<html>
<head>
<meta charset="utf-8">
<title>Buscar Produto</title>
</head>
<body>
	<form action="/sisvenda/control/control.php" method="get">
	<label for="nome"> Nome: </label>	
	<input type="text" name="nome">
	<input type="hidden" name="nomeClasse" value="ProdutoControl">
	<input type="hidden" name="metodo" value="listar">
	<input type="hidden" name="nextPage" value="/sisvenda/html/listarproduto.php">
	<input type="submit" name="listar" value="Listar">
	</form>
	<form action="/sisvenda/control/control.php" method="get">
	<input type="hidden" name="nomeClasse" value="ProdutoControl">
	<input type="hidden" name="metodo" value="listarPromocao">
	<input type="hidden" name="nextPage" value="/sisvenda/html/listarproduto.php">
	<input type="submit" name="listarPromocao" value="Listar promocionais">
	</form>
	<table border="1">
		<tr>
			<td>ID</td>
			<td>Nome</td>
			<td>Descrição</td>
			<td> R$</td>
			<td> Preço promocional</td>
			<td>Categoria</td>
			<td> Ação </td>
		</tr>
		<?php
		
		
		
/* allow_url_include php.ini*/
//define('RAIZ','http://localhost/sisvenda/');
include_once '../model/Produto.php';
include_once '../model/Categoria.php';
//include_once  RAIZ. '/dao/CategoriaDAO.php';

session_start();

if (isset($_SESSION['produtos'])) {
 
    $produtos = $_SESSION['produtos'];
    foreach ($produtos as $p) {
        echo "<tr>";
        echo "<td>" . $p->getId() . "</td>";
        echo "<td>" . $p->getNome() . "</td>";
        echo "<td>" . $p->getDescricao() . "</td>";
        echo "<td>" . $p->getPreco() . "</td>";
        if($p->getPromocao()!=null){
        	$desconto = $p->getPreco()*$p->getPromocao();
        	echo "<td>" . $p->getPreco()*(1-$p->getPromocao()) . "</td>";
        }
        else{
        	echo "<td>Indisponível</td>";
        }
        
        echo "<td>" . $p->getCategoria()->getDescricao(). "</td>";
        
        $str = "<td> <a href=/sisvenda/control/control.php?";
        $str = $str."nomeClasse=Carrinho&metodo=add";
        $str = $str."&nextPage=/sisvenda/html/carrinho.php";
        $str = $str."&id=".$p->getId()."> Comprar </a></td></tr>";
        echo $str;
    }
    unset($_SESSION['produtos']);
}
?>
	</table>
</body>
</html>

