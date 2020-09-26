<?php
	session_start();
	
	include_once("admin/classes/manipulacaoDeDados.php");
	include_once("admin/classes/DadosDoBanco.php");	
	
	$carrinho	= new DadosCarrinho();	
	$cad 		= new manipulacaoDeDados();
	
	$id_pedido 	= $_SESSION["id_pedido_curso"];
	$idcliente 	= $_SESSION[cliente_curso][ID]; 
	
	$data=date("Y-m-d");
	//inserir a informação para a tabela de venda
	$cad->setTabela("venda");
	$cad->setCampos("id_cliente, data_venda, pago, status_venda");
	$cad->setDados ("'$idcliente','$data','N','venda iniciada' ");
	$cad->inserir();
	
	$ultimoCodigo= $cad->ultimoRegistro("id_venda","venda");
	
	$sql= "SELECT c.*, p.* FROM carrinho c, produto p where c.id_produto = p.id_produto and id_pedido = '$id_pedido'";
		$totalReg = $carrinho->totalRegistros($sql);
		for($i=0;$i<$totalReg;$i++){
			$carrinho -> verCarrinho($sql, $i);
			$id_produto = $carrinho->getIdProduto();
			$valor 		= $carrinho->getValor();
			$qtde		= $carrinho->getQtde();
			
			$cad->setTabela("itens_venda");
			$cad->setCampos("id_venda, id_produto, valor_item, qtde");
			$cad->setDados ("'$ultimoCodigo','$id_produto','$valor','$qtde' ");
			$cad->inserir();
			
		}
		

	/* PAGSEGURO */
	require_once "admin/classes/PagSeguroLibrary/PagSeguroLibrary.php";
		
	$cliente->setId($idcliente);
	$cliente->mostrarDados();			
	
	$pagseguro = new PagSeguroPaymentRequest();
	
	$pagseguro->setCurrency("BRL");  
	$pagseguro->setShippingType(3);  
	
	$pagseguro->setReference($ultimoCodigo);
	
	$pagseguro->setSender(  
							$cliente-> getCliente(),   
							$cliente-> getEmail(),   
							$cliente-> getDDD(),  
							$cliente-> getFone() 
						  );
	
	$pagseguro->setShippingAddress(  
									$cliente-> getCep(),   
									$cliente-> getEndereco(),       
									$cliente-> getNumero(),       
									$cliente-> getComplemento(),       
									$cliente-> getBairro(),      
									$cliente-> getCidade(),      
									$cliente-> getUf(),     
									'BRA'     
                                   ); 
	

	$sql_item= "SELECT i.*, p.* FROM itens_venda i, produto p where i.id_produto = p.id_produto and id_venda = '$ultimoCodigo'";
	$totalReg = $itens->totalRegistros($sql_item);
	for($j=0;$j<$totalReg;$j++){
		$itens -> verItens($sql_item, $j);
		$pagseguro->addItem(
		                     $itens->getId(), 
							 $itens->getTituloProduto(), 
							 $itens->getQtde(), 
							 number_format($itens->getValor(),2,'.',',')
						    ); 
	}
	
	// Informando as credenciais  
	$credencial = new PagSeguroAccountCredentials('celsomassao@gmail.com', 'token pagSeguro');
	
	// fazendo a requisição a API do PagSeguro pra obter a URL de pagamento  
	//$url = $pagseguro->register($credencial); 
	$url = "www.google.com.br";
	
	mysql_query("DELETE FROM carrinho WHERE id_pedido = '$id_pedido' ");
	mysql_query("DELETE FROM pedido WHERE id_pedido='$id_pedido'");
	
	unset($_SESSION["id_pedido_curso"]);
	
?>

	<a href="<?php echo $url; ?>">	<img src="<?php echo pg; ?>/imagens/botao-de-compra-do-pagseguro.gif"> </a>
	