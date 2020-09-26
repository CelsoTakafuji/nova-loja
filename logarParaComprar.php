<?php
	$irpara = $explode[1];

?>
<div id="base-carrinho">
	<h2 class="fundo_cor"> <img src="<?php echo pg ?>/imagens/barra-carrinho02.png"> </h2>
	<h3> <img src="<?php echo pg ?>/imagens/identificacao.png"> </h3>
	<h4 class="fundo_cor"> Faça o seu login ou cadastre-se </h4>
	<div id="container-logar">
		<div id="carrinho-logar">
			<h2> Já sou cliente</h2>
				<div id="formulario-login">
					<form id="frmlogin" name="frmlogin" method="post" action="<?php echo pg; ?>/logar.php">
						<fieldset>
							<label>
								<span>Digite seu email</span>
								<input type="text" name="txt_email" id="txt_email" />
							</label>
							<label>
								<span> Digite sua senha</span>
								<input type="password" name="txt_senha" id="txt_senha" />
							</label>
							<input type="hidden" name="irpara" value="<?php echo $irpara; ?>" />
							<input type="submit" name="logar" id="logar" value="Logar" class="botao fundo_cor">
						</fieldset>			
					
					</form>
				
				</div>
				<p> <a href="<?php echo pg."/recuperaLogin"; ?>" class="link">esqueci minha senha</a> </p>
		</div>
		<div id="carrinho-logar">
			<h2> Ainda não sou cadastrado</h2>
			<p> Caso ainda não seja cadastrado no site, clique no botão abaixo e faça seu cadastro para poder finalizar a compra</p>
			<h5><a href="<?php echo pg."/frm_cliente"; ?>"><img src="<?php echo pg; ?>/imagens/criar-novo.png"></a></h5>
		</div>
	</div>
	
</div>