

<div id="corpo-loja">

	<aside class="banner"> 
		<img src="<?php echo pg; ?>/admin/banner/<?php include_once("banner.php"); ?>">
	</aside>

	<section class="categorias">
		<h2 class="fundo_cor"> Categorias</h2>
		
		<nav>
			<ul>
				<?php include "sidebar.php" ?>
			</ul>
		</nav>
	
	</section>
	
	<div id="lado-direito">
		<h3 class="lado-direito-titulo titulo fundo_cor"> Lista de produtos </h3>
		<section class="vitrine">
				<?php 
					$sql = "SELECT * FROM categoria LIMIT 0,3 ";
					$total = $categoria->totalRegistros($sql);
					for($i=0;$i<$total;$i++){
						$categoria-> verCategorias($sql,$i);
						$idcat = $categoria->getId();
				?>
			<h2 class="lado-direito-subtitulo"> <?php echo $categoria->getCategoria()?> </h2>
				<ul>
					<?php 
							$produto->listarProdutos("SELECT c.*, p.* FROM categoria c,  produto p WHERE c.id_categoria=p.id_categoria and p.id_categoria = '$idcat'");
					?>
				</ul>
		<?php } ?>
	</div>
	



</div>