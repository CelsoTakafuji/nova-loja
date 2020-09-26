<?php 
	header("Content-type: text/html; charset=utf-8");
	$txt_email = strip_tags($_POST["txt_email"]);
?>

<div id="corpo-recupera-login">
	<aside class="banner"> 
		<img src="<?php echo pg ?>/imagens/banner-meio.png">
	</aside>
	
	<div id="base-carrinho">
		<h4 class="fundo_cor">Informe seu e-mail para que possamos enviar seus dados de acesso!</h4>
	
	<?php 
		if(isset($_POST['sendRecover'])){
			
			$sql= "SELECT * FROM cliente where email = '".anti_sql_injection($txt_email)."' ";
			
			$totalReg = $cliente->totalRegistros($sql);
			
			if($totalReg>1){
				echo "<script type= \"text/JavaScript\">
						alert(\"Erro: Por favor entre em contato com o administrador do site, pois existe mais de uma conta com este e-mail!\");
					</script>
					";
				echo '<br/><br/><span class="msg_erro">Erro: Por favor entre em contato com o administrador do site, pois existe mais de uma conta com este e-mail!</span>';
				
			}elseif($totalReg==1){
				$cliente ->verCliente($sql,0);
				
				$cli[ID] 		= $cliente->getId();
				$cli[CLIENTE]	= $cliente->getCliente();
				$cli[EMAIL] 	= $cliente->getEmail();
				$cli[SENHA]     = $cliente->getSenha();
				
				$msg = '<h3 style="font:16px \'Trebuchet MS\', Arial, Helvesstica, sans-serif; color:#099;">Prezado '.$cli[CLIENTE].', recupere seu acesso!</h3><p style="font:bold 12px Arial, Helvetica, sans-serif; color:#666;">Estamos entrando em contato, pois foi solicitado em nossa área administrativa a recuperação de dados de acesso. Verifique logo abaixo os dados de seu usuário:</p><hr>
				<p style="font:italic 14px \'Trebuchet MS\', Arial, Helvetica, sans-serif; color:#069;">E-mail: '.$cli[EMAIL].'<br>Senha: '.$cli[SENHA].'</p><hr><p style="font:bold 12px Arial, Helvetica, sans-serif; color:#F00;">Recomendamos que você altere seus dados em seu perfil após efetuar o login!</p><hr>
				<p style="font:italic 12px Arial, Helvetica, sans-serif; color:#666;">Atenciosamente a administração - '.date('d/m/Y H:i:s').' - <a style="color:#900" href="#" title="Napo Napo Napo">NAPO</a><hr><img alt="Napo Napo Napo" title="Napo Napo Napo" src="#"></p>';

				sendMail('Recupere seus dados!', $msg, MAILUSER, SITENAME, $cli[EMAIL], $cli[CLIENTE]);
				
				echo '<br/><br/><span>Seus dados foram enviados com sucesso para: <strong>'.$cli[EMAIL].'</strong>. Favor verifique!</span>';

				header('Refresh: 5;url='.pg.'/logarParaComprar');
			}else{
				echo "<script type= \"text/javaScript\">
						alert(\"Erro: E-mail não confere!\");
			 	      </script>";
					  
				echo '<br/><br/><span class="msg_erro">Erro: E-mail não confere!</span>';
			}
		}
	?>
	
		<div id="formulario-login">
			<fieldset>
				<form name="recover" action="" method="post">
					<label>
						<span>E-mail:</span>
						<input type="text" name="txt_email" id="txt_email" value="<?php if($txt_email) echo $txt_email; ?>"/>
					</label>
					<input type="submit" value="Recuperar dados" name="sendRecover" class="botao fundo_cor" />
					<a href="<?php echo pg."/logarParaComprar"; ?>" class="link" title="Voltar">Voltar</a>
				</form>
			</fieldset>
		</div>
	</div>
</div>
