<?php
	//$acao = $_GET["acao"];
	//$id	= $_GET["id"];

	$acao = $explode[1];
	$id = $explode[2];
	
		include_once("./classes/DadosDoBanco.php");
		$dados = new DadosVenda();
		$dados->setId($id);
		$dados->mostrarDados();
		
		$txt_data_venda 		= $dados-> getDataVenda();
		$txt_pago 				= $dados-> getPago();
		$txt_codigo_rastreamento= $dados-> getCodigoRastreamento();		
		$txt_status 			= $dados-> getStatusVenda();	

?>

<div id="formulario">
	<h2> Cadastro de vendas </h2>
	<form action="<?php echo pgo; ?>/op_venda.php" method="post" enctype="multipart/form-data">
		
		
		<div class="dois-campos">
			<label>
				<span class="titulo">Data da Venda </span>
				<input type="text" name="txt_data_venda" id="txt_data_venda" value="<?php echo $txt_data_venda ?>">
			</label>
			<label>
				<span class="titulo">Pago </span>
				<select name="txt_pago" id="txt_pago">
					<option value="S" <?php if($txt_pago=="S")echo "selected" ?>> Sim </option>
					<option value="N" <?php if($txt_pago=="N")echo "selected" ?>> Não </option>
					
				</select>
			</label>
		</div>
		
			<div class="dois-campos">
			<label>
				<span class="titulo">Código de Rastreamento </span>
				<input type="text" name="txt_codigo_rastreamento" id="txt_codigo_rastreamento" value="<?php echo $txt_codigo_rastreamento ?>">
			</label>
			<label>
				<span class="titulo">Status </span>
				<select name="txt_status" id="txt_status">
					<option value="Venda Iniciada" <?php if($txt_status=="Venda Iniciada")echo "selected" ?>> Venda Iniciada</option>
					<option value="Postado" <?php if($txt_status=="Postado")echo "selected" ?>> Postado</option>
					<option value="Entregue" <?php if($txt_status=="Entregue")echo "selected" ?>> Entregue</option>
				</select>
			</label>
		
		</div>

		<input type="hidden" name="frm" value="venda" />
		<input type="hidden" name="id_venda" value="<?php  echo $id; ?>" />
		<input type="hidden" name="acao" value="Alterar_venda" />
		<input type="submit" value="Atualizar" class="botao" />
		
		
	</form>


</div>