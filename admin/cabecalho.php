<?php 
	define('pga','http://localhost/nova-loja/admin');

	$nomecliente = $_SESSION["logado_email"];
	if ($nomecliente==""){
		$nomecliente= "Visitante";
		$txt_log="Logar";
	}else
	{		
		$txt_log="Logoff";
		$txt_link="/logoff.php";
	}
?> 
<div id="cabecalho_superior">
	<nav id="menu-cima">
		<span> <?php echo "Olá <span style=\"font-weight: bold\">$nomecliente</span> Seja bem vindo à nossa loja" ;?>  </span>
		<ul>
			<li><a href="<?php echo pga.'/index'; ?>">Home </a> </li>
			<li><a href="../">Ver site </a> </li>
			<?php 
				if ($txt_link!=""){
					echo "<li><a href=\"".pga.$txt_link."\">$txt_log</a> </li>";
				}
			?> 
		</ul>
	</nav>
</div>
<div id="cabecalho_meio" class="fundo_cor">	
	<h1> Parte administrativa - Loja do Napo </h1>
	
	<section class="busca">	<h2> PARTE ADMINISTRATIVA </h2></section>

</div>

<div id="cabecalho_inferior" class="fundo_principal">
	<nav id="menu-principal"></nav>
</div>