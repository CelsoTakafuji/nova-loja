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
		
	mysql_query("DELETE FROM carrinho WHERE id_pedido = '$id_pedido' ");
	mysql_query("DELETE FROM pedido WHERE id_pedido='$id_pedido'");
	
	unset($_SESSION["id_pedido_curso"]);
	
	echo "<img src='";
	echo pg; 
	echo "/imagens/comsucesso.png' /> <p>Pedido realizado com sucesso! </p>";
?>


