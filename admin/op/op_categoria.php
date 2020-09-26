<?php
	define('pgl','http://localhost/nova-loja/admin/lst');

	include_once("../classes/manipulacaoDeDados.php");
	include_once("../biblio.php");
	$acao = $_POST["acao"];
	$id	  = $_POST["id"];
	
	$cad = new manipulacaoDeDados();
	$cad->setTabela("categoria");
	

	$txt_titulo 	= $_POST["txt_titulo"];
	$slug_categoria = gen_slug($txt_titulo);
	$txt_ordem 		= $_POST["txt_ordem"];
	$txt_ativo 		= $_POST["txt_ativo"];
	
	if($acao=="Inserir"){
		$cad ->setCampos("categoria, slug_categoria, ordem_categoria,ativo_categoria");
		$cad ->setDados(" '$txt_titulo', '$slug_categoria', '$txt_ordem', '$txt_ativo'");
		$cad-> inserir();
		
		echo "<script type='text/javascript'>location.href='".pgl."/lst_categoria' </script>";
	}
	
	if($acao=="Alterar"){
		$cad ->setCampos("	categoria ='$txt_titulo', 
							slug_categoria='$slug_categoria', 
							ordem_categoria ='$txt_ordem',
							ativo_categoria ='$txt_ativo'");
		$cad->setValorNaTabela("id_categoria");
		$cad->setValorPesquisa("$id");
		$cad->alterar();
		
		echo "<script type='text/javascript'>location.href='".pgl."/lst_categoria' </script>";
	}
	
	if($acao=="Excluir"){
		
		$cad->setValorNaTabela("id_categoria");
		$cad->setValorPesquisa("$id");
		$cad->excluir();
		
		echo "<script type='text/javascript'>location.href='".pgl."/lst_categoria' </script>";
	}

?>
