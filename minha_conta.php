<?php
	$idCliente = $_SESSION[cliente_curso][ID];	
	
	$cliente->setId($idCliente);
	$cliente->mostrarDados();

	$txt_cliente	 = $cliente-> getCliente(); 
	$txt_endereco	 = $cliente-> getEndereco();
	$txt_numero  	 = $cliente-> getNumero();
	$txt_complemento = $cliente-> getComplemento();
	$txt_cidade 	 = $cliente-> getCidade();
	$txt_bairro 	 = $cliente-> getBairro();
	$txt_uf  		 = $cliente-> getUf();
	$txt_cep  		 = $cliente-> getCep();
	$txt_email  	 = $cliente-> getEmail();
	$txt_sexo  		 = $cliente-> getSexo();
	$txt_ddd  		 = $cliente-> getDDD();
	$txt_fone  		 = $cliente-> getFone();
	$txt_senha		 = $cliente-> getSenha();
	$txt_ativo		 = $cliente-> getAtivo();
	
	if($idCliente !=""){	
?>
<script type="text/javascript">
	function  validar(){
		if(document.form1.txt_confirma.value!=document.form1.txt_senha.value){
			alert("O valor de confirma tem que ser igual à senha");
			document.form1.txt_confirma.focus();
			return(false);
		}
		
		if(document.form1.txt_email.value.indexOf('@') ==-1 || document.form1.txt_email.value.indexOf('.')== -1 ){
			alert("email inválido");
			document.form1.txt_email.focus();
			return(false);
		}
	}
</script>
<div id="sanfona">
	<div id="conteudo_sanfona" class="formata_sanfona">
		<a href="#"> MEUS PEDIDOS </a>
		<div>
			<?php
				$sql="SELECT * FROM venda WHERE id_cliente= $idCliente";
				$total = $venda->totalRegistros($sql);
				for($i=0; $i<$total; $i++){
					$venda->verVenda($sql,$i);
					$idVenda = $venda->getId();
		
			?>
			<div id="lista_venda">
				<strong> Num compra:</strong> <span> <?php echo $venda->getId(); ?> </span>
				<strong> Data da venda: </strong> <span> <?php echo databr($venda->getDataVenda(),0); ?> </span>
				
				<?php
                    if(trim($venda->getCodigoRastreamento()) != ""){				
						echo "<strong> Código do Rastreamento:</strong> <span>".$venda->getCodigoRastreamento()."</span>";
					}
				?>
				
				<!-- <strong> Código do Rastreamento:</strong> <span> <?php echo $venda->getCodigoRastreamento(); ?> </span> -->
				<strong> Status: </strong> <span> <?php echo $venda->getStatusVenda(); ?> </span>
				<strong> Total: </strong> <span> <?php echo "R$ " .number_format($itens->somaVendas($idVenda),2,',','.'); ?> </span>		
			
			</div>
			
						
			<div id="meus-pedidos">					
					
					<table cellpadding="0" cellspacing="0" border="1">
						<thead>
							<tr>
								<th>Descrição do produto </th>
								<th>Quantidade </th>
								<th>Preço unitário </th>
								<th>Subtotal </th>
								
							</tr>
						</thead>
						
						<tbody>
						<?php
							$sql_prod= "SELECT i.*, p.* FROM itens_venda i, produto p where i.id_produto = p.id_produto and id_venda = '$idVenda'";
							
							
							$totalReg = $itens->totalRegistros($sql_prod);
							$valorTotal = 0;
								for($j=0;$j<$totalReg;$j++){
									$itens -> verItens($sql_prod, $j);
									$subtotal = $itens->getPreco() * $itens->getQtde();
									$valorTotal += $subtotal; 
									$codprod[$i] = $itens->getIdProduto();
									
									if(trim($itens->getImagemProduto() == "")){
										$img=pg ."/admin/fotos/sem-imagem.png";
									}else{
										$img=pg ."/admin/fotos/".$itens->getImagemProduto();
									}
						
						?>
						
							<tr>
								<td> 
									<img src="<?php echo $img ?>" width="20" height="30"> 
									<strong> <?php echo $itens->getTituloProduto(); ?>  </strong>
								</td>
								<td> <?php echo $itens->getQtde(); ?>  </td>
								<td><?php echo "R$ " .number_format($itens->getValor(),2,',','.'); ?> </td>
								<td> <?php echo "R$ " .number_format($subtotal,2,',','.'); ?> </td>				
										
							</tr>			
							
							<?php } ?>							
						</tbody>
					
					</table>
	
			</div>
			<?php } ?>
		
		
		</div>
		<a href="#"> DADOS DE ACESSO </a>
		<div>			
		
			
			<div id="formulario-maior">
			<form action="op_cliente.php" method="post" name="form1" id="form1" onsubmit="return validar()">
				
					<fieldset>
						<legend> Dados para acesso </legend>				
							<label>
								<span> E-mail (login)*</span>	
								<input type = "text" name="txt_email" id="txt_email" required value ="<?php echo $txt_email  ?>">
							</label>														
							
							<label>
								<span> Senha*</span>	
								<input type = "password" name="txt_senha" id="txt_senha"  required value ="<?php echo $txt_senha  ?>">
							</label>
							
							<label>
								<span> Confirmar senha*</span>	
								<input type = "password" name="txt_confirma" id="txt_confirma" required value ="<?php echo $txt_senha  ?>">
							</label>
							
							<input type="hidden" name ="id" value="<?php echo $idCliente ?>">							
							<input type="hidden" name ="acao" value="Atualizar_login">	
														
							<input type="submit" name= "atualiza_login" id="atualiza_login" value = "Atualizar login" class="botao" >
					</fieldset>
			</form>
			</div>
		</div>
		<a href="#"> MEUS DADOS </a>
		<div>
			<div id="formulario-maior">
			<form action="op_cliente.php" method="post" name="form2" id="form2" onsubmit="return validar()">
			<fieldset>
					<legend> Dados Pessoais </legend>
							<label>
								<span>Nome</span>
								<input type="text" name="txt_cliente" id="txt_cliente" required value="<?php echo $txt_cliente ?>">
							</label>							
							<label>
								<span>Endereço</span>
								<input type="text" name="txt_endereco" id="txt_endereco" required value="<?php echo $txt_endereco ?>">
							</label>
							<label>
								<span>Número</span>
								<input type="text" name="txt_numero" id="txt_numero" required value="<?php echo $txt_numero ?>">
							</label>
							<label>
								<span>Complemento</span>
								<input type="text" name="txt_complemento" id="txt_complemento"  value="<?php echo $txt_complemento ?>">
							</label>
							<label>
								<span>Bairro</span>
								<input type="text" name="txt_bairro" id="txt_bairro" required value="<?php echo $txt_bairro ?>">
							</label>
							<label>
								<span>Cidade</span>
								<input type="text" name="txt_cidade" id="txt_cidade" required value="<?php echo $txt_cidade ?>">
							</label>
							<label>
								<span>Cep</span>
								<input type="text" name="txt_cep" id="txt_cep" required value="<?php echo $txt_cep ?>">
							</label>
							<label>
								<span>Estado</span>
								<select name="txt_uf" required>
									<option value="AC" <?php if($txt_uf=="AC"){echo "selected" ;} ?>>Acre</option>
									<option value="AL" <?php if($txt_uf=="AL"){echo "selected" ;} ?>>Alagoas</option>
									<option value="AM" <?php if($txt_uf=="AM"){echo "selected" ;} ?>>Amazonas</option>
									<option value="AP" <?php if($txt_uf=="AP"){echo "selected" ;} ?>>Amapá</option>
									<option value="BA" <?php if($txt_uf=="BA"){echo "selected" ;} ?>>Bahia</option>
									<option value="CE" <?php if($txt_uf=="CE"){echo "selected" ;} ?>>Ceará</option>
									<option value="DF" <?php if($txt_uf=="DF"){echo "selected" ;} ?>>Distrito Federal</option>
									<option value="ES" <?php if($txt_uf=="ES"){echo "selected" ;} ?>>Espírito Santo</option>
									<option value="GO" <?php if($txt_uf=="GO"){echo "selected" ;} ?>>Goiás</option>
									<option value="MA" <?php if($txt_uf=="MA"){echo "selected" ;} ?>>Maranhã</option>
									<option value="MG" <?php if($txt_uf=="MG"){echo "selected" ;} ?>>Minas Gerais</option>
									<option value="MS" <?php if($txt_uf=="MS"){echo "selected" ;} ?>>Mato Grosso do Sul</option>
									<option value="MT" <?php if($txt_uf=="MT"){echo "selected" ;} ?>>Mato Grosso</option>
									<option value="PA" <?php if($txt_uf=="PA"){echo "selected" ;} ?>>Pará</option>
									<option value="PB" <?php if($txt_uf=="PB"){echo "selected" ;} ?>>Paraíba</option>
									<option value="PE" <?php if($txt_uf=="PE"){echo "selected" ;} ?>>Pernambuco</option>
									<option value="PI" <?php if($txt_uf=="PI"){echo "selected" ;} ?>>Piauí</option>
									<option value="PR" <?php if($txt_uf=="PR"){echo "selected" ;} ?>>Paraná</option>
									<option value="RJ" <?php if($txt_uf=="RJ"){echo "selected" ;} ?>>Rio de Janeiro</option>
									<option value="RN" <?php if($txt_uf=="RN"){echo "selected" ;} ?>>Rio Grande do Norte</option>
									<option value="RO" <?php if($txt_uf=="RO"){echo "selected" ;} ?>>Rondônia</option>
									<option value="RR" <?php if($txt_uf=="RR"){echo "selected" ;} ?>>Roraima</option>
									<option value="RS" <?php if($txt_uf=="RS"){echo "selected" ;} ?>>Rio Grande do Sul</option>
									<option value="SC" <?php if($txt_uf=="SC"){echo "selected" ;} ?>>Santa Catarina</option>
									<option value="SE" <?php if($txt_uf=="SE"){echo "selected" ;} ?>>Sergipe</option>
									<option value="SP" <?php if($txt_uf=="SP"){echo "selected" ;} ?>>São Paulo</option>
									<option value="TO" <?php if($txt_uf=="TO"){echo "selected" ;} ?>>Tocantins</option>
								</select>	                                                           
							</label>								
							<label>                                                            
								<span>DDD</span>
								<input type="text" name="txt_ddd" id="txt_ddd" required value="<?php echo $txt_ddd ?>">
							</label>
							<label>
								<span>Telefone</span>
								<input type="text" name="txt_fone" id="txt_fone" required value="<?php echo $txt_fone ?>">
							</label>
							<label>
								<span>Sexo </span>
								<select name="txt_sexo" id="txt_sexo">
									<option value="M" <?php if($txt_sexo=="M")echo "selected" ?>> Masculino </option>
									<option value="F" <?php if($txt_sexo=="F")echo "selected" ?>> Feminino </option>
								</select>
							</label>
							
							<input type="hidden" name ="id" value="<?php echo $idCliente ?>">							
							<input type="hidden" name ="acao" value="Atualizar_cadastro">	
														
							<input type="submit" name= "atualiza_cadastro" id="atualiza_cadastro" value = "Atualizar cadastro" class="botao" >					
					</fieldset>
				</form>				
			</div>
		
		</div>
	
	</div>


</div>

	<?php } else{

		 echo "<script type='text/javascript'> location.href='".pg."/logarParaComprar/minha_conta' </script>";

	}
	