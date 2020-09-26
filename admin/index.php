<?php
	define('pgo','http://localhost/nova-loja/admin/op');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title> Loja virtual do Napo - Parte administrativa</title>
<link href="css/css.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="js/abas.js"></script>
<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
</head>
	
<body>
		
		<div id="cabecalho">
			<?php include_once("cabecalho.php"); ?>
		</div><!--fim topo -->
		
		<div id="corpo">
			<div id="box-login">
				<div id="formulario-login">
					<form id ="frmlogin" name="frmlogin" method="post" action="<?php echo pgo; ?>/op_login.php" >
						<fieldset>
						    <br/>
							<legend> Faça o login</legend>				
							<label>
								<span>Login</span>	
								<input type = "text" name="txt_login" id="txt_login">
							</label>
							
							<label>
								<span>Senha</span>
								<input type="password" name="txt_senha" id="txt_senha">
							</label>
							<input type="submit" name= "logar" id="logar" value = "Logar" class="botao" >
					
							<br/><br/>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
		<footer id="rodape">
			<?php include_once("rodape.php"); ?>
		</footer><!--fim rodape -->
</body>
</html>