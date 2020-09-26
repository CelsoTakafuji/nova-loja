<?php
	include_once("classes/DadosDoBanco.php");	
	include_once("classes/Lista.php");	
	$lista = new Lista();	
	$lista->setNumPagina($_GET["pg"]);
	$lista->setUrl("principal.php?link=6");
	
	$categoria 	= new DadosCategoria();
	$produto 	= new DadosProduto();

?>
<div id="accordion">
	<?php 
			$sql = "SELECT * FROM categoria WHERE ativo_categoria='S' and id_categoria IN ( SELECT id_categoria FROM produto ) order by ordem_categoria";
			$total = $categoria->totalRegistros($sql);
			for($i=0;$i<$total;$i++){
				$categoria-> verCategorias($sql,$i);
				$idcat = $categoria->getId();
	?>  
		  <h3><?php echo $categoria->getCategoria()?></h3>
			<div>
				<table cellpadding="0" cellspacing="0" border="1">
					<thead>
						<tr>
							<th>ID </th>
							<th>Titulo </th>
							<th>Ativo </th>
							<th>Editar </th>
							<th>Excluir </th>
						</tr>
					</thead>					
					<tbody>
						<?php $lista->listaProduto("WHERE id_categoria = '$idcat'");	?>
						
						<tr>
							<td colspan="5"><?php  $lista ->geraNumeros() ?></td> 
						</tr>
					</tbody>

				</table>	
			</div>
 <?php } ?>

</div>