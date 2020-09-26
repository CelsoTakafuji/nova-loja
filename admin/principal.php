<?php
	session_start();
	
	if(!isset($_SESSION["logado_senha"]) and !isset($_SESSION["logado_email"]))
	{
		echo "<script type='text/javascript'> location.href='index.php' </script>";
	}

	include "biblio.php";
	include_once("/classes/DadosDoBanco.php");
	include_once("/classes/manipulacaoDeDados.php");
	
	define('pga','http://localhost/nova-loja/admin');
	define('pgf','http://localhost/nova-loja/admin/frm');
	define('pgl','http://localhost/nova-loja/admin/lst');
	define('pgo','http://localhost/nova-loja/admin/op');
	
	header('Content-type: text/html; charset=UTF-8');
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<title> Loja virtual do Napo - Parte administrativa</title>
<link href="<?php echo pga ?>/css/css.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo pga ?>/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="<?php echo pga ?>/js/abas.js"></script>
<script type="text/javascript" src="<?php echo pga ?>/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
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
					$url = (isset($_GET['url'])) ? $_GET['url'] :'';
					$explode = explode('/',$url);
				
					$paginas = array('lst_categoria','frm_categoria','lst_banner','frm_banner','lst_produto','frm_produto','lst_pedido','frm_venda','lst_administrador','frm_administrador','op_venda');

					if((isset($explode[1]) && $explode[1] == '') || empty($explode[1])) 
					{			
						include_once "home.php";
					}
					elseif($explode[1] != '') 
					{
						if(isset($explode[1]) && in_array($explode[1], $paginas)){	
							include_once $explode[0]."/".$explode[1].".php";
						} else{
							include_once "home.php";
						}
				
					}
						
					/*
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
					*/
				?>
			</div>
		</div>
		<footer id="rodape">
			<?php include_once("rodape.php"); ?>
		</footer><!--fim rodape -->
	</div>
</body>	
</html>