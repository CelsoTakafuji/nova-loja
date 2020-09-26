<ul>
				<?php 
					$sql = "SELECT * FROM categoria WHERE ativo_categoria='S' and id_categoria IN ( SELECT id_categoria FROM produto ) order by ordem_categoria";
					$total = $categoria->totalRegistros($sql);
					for($i=0;$i<$total;$i++){
						$categoria-> verCategorias($sql,$i);
						$idcat = $categoria->getId();
						$end_cat = pg."/categorias/".$categoria->getSlugCategoria()."/".$idcat;
				?>
				
				<li><a href="<?php echo $end_cat ; ?>"> .:<?php echo $categoria->getCategoria()?> </a> 
					<ul>
						<?php 
							$sql_prod = "SELECT c.*, p.* FROM categoria c,  produto p WHERE c.id_categoria=p.id_categoria AND p.id_categoria = '$idcat' ";
							$total_prod = $categoria->totalRegistros($sql_prod);
							for($j=0;$j<$total_prod;$j++){
								$produto-> verProdutos($sql_prod,$j);
								$idProduto =$produto->getId();
								$endereco = pg."/detalhe/".$produto->getSlugCategoria()."/".$produto->getSlugProduto()."/".$produto->getId();

						?>
						<li><a href="<?php echo $endereco ?>">.: <?php echo $produto->getTituloProduto()?></a> </li>
						<?php } ?>						
					</ul>
				</li>
				<?php } ?>
</ul>