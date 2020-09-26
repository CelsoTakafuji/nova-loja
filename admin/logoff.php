<?php
	ob_start();
	session_start();
	unset($_SESSION["logado_senha"]);
	unset($_SESSION["logado_email"]);
	header('Location: index.php');
	ob_end_flush();
?>