<!DOCTYPE html>
<html>
<head>
<?php 
include_once '../../model/Produto.php';
include_once '../../model/Categoria.php';

/* Novo produto */
$produto = new Produto("", "", "");
$cat = new Categoria();
$cat->setId(null);
$produto->setCategoria($cat);


/* Alterar um produto */
session_start();
if (isset($_SESSION['produto'])){
    $produto = $_SESSION['produto'];
}
?>
<meta charset="UTF-8">
<title> Registrar Produto </title>
</head>
<body>
	<fieldset> 
		<legend> Registrar Produto </legend>
		<form action="/sisvenda/control/control.php">
		<p> Nome: <input type="text" name="nome" value=<?php echo $produto->getNome();?>>
		<p> Descrição: <input type="text" name="descricao" value="<?php echo $produto->getDescricao();?>">
		<p> Preço: <input type="number" name="preco" step="0.01" value=<?php echo $produto->getPreco();?>>
		<p> Categoria: 
			<select name="idCategoria"> 
					<?php
                    include_once '../model/Categoria.php';
                    include_once '../dao/CategoriaDAO.php';
                    if (isset($_SESSION['categorias'])) {
                        $categorias = $_SESSION['categorias'];
                        foreach ($categorias as $c) {
                            echo "<option value='".$c->getId()."'";
                            if ($produto->getCategoria()->getId()==$c->getId()) {
                                echo "selected = 'selected'"; 
                            }                           
                            echo ">". $c->getDescricao();
                            echo "</option>";
                        }
                    }
                    ?>
			</select> 		
		<input type="hidden" name="nomeClasse" value="ProdutoControl">
		<input type="hidden" name="id" value=<?php echo $produto->getId();?>>
		<input type="hidden" name="nextPage" value="/sisvenda/html/msg.php"> <br>
		<?php
		if (!isset($_SESSION['produto'])){   
	        $str = '<input type="submit" name="metodo" value="incluir">';
		}
		else {
	           $str = '<input type="submit" name="metodo" value="alterar">';
	           $str = $str.'<input type="submit" name="metodo" value="excluir">';
		}
		echo $str;
		?>
		
		
		</form>
	<p> <?php if (isset($_GET['msg'])) echo($_GET['msg']);
	 $_SESSION['produto'] = null;
	 $_SESSION['categorias'] = null;
	 ?>	
	</fieldset>
</body>
</html>