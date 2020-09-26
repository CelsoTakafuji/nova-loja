	<?php
		$sql_banner = "SELECT imagem_banner FROM banner WHERE ativo_banner = 'S' ";
		$total_banner = $banner->totalRegistros($sql_banner);
		unset($col_banner);
		for($b=0;$b<$total_banner;$b++){
			$banner-> verBanner($sql_banner,$b);
			$col_banner[$b] = $banner->getImagem();
		}
		$banner_escolhido = rand(0, $total_banner-1); // Define um número aleatório
		echo $col_banner[$banner_escolhido]; // Exibe o elemento
	?>