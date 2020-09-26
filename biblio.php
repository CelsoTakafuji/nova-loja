<?php

	include_once("/admin/classes/iniSis.php");

	function data_extenso()
	{
		$dia_da_semana = array("Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado");
		 
		$mes_extenso = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "junho", 	"Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
		 
		$dia = date("d");//01-31
		$mes =date("n")-1; //1-12
		$ano = date("Y"); //YYYY
		$dia_sem = date("w"); //0-6  
		  
		// $data_final = $dia_da_semana[$dia_sem]. ", $dia de " .$mes_extenso[$mes]. " de $ano";
		$data_final = "$dia de " .$mes_extenso[$mes]. " de $ano";
		return $data_final;
	}
 
	function databr($data,$opt)
	{
		if ($opt==1)
		{    
			$dia = substr($data,0,2);
			$mes = substr($data,3,2);
			$ano = substr($data,6,4);
			$databr = $ano . "-" . $mes . "-" . $dia;
		} else 
		{
			$dia = substr($data,8,2);
			$mes = substr($data,5,2);
			$ano = substr($data,0,4);
			$databr = $dia . "/" . $mes . "/" . $ano;
		}
		return $databr;
	}

	function limitarString($texto, $limite)
	{
		if (strlen($texto) <= $limite)
		{
			return $texto;
		}
		else
		{	
			$corta = substr($texto,0,$limite);
			$espaco = strrpos($corta, ' ');
			return substr($texto,0, $espaco);
		
		}
	}

	function anti_sql_injection($str) {
		if (!is_numeric($str)) {
			$str = get_magic_quotes_gpc() ? stripslashes($str) : $str;
			$str = function_exists('mysql_real_escape_string') ? mysql_real_escape_string($str) : mysql_escape_string($str);
		}
		return $str;
	}

	function gen_slug($str){
		# special accents
		$a = array('À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Ù','Ú','Û','Ü','Ý','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ü','ý','ÿ','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','Ð','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','?','?','J','j','K','k','L','l','L','l','L','l','?','?','L','l','N','n','N','n','N','n','?','O','o','O','o','O','o','Œ','œ','R','r','R','r','R','r','S','s','S','s','S','s','Š','š','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Ÿ','Z','z','Z','z','Ž','ž','?','ƒ','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','?','?','?','?','?','?');
		$b = array('A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o');
		return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/','/[ -]+/','/^-|-$/'),array('','-',''),str_replace($a,$b,$str)));
	}

/***************************************
ENVIA O E-MAIL
****************************************/		
	function sendMail($assunto, $mensagem, $remetente, $nomeRemetente, $destino, $nomeDestino, $reply = NULL, $replyNome = NULL){
		require_once('/admin/classes/mail/class.smtp.php'); //Inclui a classe do SMTP
		require_once('/admin/classes/mail/class.phpmailer.php'); //Inclui a classe do PHPMAILER
		
		$mail = new PHPMailer(); //INICIA A CLASSE
		$mail->IsSMTP(); //Habilita envio SMTP
		$mail->SMTPAuth = true; //Ativa e-mail autentificado
		$mail->IsHTML(true);
		
		$mail->SMTPSecure = 'ssl';	// SSL REQUERIDO pelo GMail
		$mail->Host = MAILHOST; //Servidor de envio
		$mail->Port = MAILPORT; //Porta de envio
		$mail->Username = MAILUSER; //e-mail para SMTP autentificado
		$mail->Password = MAILPASS; 
		
		$mail->From = utf8_decode($remetente); //remetente
		$mail->FromName = utf8_decode($nomeRemetente); //remetente nome

		if($reply != NULL){
			$mail->AddReplyTo(utf8_decode($reply),utf8_decode($replyNome));
		}
		
		$mail->Subject = utf8_decode($assunto); //assunto
		$mail->Body = utf8_decode($mensagem); //mensagem
		$mail->AddAddress($destino,utf8_decode($nomeDestino)); //e-mail e nome do dia
		if($mail->Send()){
			//echo '<span>Mensagem enviada com sucesso!</span>';
			return true;
		}else{
			//echo '<span>Erro ao enviar, favor entre em contato pelo e-mail MEU E-MAIL!';
			return false;
		}
	}

?>