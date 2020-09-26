<?php
	$id= $explode[3];
?>

<div id="corpo-loja">

	<aside class="banner"> 
		<img src="<?php echo pg; ?>/admin/banner/<?php include_once("banner.php"); ?>">
	</aside>

	<section class="categorias">
		<h2 class="fundo_cor"> Categorias</h2>
		
		<nav>
			<?php include "sidebar.php" ?>
		</nav>
	
	<?php
		$produto->setId("$id");
		$produto->mostrarDados();
		$id_categoria= $produto->getIdCategoria();
		if(trim($produto->getImagemProduto())==""){
			$url_img_produto = pg ."/admin/fotos/sem-imagem.png";
		}else{
			$url_img_produto = pg ."/admin/fotos/".$produto->getImagemProduto();
		}
		
	?>
	</section>
	
	<div id="lado-direito">		
		<section class="vitrine">
			<div id="cx-img-produto">
				<img src="<?php echo $url_img_produto ?>" alt="" width="220" height="330">
			</div>
			
			<div id="cx-titulo-produto">
				<h1><a href="<?php echo pg ."/carrinho" ?>"> <?php echo $produto->getTituloProduto()?></a></h1>			
			</div>

			<div id="cx-preco-produto">
				<span>Valor:</span> <strong><?php echo "R$ " .number_format($produto->getPreco(),2,',','.'); ?></strong>
			</div>
			
			<div class="duracao-autor">
				<h3><span>Duração:</span> <strong><?php echo $produto->getDuracao()?></strong></h3>
			</div>
			<div class="duracao-autor">
				<h4><span>Autor: </span> <strong> <?php echo $produto->getAutor()?></strong> </h4>
			</div>
			
			<div id="descricao-rapida">
				<h2><span>Descrição rápida:</span></h2>
				<strong> <?php echo $produto->getDescricaoRapida()?></strong>
			</div>
			
			<div id="comprar-produto">
				<form action="<?php echo pg ?>/op_carrinho.php" method="post">
							<input type="hidden" name="txt_valor" value="<?php echo $produto->getPreco()?>" />
							<input type="hidden" name="id_produto" value="<?php echo $produto->getId()?>" />
							<input type="hidden" name="acao" value="INSERIR" /> 
							<input type="submit" value=""> 
				</form>
			</div>
			
			<section id="abas-geral">
				<ul class ="menu">
					<li><a href="#aba01"> Descrição </a></li>
					<li><a href="#aba02"> Conteúdo </a></li>
				</ul>
				<section id="box">
					<div id="aba01" class="conteudo">
						<article id="descricao">
						<?php echo html_entity_decode($produto->getDescricao())?>
					</article>
					</div>
					<div id="aba02" class="conteudo">
						<article id="descricao">
						<?php echo html_entity_decode($produto->getConteudo())?>
					</article>
					</div>
				</section>
			
			</section>
			
			
			<div id="sugestao">
			<h3 class="titulo fundo_cor"> Sugestões de compra </h3>
			<ul>
				<?php 
						$produto->listarProdutos("SELECT c.*, p.* FROM categoria c,  produto p WHERE c.id_categoria=p.id_categoria and p.id_categoria = '$id_categoria'");
				?>
			</ul>
			</div>

		</section>
		
	</div>
</div>