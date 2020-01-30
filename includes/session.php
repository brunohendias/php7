<?php 

	session_start();

	if($_SESSION['mensagem']):
		echo $_SESSION['mensagem'];
	endif;
	unset($_SESSION['mensagem']);

 ?>