<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8">
<title> Loja virtual - Parte administrativa </title>
<link href="css/css.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="js/abas.js"></script>
<script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="js/formata_textArea.js"></script>

</head>
<body>
	<div id="principal">
		<div id="cabecalho">
			<?php include_once("cabecalho.php"); ?>
		</div><!--fim topo -->
		<div id="corpo">
			<nav id="esquerdo">
				<?php include_once("menu.php"); ?>
			</nav>
			
			<div id="direito">
				<?php
					$link = $_GET["link"];
					
					$pag[1] = "home.php";
					$pag[2] = "lst/lst_categoria.php";
					$pag[3] = "frm/frm_categoria.php";
					$pag[4] = "lst/lst_banner.php";
					$pag[5] = "frm/frm_banner.php";
					$pag[6] = "lst/lst_produto.php";
					$pag[7] = "frm/frm_produto.php";
					$pag[8] = "lst/lst_pedido.php";
					$pag[9] = "frm/frm_venda.php";
					$pag[10] = "op/op_venda.php";
					$pag[11] = "lst/lst_administrador.php";
					$pag[12] = "frm/frm_administrador.php";
					
					if (!empty($link)){
						if(file_exists($pag[$link]))
						{
							include $pag[$link];
						}
						else
						{
							include "home.php";
						}
					
					}else{
					
						include "home.php";
					}
				
				?>
			</div>
		</div>
	</div>
</body>	
</html>