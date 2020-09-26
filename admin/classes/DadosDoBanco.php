<?php
	include_once("conexaoMySQL.php");	
	
	class DadosCliente extends conexaoMySQL{
		private $id, $cliente, $endereco, $cidade, $bairro, $uf, $cep, $email, $sexo,$fone, $senha2, $ativo,
		
		 $numero, $ddd, $complemento;
		
		public function setId($id){
			$this->id = $id;
		}
		public function getId(){
			return $this-> id;
		}		
		public function getCliente(){
			return $this-> cliente;
		}
		public function getEndereco(){
			return $this-> endereco;
		}
		public function getNumero(){
			return $this-> numero;
		}
		public function getComplemento(){
			return $this-> complemento;
		}
		public function getCidade(){
			return $this-> cidade;
		}
		public function getBairro(){
			return $this-> bairro;
		}
		public function getUf(){
			return $this-> uf;
		}		
		public function getCep(){
			return $this-> cep;
		}
		public function getEmail(){
			return $this-> email;
		}
		public function getSexo(){
			return $this-> sexo;
		}
		public function getDDD(){
			return $this-> ddd;
		}
		public function getFone(){
			return $this-> fone;
		}
		public function getSenha(){
			return $this-> senha2;
		}
		public function getAtivo(){
			return $this-> ativo;
		}
	
		public function mostrarDados(){
			$sql= "SELECT * FROM  cliente WHERE id_cliente = '$this->id'";
			$qry = self::executarSQL($sql);
			$linha = self::listar($qry);
			
			$this->id  			= $linha["id_cliente"];
			$this->cliente  	= $linha["cliente"];
			$this->endereco  	= $linha["endereco"];
			$this->numero  		= $linha["numero"];	
			$this->complemento 	= $linha["complemento"];
			$this->cidade  		= $linha["cidade"];
			$this->bairro  		= $linha["bairro"];
			$this->uf  			= $linha["uf"];			
			$this->cep  		= $linha["cep"];
			$this->email  		= $linha["email"];
			$this->sexo  		= $linha["sexo"];
			$this->ddd  		= $linha["ddd"];
			$this->fone  		= $linha["fone"];		
			$this->senha2  		= $linha["senha"];
			$this->ativo  		= $linha["ativo_cliente"];
		}
		public function totalRegistros($sql){
			$qry = self::executarSQL($sql);
			$total= self::contaDados($qry);			
			return $total;
		}
		
		public function verCliente($sql,$i){
			$qry = mysql_query($sql);
			
			$this->id  			= mysql_result($qry,$i,"id_cliente");
			$this->cliente  	= mysql_result($qry,$i,"cliente");
			$this->endereco  	= mysql_result($qry,$i,"endereco");
			$this->numero  	    = mysql_result($qry,$i,"numero");
			$this->complemento  = mysql_result($qry,$i,"complemento");
			$this->cidade  		= mysql_result($qry,$i,"cidade");
			$this->bairro  		= mysql_result($qry,$i,"bairro");
			$this->uf  			= mysql_result($qry,$i,"uf");			
			$this->cep  		= mysql_result($qry,$i,"cep");
			$this->email  		= mysql_result($qry,$i,"email");
			$this->sexo  		= mysql_result($qry,$i,"sexo");
			$this->ddd  		= mysql_result($qry,$i,"ddd");
			$this->fone  		= mysql_result($qry,$i,"fone");			
			$this->senha2  		= mysql_result($qry,$i,"senha");
			$this->ativo  		= mysql_result($qry,$i,"ativo_cliente");
		}
	}
	
	
	class DadosCategoria extends conexaoMySQL{
		private $id, $categoria, $slug_categoria, $ordem_categoria, $ativo_categoria;
		
		public function setId($id){
			$this->id = $id;
		}
		public function getId(){
			return $this-> id;
		}
		
		public function getCategoria(){
			return $this-> categoria;
		}
		public function getSlugCategoria(){
			return $this-> slug_categoria;
		}
		public function getOrdemCategoria(){
			return $this-> ordem_categoria;
		}
		public function getAtivo(){
			return $this-> ativo_categoria;
		}
		
		public function mostrarDados(){
			$sql= "SELECT * FROM  categoria WHERE id_categoria = '$this->id'";
			$qry = self::executarSQL($sql);
			$linha = self::listar($qry);
			
			$this->id  				= $linha["id_categoria"];
			$this->categoria  		= $linha["categoria"];
			$this->slug_categoria  	= $linha["slug_categoria"];
			$this->ordem_categoria  = $linha["ordem_categoria"];
			$this->ativo_categoria  = $linha["ativo_categoria"];	
		}
		
		public function comboCategoria($id){
			$sql= "SELECT * FROM  categoria ";
			$qry = self::executarSQL($sql);
			
			while($linha = self::listar($qry)){
				if($id==$linha["id_categoria"]){
					$selecionado = "selected='selected' ";
				} else{
					$selecionado = "";
				}
				
				echo "<option value=$linha[id_categoria] $selecionado>$linha[categoria]</option>\n";
			}
			
		}
		
		public function totalRegistros($sql){
			$qry = self::executarSQL($sql);
			$total= self::contaDados($qry);
			
			return $total;
		}
		
		public function verCategorias($sql,$i){
			$qry = mysql_query($sql);
			
			$this->id  				= mysql_result($qry,$i,"id_categoria");
			$this->categoria  		= mysql_result($qry,$i,"categoria");
			$this->slug_categoria  	= mysql_result($qry,$i,"slug_categoria");
			$this->ordem_categoria  = mysql_result($qry,$i,"ordem_categoria");
			$this->ativo_categoria  = mysql_result($qry,$i,"ativo_categoria");
		}
	
	}

	
	
	class DadosAdministrador extends conexaoMySQL{
		private $id, $nome, $email, $login, $tx_senha;
		
		public function setId($id){
			$this->id = $id;
		}
		public function getId(){
			return $this-> id;
		}
		
		public function getNome(){
			return $this-> nome;
		}
		public function getEmail(){
			return $this-> email;
		}
		public function getLogin(){
			return $this-> login;
		}
		public function getSenha(){
			return $this-> tx_senha;
		}
		
		public function mostrarDados(){
			$sql= "SELECT * FROM  administracao WHERE id_administracao = '$this->id'";
			$qry = self::executarSQL($sql);
			$linha = self::listar($qry);
			
			$this->id  		= $linha["id_administracao"];
			$this->nome  	= $linha["nome"];
			$this->email  	= $linha["email"];
			$this->login  	= $linha["login"];
			$this->tx_senha  = $linha["senha"];
		}
	
		public function totalRegistros($sql){
			$qry = self::executarSQL($sql);
			$total= self::contaDados($qry);
			
			return $total;
		}
		
		public function verAdministracao($sql,$i){
			$qry = mysql_query($sql);	
			
			$this->id  			= mysql_result($qry,$i,"id_administracao");
			$this->nome  		= mysql_result($qry,$i,"nome");
			$this->email  		= mysql_result($qry,$i,"email");
			$this->login  		= mysql_result($qry,$i,"login");
			$this->tx_senha  	= mysql_result($qry,$i,"senha");			
		}
	
	
	}
	class DadosBanner extends conexaoMySQL{
		private $id, $titulo_banner, $alt, $url_banner, $ativo_banner, $imagem_banner;
		
		public function setId($id){
			$this->id = $id;
		}
		public function getId(){
			return $this-> id;
		}
		
		public function getTituloBanner(){
			return $this-> titulo_banner;
		}
		public function getAlt(){
			return $this-> alt;
		}
		public function getUrlBanner(){
			return $this-> url_banner;
		}
		public function getAtivo(){
			return $this-> ativo_banner;
		}
		public function getImagem(){
			return $this-> imagem_banner;
		}
		
		public function mostrarDados(){
			$sql= "SELECT * FROM  banner WHERE id_banner = '$this->id'";
			$qry = self::executarSQL($sql);
			$linha = self::listar($qry);
			
			$this->id  				= $linha["id_banner"];
			$this->titulo_banner  	= $linha["titulo_banner"];
			$this->alt  			= $linha["alt"];
			$this->url_banner  		= $linha["url_banner"];
			$this->ativo_banner  	= $linha["ativo_banner"];
			$this->imagem_banner  	= $linha["imagem_banner"];
		}
		
		public function totalRegistros($sql){
			$qry = self::executarSQL($sql);
			$total= self::contaDados($qry);
			
			return $total;
		}
		
		public function verBanner($sql,$i){
			$qry = mysql_query($sql);
			
			$this->id  				= mysql_result($qry,$i,"id_banner");
			$this->titulo_banner  	= mysql_result($qry,$i,"titulo_banner");
			$this->alt              = mysql_result($qry,$i,"alt");
			$this->url_banner       = mysql_result($qry,$i,"url_banner");
			$this->ativo_banner     = mysql_result($qry,$i,"ativo_banner");
			$this->imagem_banner    = mysql_result($qry,$i,"imagem_banner");
			
		}
	
	}

	
	
	class DadosProduto extends conexaoMySQL{
		private $id, $id_categoria, $titulo_produto, $preco, $autor, $duracao,
				$descricao, $conteudo, $slug_produto, $ativo_produto, $imagem_produto, $descricao_rapida;
				
		private $categoria, $slug_categoria;
		
		public function setId($id){
			$this->id = $id;
		}
		public function getId(){
			return $this-> id;
		}		
		public function getIdCategoria(){
			return $this-> id_categoria;
		}
		public function getTituloProduto(){
			return $this-> titulo_produto;
		}
		public function getPreco(){
			return $this-> preco;
		}
		public function getAtivo(){
			return $this-> ativo_banner;
		}
		public function getAutor(){
			return $this-> autor;
		}		
		public function getDuracao(){
			return $this-> duracao;
		}
		public function getDescricao(){
			return $this-> descricao;
		}
		public function getConteudo(){
			return $this-> conteudo;
		}
		public function getSlugProduto(){
			return $this-> slug_produto;
		}
		public function getAtivoProduto(){
			return $this-> ativo_produto;
		}		
		public function getImagemProduto(){
			return $this-> imagem_produto;
		}
		public function getDescricaoRapida(){
			return $this-> descricao_rapida;
		}
		
		public function getCategoria(){
			return $this-> categoria;
		}
		
		public function getSlugCategoria(){
			return $this-> slug_categoria;
		}
		
		public function mostrarDados(){
			$sql= "SELECT c.*, p.* FROM categoria c,  produto p WHERE c.id_categoria=p.id_categoria and id_produto = '$this->id'";
			$qry = self::executarSQL($sql);
			$linha = self::listar($qry);
			
			$this->id  				= $linha["id_produto"];
			$this->id_categoria  	= $linha["id_categoria"];
			$this->titulo_produto  	= $linha["titulo_produto"];
			$this->preco  			= $linha["preco"];
			$this->autor  			= $linha["autor"];
			$this->duracao  		= $linha["duracao"];
			$this->descricao  		= $linha["descricao"];
			$this->conteudo  		= $linha["conteudo"];
			$this->slug_produto  	= $linha["slug_produto"];
			$this->ativo_produto  	= $linha["ativo_produto"];
			$this->imagem_produto  	= $linha["imagem_produto"];		
			$this->descricao_rapida = $linha["descricao_rapida"];
			
			$this->categoria  		= $linha["categoria"];
			$this->slug_categoria  	= $linha["slug_categoria"];	
		}
	
		public function totalRegistros($sql){
			$qry = self::executarSQL($sql);
			$total= self::contaDados($qry);
			
			return $total;
		}		
		
		public function verProdutos($sql,$i){
			$qry = mysql_query($sql);
			
			
			$this->id  				= mysql_result($qry,$i,"id_produto");
			$this->id_categoria  	= mysql_result($qry,$i,"id_categoria");
			$this->titulo_produto  	= mysql_result($qry,$i,"titulo_produto");
			$this->preco  			= mysql_result($qry,$i,"preco");
			$this->autor  			= mysql_result($qry,$i,"autor");
			$this->duracao  		= mysql_result($qry,$i,"duracao");
			$this->descricao  		= mysql_result($qry,$i,"descricao");
			$this->conteudo  		= mysql_result($qry,$i,"conteudo");
			$this->slug_produto  	= mysql_result($qry,$i,"slug_produto");
			$this->ativo_produto  	= mysql_result($qry,$i,"ativo_produto");
			$this->imagem_produto  	= mysql_result($qry,$i,"imagem_produto");
			$this->descricao_rapida = mysql_result($qry,$i,"descricao_rapida");
			
			$this->categoria  		= mysql_result($qry,$i,"categoria");
			$this->slug_categoria  	= mysql_result($qry,$i,"slug_categoria");	
		}
		
		
		public function listarProdutos($sql_prod){					
							
			$total_prod = $this->totalRegistros($sql_prod);
				
			for($j=0;$j<$total_prod;$j++){
				$this-> verProdutos($sql_prod,$j);
				$idproduto = $this->getId();
				
				$endereco = pg."/detalhe/".$this->getSlugCategoria()."/".$this->getSlugProduto()."/".$this->getId();
								
				if(trim($this->getImagemProduto()) == ""){
					$img=pg ."/admin/fotos/sem-imagem.png";
				}else{
					$img=pg ."/admin/fotos/".$this->getImagemProduto();
				}
				
				$prod   = $this->getTituloProduto();
				
				$preco  = $this->getPreco();
				
				$preco_format = "R$ " .number_format($this->getPreco(),2,',','.');
				
				$action = pg."/op_carrinho.php";

			echo "
				<li>
					    <a href= $endereco >
						<figure>
							<img src=$img alt=$prod width=92 height=139>
							<figcaption> $prod </figcaption>
						</figure>
						<span>  $preco_format </span>
						</a>
						<form action=$action method='post'>
							<input type=hidden name=txt_valor value=$preco />
							<input type=hidden name='id_produto' value=$idproduto />
							<input type=hidden name=acao value='INSERIR' /> 
							<input type=submit value=''> 
						</form>				
					
				</li>	";			
			 } 
		
		}
		
	}	
		
	
	class DadosCarrinho extends conexaoMySQL{
		
		private $id,$id_pedido, $id_produto, $valor, $qtde;
		
		private $id_categoria, $titulo_produto, $preco, $autor, $duracao,
				$descricao, $conteudo, $slug_produto, $ativo_produto, $imagem_produto;
		
		public function setId($id){
			$this->id = $id;
		}
		public function getId(){
			return $this-> id;
		}		
		public function getIdCategoria(){
			return $this-> id_categoria;
		}
		public function getTituloProduto(){
			return $this-> titulo_produto;
		}
		public function getPreco(){
			return $this-> preco;
		}
		public function getAtivo(){
			return $this-> ativo_banner;
		}
		public function getAutor(){
			return $this-> autor;
		}		
		public function getDuracao(){
			return $this-> duracao;
		}
		public function getDescricao(){
			return $this-> descricao;
		}
		public function getConteudo(){
			return $this-> conteudo;
		}
		public function getSlugProduto(){
			return $this-> slug_produto;
		}
		public function getAtivoProduto(){
			return $this-> ativo_produto;
		}		
		public function getImagemProduto(){
			return $this-> imagem_produto;
		}

	
		public function getIdPedido(){
			return $this-> id_pedido;
		}
		public function getIdProduto(){
			return $this-> id_produto;
		}
		public function getValor(){
			return $this-> valor;
		}		
		public function getQtde(){
			return $this-> qtde;
		}
		
		public function mostrarDados(){
			$sql= "SELECT c.*, p.* FROM carrinho c, produto p where  c.id_produto = p.id_produto and id_pedido = '$this->id_pedido'";
			$qry = self::executarSQL($sql);
			$linha = self::listar($qry);
			
			$this->id  				= $linha["id_produto"];
			$this->id_categoria  	= $linha["id_categoria"];
			$this->titulo_produto  	= $linha["titulo_produto"];
			$this->preco  			= $linha["preco"];
			$this->autor  			= $linha["autor"];
			$this->duracao  		= $linha["duracao"];
			$this->descricao  		= $linha["descricao"];
			$this->conteudo  		= $linha["conteudo"];
			$this->slug_produto  	= $linha["slug_produto"];
			$this->ativo_produto  	= $linha["ativo_produto"];
			$this->imagem_produto  	= $linha["imagem_produto"];	
			
			$this->id_pedido  	= $linha["id_pedido"];	
			$this->id_produto  	= $linha["id_produto"];	
			$this->valor  		= $linha["valor"];	
			$this->qtde  		= $linha["qtde"];	
			
		}
	
		public function totalRegistros($sql){
			$qry = self::executarSQL($sql);
			$total= self::contaDados($qry);
			
			return $total;
		}
		
		
		public function verCarrinho($sql,$i){
			$qry = mysql_query($sql);
			
			//tabela de produto
			$this->id  				= mysql_result($qry,$i,"id_produto");
			$this->id_categoria  	= mysql_result($qry,$i,"id_categoria");
			$this->titulo_produto  	= mysql_result($qry,$i,"titulo_produto");
			$this->preco  			= mysql_result($qry,$i,"preco");
			$this->autor  			= mysql_result($qry,$i,"autor");
			$this->duracao  		= mysql_result($qry,$i,"duracao");
			$this->descricao  		= mysql_result($qry,$i,"descricao");
			$this->conteudo  		= mysql_result($qry,$i,"conteudo");
			$this->slug_produto  	= mysql_result($qry,$i,"slug_produto");
			$this->ativo_produto  	= mysql_result($qry,$i,"ativo_produto");
			$this->imagem_produto  	= mysql_result($qry,$i,"imagem_produto");
			//tabela do carrinho
			$this->id_pedido  		= mysql_result($qry,$i,"id_pedido");	
			$this->id_produto  		= mysql_result($qry,$i,"id_produto");	
			$this->valor  			= mysql_result($qry,$i,"valor");	
			$this->qtde  			= mysql_result($qry,$i,"qtde");
		}
		
	}
	
	class DadosVenda extends conexaoMySQL{
		
		private $id,$id_cliente, $data_venda, $codigo_rastreamento, $pago, $status_venda;
		
		
		
		public function setId($id){
			$this->id = $id;
		}
		public function getId(){
			return $this-> id;
		}		
		public function getIdCliente(){
			return $this-> id_cliente;
		}
		public function getDataVenda(){
			return $this-> data_venda;
		}
		public function getCodigoRastreamento(){
			return $this-> codigo_rastreamento;
		}
		public function getPago(){
			return $this-> pago;
		}
		public function getStatusVenda(){
			return $this-> status_venda;
		}	

		
		public function mostrarDados(){
			$sql= "SELECT * FROM venda WHERE id_venda = '$this->id'";
			$qry = self::executarSQL($sql);
			$linha = self::listar($qry);			
		
			
			$this->id  					= $linha["id_venda"];
			$this->id_cliente  			= $linha["id_cliente"];
			$this->data_venda  			= $linha["data_venda"];
			$this->codigo_rastreamento 	= $linha["codigo_rastreamento"];
			$this->pago  				= $linha["pago"];
			$this->status_venda  		= $linha["status_venda"];				
			
		}
	
		public function totalRegistros($sql){
			$qry = self::executarSQL($sql);
			$total= self::contaDados($qry);
			
			return $total;
		}
		
		
		
		public function verVenda($sql,$i){
			$qry = mysql_query($sql);			
			
			$this->id  					= mysql_result($qry,$i,"id_venda");
			$this->id_cliente  			= mysql_result($qry,$i,"id_cliente");
			$this->data_venda  			= mysql_result($qry,$i,"data_venda");
			$this->codigo_rastreamento 	= mysql_result($qry,$i,"codigo_rastreamento");
			$this->pago  				= mysql_result($qry,$i,"pago");
			$this->status_venda  		= mysql_result($qry,$i,"status_venda");			                         
			
		}
		
	}
	
	
		class DadosItensVenda extends conexaoMySQL{
		
		private $id,$id_venda, $id_produto, $valor, $qtde;
		
		private $id_categoria, $titulo_produto, $preco, $autor, $duracao,
				$descricao, $conteudo, $slug_produto, $ativo_produto, $imagem_produto;
		
		public function setId($id){
			$this->id = $id;
		}
		public function getId(){
			return $this-> id;
		}		
		public function getIdCategoria(){
			return $this-> id_categoria;
		}
		public function getTituloProduto(){
			return $this-> titulo_produto;
		}
		public function getPreco(){
			return $this-> preco;
		}
		public function getAutor(){
			return $this-> autor;
		}		
		public function getDuracao(){
			return $this-> duracao;
		}
		public function getDescricao(){
			return $this-> descricao;
		}
		public function getConteudo(){
			return $this-> conteudo;
		}
		public function getSlugProduto(){
			return $this-> slug_produto;
		}
		public function getAtivoProduto(){
			return $this-> ativo_produto;
		}		
		public function getImagemProduto(){
			return $this-> imagem_produto;
		}

	
		public function getIdVenda(){
			return $this-> id_venda;
		}
		public function getIdProduto(){
			return $this-> id_produto;
		}
		public function getValor(){
			return $this-> valor;
		}		
		public function getQtde(){
			return $this-> qtde;
		}
		
		public function mostrarDados(){
			$sql= "SELECT i.*, p.* FROM itens_venda i, produto p where  i.id_produto = p.id_produto and id_venda = '$this->id_venda'";
			$qry = self::executarSQL($sql);
			$linha = self::listar($qry);
			
			$this->id  				= $linha["id_item"];
			$this->id_categoria  	= $linha["id_categoria"];
			$this->titulo_produto  	= $linha["titulo_produto"];
			$this->preco  			= $linha["preco"];
			$this->autor  			= $linha["autor"];
			$this->duracao  		= $linha["duracao"];
			$this->descricao  		= $linha["descricao"];
			$this->conteudo  		= $linha["conteudo"];
			$this->slug_produto  	= $linha["slug_produto"];
			$this->ativo_produto  	= $linha["ativo_produto"];
			$this->imagem_produto  	= $linha["imagem_produto"];	
			
			$this->id_venda  	= $linha["id_venda"];	
			$this->id_produto  	= $linha["id_produto"];	
			$this->valor  		= $linha["valor_item"];	
			$this->qtde  		= $linha["qtde"];	
			
		}
		
		public function totalRegistros($sql){
			$qry = self::executarSQL($sql);
			$total= self::contaDados($qry);

			
			return $total;
		}
		
		public function somaVendas($id){
			$sql = "SELECT SUM(valor_item * qtde) as totalVenda FROM itens_venda WHERE id_venda= '$id'";
			$qry = self::executarSQL($sql);
			$linha = self::listar($qry);
			
			return $linha["totalVenda"];
		}
		
		public function verItens($sql,$i){
			$qry = mysql_query($sql);
			
			//tabela de produto
			$this->id  				= mysql_result($qry,$i,"id_item");
			$this->id_categoria  	= mysql_result($qry,$i,"id_categoria");
			$this->titulo_produto  	= mysql_result($qry,$i,"titulo_produto");
			$this->preco  			= mysql_result($qry,$i,"preco");
			$this->autor  			= mysql_result($qry,$i,"autor");
			$this->duracao  		= mysql_result($qry,$i,"duracao");
			$this->descricao  		= mysql_result($qry,$i,"descricao");
			$this->conteudo  		= mysql_result($qry,$i,"conteudo");
			$this->slug_produto  	= mysql_result($qry,$i,"slug_produto");
			$this->ativo_produto  	= mysql_result($qry,$i,"ativo_produto");
			$this->imagem_produto  	= mysql_result($qry,$i,"imagem_produto");
			//tabela do carrinho
			$this->id_venda  		= mysql_result($qry,$i,"id_venda");	
			$this->id_produto  		= mysql_result($qry,$i,"id_produto");	
			$this->valor  			= mysql_result($qry,$i,"valor_item");	
			$this->qtde  			= mysql_result($qry,$i,"qtde");
		}
		
	}
?>
