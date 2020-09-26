<?php
	include_once("admin/classes/manipulacaoDeDados.php");
	include_once("admin/classes/DadosDoBanco.php");
	include "biblio.php";
	
	$carrinho	= new DadosCarrinho();	
	$cad = new manipulacaoDeDados();
	
	session_start();

	$acao 		= $_POST["acao"];
	$txt_valor 	= $_POST["txt_valor"];
	$id_produto = $_POST["id_produto"];
	
	if($_SESSION["id_pedido_curso"]=="" || $_SESSION["id_pedido_curso"]==0 ){
	
		$data =date("Y-m-d");
		
		if ($_SESSION[cliente_curso][ID]!=""){
			$id_cliente = $_SESSION[cliente_curso][ID];
			
		}else{
			$id_cliente ="0";			
		}	
		
		$cad->setTabela("pedido");
		$cad->setCampos("id_cliente, data_pedido");
		$cad->setDados("'$id_cliente','$data'");
		$cad->inserir();
		
		//pega o último código gerado
		
		$ultimoCodigo= $cad->ultimoRegistro("id_pedido","pedido");
		
		if($ultimoCodigo !=0 && $ultimoCodigo!=""){
			$_SESSION["id_pedido_curso"] = $ultimoCodigo;
		}else{
			//chama alguma coisa do erro;
		}
	
	}
	
	$id_pedido = $_SESSION["id_pedido_curso"];
	$cad->setTabela("carrinho");
	
	
	if ($acao=="INSERIR"){
		$sql="SELECT * FROM carrinho WHERE id_produto = '$id_produto' and id_pedido='$id_pedido'";
		$totalReg= $carrinho->totalRegistros($sql);
		
		
		if($totalReg >0 ){
			
			$cad->setValorNaTabela("id_pedido");
			$cad->setValorPesquisa(" '$id_pedido' and id_produto = '$id_produto' ");
			$cad->setCampos(" qtde = qtde +1");
			$cad->alterar();
		}
		else{
			$cad->setCampos("id_pedido, id_produto, valor, qtde");
			$cad->setDados("'$id_pedido','$id_produto','$txt_valor','1'");
			$cad->inserir(); 
		}
	}
	
	if ($acao=="ALTERAR"){
		$v_atualiza = $_POST[codprod];
		$chave = array_keys($v_atualiza);
		for($i=0;$i<sizeof($chave); $i++){
			$indice = $chave[$i];
			$txt_qtde 	= $v_atualiza[$indice][QTDE];
			$id_produto = $v_atualiza[$indice][IDPRODUTO];
			
			$cad->setValorNaTabela("id_pedido");
			$cad->setValorPesquisa(" '$id_pedido' and id_produto = '$id_produto' ");
			
			if($v_atualiza[$indice][QTDE]>0){			
				$cad->setCampos(" qtde = '$txt_qtde' ");			
				$cad->alterar();	
			}else{
				$cad->excluir();
				$sql = "SELECT * FROM carrinho WHERE id_pedido=$id_pedido";
				
				$quant= $carrinho->totalRegistros($sql);
				
				if ($quant ==0){
					unset($_SESSION["id_pedido_curso"]);
				}
				
			}		
		}
	}

 echo "<script type='text/javascript'> location.href='carrinho' </script>"
?>