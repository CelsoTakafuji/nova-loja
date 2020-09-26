<?php
	session_start();	
	include_once("admin/classes/manipulacaoDeDados.php");
	include_once("admin/biblio.php");
	
	$acao = $_POST["acao"];
	$id	  = $_POST["id"];
	
	$cad = new manipulacaoDeDados();
	$cad->setTabela("cliente");
	
	if($acao=="Atualizar_login"){
		$txt_email  	= strip_tags(trim($_POST["txt_email"]));  	
		$txt_senha		= strip_tags(trim($_POST["txt_senha"]));
	}else if($acao=="Atualizar_cadastro"){
		$txt_cliente	= strip_tags(trim($_POST["txt_cliente"]));	
		$txt_endereco	= strip_tags(trim($_POST["txt_endereco"]));	
		$txt_numero		= strip_tags(trim($_POST["txt_numero"]));
		$txt_complemento= strip_tags(trim($_POST["txt_complemento"])); 
		$txt_cidade 	= strip_tags(trim($_POST["txt_cidade"])); 	
		$txt_bairro 	= strip_tags(trim($_POST["txt_bairro"])); 	
		$txt_uf  		= strip_tags(trim($_POST["txt_uf"]));  		
		$txt_cep  		= strip_tags(trim($_POST["txt_cep"]));  		
		$txt_sexo  		= strip_tags(trim($_POST["txt_sexo"]));  		
		$txt_ddd		= strip_tags(trim($_POST["txt_ddd"]));	
		$txt_fone  		= strip_tags(trim($_POST["txt_fone"]));
	}else if($acao=="Inserir"){
		$txt_cliente	= strip_tags(trim($_POST["txt_cliente"]));	
		$txt_email  	= strip_tags(trim($_POST["txt_email"]));  	
		$txt_senha		= strip_tags(trim($_POST["txt_senha"]));
		$txt_endereco	= strip_tags(trim($_POST["txt_endereco"]));	
		$txt_numero		= strip_tags(trim($_POST["txt_numero"]));
		$txt_complemento= strip_tags(trim($_POST["txt_complemento"]));
		$txt_cidade 	= strip_tags(trim($_POST["txt_cidade"])); 	
		$txt_bairro 	= strip_tags(trim($_POST["txt_bairro"])); 	
		$txt_uf  		= strip_tags(trim($_POST["txt_uf"]));  		
		$txt_cep  		= strip_tags(trim($_POST["txt_cep"]));  		
		$txt_sexo  		= strip_tags(trim($_POST["txt_sexo"]));  		
		$txt_ddd		= strip_tags(trim($_POST["txt_ddd"]));
		$txt_fone  		= strip_tags(trim($_POST["txt_fone"]));	
	}

	if($acao=="Inserir"){
		if($txt_cliente != ""  && $txt_email && $txt_senha != "" && $txt_endereco != "" && $txt_numero != "" && $txt_cidade != "" && $txt_bairro != "" && $txt_uf != "" && $txt_cep != "" && $txt_ddd != "" && $txt_fone != ""){
			$cad ->setCampos("cliente, email, senha, endereco, numero, complemento, cidade, bairro, uf, cep, sexo, ddd, fone, ativo_cliente");
			$cad ->setDados("
						'".anti_sql_injection($txt_cliente)."', 
						'".anti_sql_injection($txt_email)."', 
						'".anti_sql_injection($txt_senha)."',
						'".anti_sql_injection($txt_endereco)."', 
						'".anti_sql_injection($txt_numero)."',
	                    '".anti_sql_injection($txt_complemento)."',
						'".anti_sql_injection($txt_cidade)."', 
						'".anti_sql_injection($txt_bairro)."',
						'".anti_sql_injection($txt_uf)."', 
						'".anti_sql_injection($txt_cep)."', 
						'".anti_sql_injection($txt_sexo)."' ,
						'".anti_sql_injection($txt_ddd)."',
						'".anti_sql_injection($txt_fone)."',
						'".anti_sql_injection('S')."'
						");
			$cad-> inserir();
			
			echo "<script type='text/javascript'> location.href='minha_conta' </script> ";
		}
	}

	if($acao=="Atualizar_login"){
		if($txt_email != "" && $txt_senha != ""){
			$cad ->setCampos("						
							email = '".anti_sql_injection($txt_email)."',					
							senha = '".anti_sql_injection($txt_senha)."'
			");
			$cad->setValorNaTabela("id_cliente");
			$cad->setValorPesquisa("$id");
			$cad->alterar();	
			
			$_SESSION[cliente_curso][EMAIL] = $txt_email;
			
			echo "<script type='text/javascript'> location.href='minha_conta' </script> ";
		}
	}
	
	if($acao=="Atualizar_cadastro"){
		if($txt_cliente != "" && $txt_endereco != "" && $txt_numero != "" && $txt_cidade != "" && $txt_bairro != "" && $txt_uf != "" && $txt_cep != "" && $txt_ddd != "" && $txt_fone != ""){
			$cad ->setCampos("	
							cliente     	=   '".anti_sql_injection($txt_cliente)."', 
							endereco    	=   '".anti_sql_injection($txt_endereco)."',
							numero			=   '".anti_sql_injection($txt_numero)."',
							complemento     =   '".anti_sql_injection($txt_complemento)."',
							cidade      	=   '".anti_sql_injection($txt_cidade)."', 
							bairro      	=   '".anti_sql_injection($txt_bairro)."',
							uf          	=   '".anti_sql_injection($txt_uf)."', 
							cep         	=   '".anti_sql_injection($txt_cep)."', 
							sexo        	=   '".anti_sql_injection($txt_sexo)."',
							ddd        		=   '".anti_sql_injection($txt_ddd)."',						
							fone        	=   '".anti_sql_injection($txt_fone)."'
			");
			$cad->setValorNaTabela("id_cliente");
			$cad->setValorPesquisa("$id");
			$cad->alterar();
			$_SESSION[cliente_curso][CLIENTE] = $txt_cliente;
			echo "<script type='text/javascript'> location.href='minha_conta' </script> ";
		}
	}	

?>
