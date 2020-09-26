<?php
	session_start();
	
	unset($_SESSION[cliente_curso]);
	
	echo "<script type='text/javascript'>location.href='".pg."'</script>";
	

?>