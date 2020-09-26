<?php
	session_start();
	
	if($_SESSION[cliente_curso][ID]==null || $_SESSION[cliente_curso][ID] ==""){
		echo "<script type='text/javascript'> location.href='logarParaComprar/escolher_pagamento' </script>";
	}else{
		echo "<script type='text/javascript'> location.href='escolher_pagamento' </script>";
	}

?>