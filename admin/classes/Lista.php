
<?php
	
	include_once("Paginacao.php");
	
	class Lista extends Paginacao{
		private $strNumPagina, $strPaginas, $strUrl;
		
		public function setNumPagina($valor){
			$this->strNumPagina = $valor;
		}
		
		public function setUrl($valor){
			$this->strUrl = $valor;
		}
		
		public function getPaginas(){
			return $this-> strNumPagina;
		}
		
		public function listaCategoria(){
			$sql = "SELECT * FROM categoria";
			$this->setParametro($this->strNumPagina);
			$this->setFileName($this->strUrl);
			$this->setInfoMaxPag(10);
			$this->setMaximoLinks(50);
			$this->setSQL($sql);
			
			self::iniciaPaginacao();
			$cont = 0;
			
			while ($linha = self::results()){
				$cont++;
				echo "
				
				<tr>
				<td> $linha[id_categoria] </td>
				<td> $linha[categoria] </td>
				<td> $linha[ativo_categoria] </td>
				<td> <a href='"; echo pgf."/frm_categoria/Alterar/$linha[id_categoria]'> <img src='"; echo pga."/imagens/alterar.gif' border='0' /></a> </td>
				<td> <a href='"; echo pgf."/frm_categoria/Excluir/$linha[id_categoria]'> <img src='"; echo pga."/imagens/excluir.gif' border='0' /></a> </td>		
				</tr>
			
				";
				
				self::setContador($cont);
			}		
			
		}
		
		
		
		public function listaBanner(){
			$sql = "SELECT * FROM Banner";
			$this->setParametro($this->strNumPagina);
			$this->setFileName($this->strUrl);
			$this->setInfoMaxPag(10);
			$this->setMaximoLinks(50);
			$this->setSQL($sql);
			
			self::iniciaPaginacao();
			$cont = 0;
			
			while ($linha = self::results()){
				$cont++;
				echo "
				
				<tr>
				<td> $linha[id_banner] </td>
				<td> $linha[titulo_banner] </td>
				<td> $linha[ativo_banner] </td>
				<td> <a href='"; echo pgf."/frm_banner/Alterar/$linha[id_banner]'> <img src='"; echo pga."/imagens/alterar.gif' border='0' /></a> </td>
				<td> <a href='"; echo pgf."/frm_banner/Excluir/$linha[id_banner]'> <img src='"; echo pga."/imagens/excluir.gif' border='0' /></a> </td>				
				</tr>
				
				";
				
				self::setContador($cont);
			}		
			
		}
		
		
		
		public function listaProduto(){
			$sql = "SELECT * FROM produto ";
			$this->setParametro($this->strNumPagina);
			$this->setFileName($this->strUrl);
			$this->setInfoMaxPag(10);
			$this->setMaximoLinks(50);
			$this->setSQL($sql);
			
			self::iniciaPaginacao();
			$cont = 0;
			
			while ($linha = self::results()){
				$cont++;
				echo "
				
				<tr>
				<td> $linha[id_produto] </td>
				<td> $linha[titulo_produto] </td>
				<td> $linha[ativo_produto] </td>	
				<td> <a href='"; echo pgf."/frm_produto/Alterar/$linha[id_produto]'> <img src='"; echo pga."/imagens/alterar.gif' border='0' /></a> </td>
				<td> <a href='"; echo pgf."/frm_produto/Excluir/$linha[id_produto]'> <img src='"; echo pga."/imagens/excluir.gif' border='0' /></a> </td>				
				
				</tr>
				
				
				";
				
				self::setContador($cont);
			}		
			
		}
		
		public function listaAdministrador(){
			$sql = "SELECT * FROM administracao ";
			$this->setParametro($this->strNumPagina);
			$this->setFileName($this->strUrl);
			$this->setInfoMaxPag(10);
			$this->setMaximoLinks(50);
			$this->setSQL($sql);
			
			self::iniciaPaginacao();
			$cont = 0;
			
			while ($linha = self::results()){
				$cont++;
				echo "
				
				<tr>
				<td> $linha[id_administracao] </td>
				<td> $linha[nome] </td>
				<td> $linha[login] </td>
				<td> <a href='"; echo pgf."/frm_administrador/Alterar/$linha[id_administracao]'> <img src='"; echo pga."/imagens/alterar.gif' border='0' /></a> </td>
				<td> <a href='"; echo pgf."/frm_administrador/Excluir/$linha[id_administracao]'> <img src='"; echo pga."/imagens/excluir.gif' border='0' /></a> </td>				
								
				</tr>
				
				
				";
				
				self::setContador($cont);
			}		
			
		}
	}
	
	
?>