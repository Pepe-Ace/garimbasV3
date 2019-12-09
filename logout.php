<?php
	/* Inicio sesión para poder destruirla */
	
	session_start();
	
	/* Destruyo la sesion */
	
	session_destroy();
	
	/* Recargo la pagina de login */
	
	header("location: entrar.html");




?>