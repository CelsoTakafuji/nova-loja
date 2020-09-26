<?php 

	include_once("./classes/Lista.php");	
	$lista = new Lista();	
	$lista->setNumPagina($_GET["pg"]);
	$lista->setUrl($explode[1]);
	
?>

<h2> Lista de Categoria </h2>

<table cellpadding="0" cellspacing="0" border="1">
	<thead>
		<tr>
			<th>ID </th>
			<th>Categoria </th>
			<th>Ativo </th>
			<th>Editar </th>
			<th>Excluir </th>
		</tr>
	</thead>
	
	<tbody>
		<?php $lista->listaCategoria();	?>
		
		<tr>
			<td colspan="5"><?php  $lista ->geraNumeros() ?></td> 
		</tr>
	</tbody>

</table>