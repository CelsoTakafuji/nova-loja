<?php
	define('pgl','http://localhost/nova-loja/admin/lst');

	include_once("../classes/manipulacaoDeDados.php");
	include_once("../biblio.php");
	
	$acao = $_POST["acao"];
	$id	  = $_POST["id"];
	
	$cad = new manipulacaoDeDados();
	$cad->setTabela("produto");
	
	$txt_id_categoria		= $_POST["txt_id_categoria"];
	$txt_titulo				= $_POST["txt_titulo"];	 
	$txt_preco				= $_POST["txt_preco"];
	$txt_ativo				= $_POST["txt_ativo"];
	$txt_autor				= $_POST["txt_autor"];
	$txt_duracao			= $_POST["txt_duracao"];	
	$txt_slug_produto		= gen_slug($txt_titulo);	                    
	$txt_descricao_rapida	= $_POST["txt_desc_rap"];
	
	$txt_descricao			= htmlentities($_POST["txt_desc"], ENT_QUOTES);	
	$txt_conteudo			= htmlentities($_POST["txt_conteudo"],ENT_QUOTES);
	
	$txt_nomeimagem = $_POST["nome_imagem"];
	


	/***************************UPLOAD************************/

	$extensoes_validas = array(".gif", ".png",".jpg",".jpeg");
	$caminho_absoluto  = "C:/wamp/www/nova-loja/admin/fotos";
	
	$nome_arquivo 		= $_FILES['img']['name'];
	$arquivo_temporario = $_FILES['img']['tmp_name'];
	
	$ext = strrchr($nome_arquivo,'.');

	//$nome_arquivo =md5(uniqid(rand(),true)) .$ext;
	
	if(!empty($nome_arquivo)){
		if(!in_array($ext,$extensoes_validas)){
			die("Este arquivo com esta extensão não é válido");
		}else{
			if(move_uploaded_file($arquivo_temporario,"$caminho_absoluto/$nome_arquivo")){
				$txt_nomeimagem = $nome_arquivo	;
				echo "nome = " .$txt_nomeimagem;
			}else {
				die("Erro no envio do arquivo");
			}
		}
	}
	/***************************UPLOAD************************/
	

	if($acao=="Inserir"){
		$cad ->setCampos("id_categoria, titulo_produto, preco, autor, duracao,descricao, conteudo, 	slug_produto, ativo_produto, imagem_produto, descricao_rapida");
		$cad ->setDados("'$txt_id_categoria', '$txt_titulo', '$txt_preco', '$txt_autor',
						 '$txt_duracao', '$txt_descricao', '$txt_conteudo', '$txt_slug_produto' ,
						 '$txt_ativo','$txt_nomeimagem','$txt_descricao_rapida'");
		$cad-> inserir();
		
		echo "<script type='text/javascript'>location.href='".pgl."/lst_produto' </script>";
	}
	
	if($acao=="Alterar"){
		$cad ->setCampos("	id_categoria		='$txt_id_categoria', 
							titulo_produto		='$txt_titulo', 
							preco 			 	='$txt_preco',
							autor            	='$txt_autor',
							duracao             ='$txt_duracao',
							descricao           ='$txt_descricao',
							conteudo 	        ='$txt_conteudo',
							slug_produto        ='$txt_slug_produto' ,
							ativo_produto       ='$txt_ativo',
							imagem_produto      ='$txt_nomeimagem',
							descricao_rapida    ='$txt_descricao_rapida'");
		$cad->setValorNaTabela("id_produto");
		$cad->setValorPesquisa("$id");
		$cad->alterar();
		
		echo "<script type='text/javascript'>location.href='".pgl."/lst_produto' </script>";
	}
	
	if($acao=="Excluir"){
		
		$cad->setValorNaTabela("id_produto");
		$cad->setValorPesquisa("$id");
		$cad->excluir();
		
		echo "<script type='text/javascript'>location.href='".pgl."/lst_produto' </script>";
	}

?>
