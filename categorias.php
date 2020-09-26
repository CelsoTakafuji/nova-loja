
<div id="corpo-loja">
	<aside class="banner"> 
		<img src="<?php echo pg ?>/imagens/banner-meio.png">
	</aside>

	<section class="categorias">
		<h2 class="fundo_cor"> Categorias</h2>
		
		<nav>
			<?php include "sidebar.php" ?>
		</nav>
	</section>
	
	<?php 
		$idcategoria = $explode[2];
		$categoria->setId($idcategoria);
		$categoria->mostrarDados();
	?>
	<div id="lado-direito">
		<h3 class="titulo fundo_cor"> Categoria -> <?php echo $categoria->getCategoria(); ?> </h3>
		<section class="vitrine">		
			<ul>
				<?php 
							$produto->listarProdutos("SELECT c.*, p.* FROM categoria c,  produto p WHERE c.id_categoria=p.id_categoria and p.id_categoria = '$idcategoria'");
				?>		
			</ul>
		
		</section>
	</div>
</div>