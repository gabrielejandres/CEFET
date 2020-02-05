<html>
<head>
<meta charset="UTF-8">
<title>Buscar Produto</title>
</head>
<body>
	
	<table border="1">
		<tr>
			<td> ID</td>
			<td> Nome</td>
			<td> R$</td>
			<td> Qtd</td>
			<td> Total </td>
			<td> Excluir </td>
		</tr>
<?php			
include_once '../model/Produto.php';
include_once '../model/Item.php';
include_once '../model/Categoria.php';

session_start();
if (isset($_SESSION['carrinho'])) {
 
    $itens = $_SESSION['carrinho'];
    foreach ($itens as $i) {
        echo "<tr>";
        echo "<td>" . $i->getProduto()->getId() . "</td>";
        echo "<td>" . $i->getProduto()->getNome() . "</td>";
        echo "<td>" . $i->getProduto()->getPreco() . "</td>";
        echo "<td>" . $i->getQtd() . "</td>";
        echo "<td>" . $i->getProduto()->getPreco()*$i->getQtd()  . "</td>";
        
        $str = "<td> <a href=/sisvenda/control/control.php?";
        $str = $str."nomeClasse=Carrinho&metodo=add";
        $str = $str."&nextPage=/sisvenda/html/carrinho.php";
        $str = $str."&id=> Comprar </a></td></tr>";
        echo $str;
    }
}
?>
	</table>
</body>
</html>

