

<div id="corpo-loja">
	<aside class="banner"> 
		<img src="<?php echo pg ?>/imagens/banner-meio.png">
	</aside>

	<section class="categorias">
		<h2 class="fundo_azul"> Categorias</h2>
		
		<nav>
			<?php include "sidebar.php" ?>
		</nav>
	
	</section>
	
	<div id="lado-direito">
		<h3 class="titulo fundo_azul"> Resultada pesquisa </h3>
		<section class="vitrine">		
			<ul>
			<?php 							
							
				$txt_pesquisa = strip_tags($_POST["txt_pesquisa"]);							
				$sql_prod= "SELECT c.*, p.* FROM categoria c,  produto p WHERE c.id_categoria=p.id_categoria and titulo_produto like '%".anti_sql_injection($txt_pesquisa)."%' ";
				$produto->listarProdutos("$sql_prod");
			?>
			</ul>
		</section>
	</div>

</div>