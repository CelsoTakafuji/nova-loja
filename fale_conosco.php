<?php header("Content-type: text/html; charset=utf-8"); ?>

<div id="corpo-fale-conosco">
	<aside class="banner"> 
		<img src="<?php echo pg ?>/imagens/banner-meio.png">
	</aside>

	<section class="categorias">
		<h2 class="fundo_cor"> Categorias</h2>
		
		<nav>
			<?php include "sidebar.php" ?>
		</nav>
	
	</section>
	
	<div id="lado-direito">

			<h1 class="lado-direito-texto-titulo">Fale conosco</h1>
			<h2 class="lado-direito-texto">Você tem sugestões ou dúvidas sobre qualquer um dos nossos serviços e produtos? <br/>
			    Seguem contatos para maiores informações:<br/><br/>
				Telefone: <?php echo TELEFONE; ?> <br/>
				E-mail: <?php echo EMAIL; ?> 
			</h2>
		
	</div>
</div>
