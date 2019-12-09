<?php

			/* Inicio sesion para poder recoger variables */
			
			session_start();
			

				/* Compruebo si las variables de sesión están vacías o no (Si se ha iniciado la sesión)*/
				
				if(empty($_SESSION["usuario_sess"]) OR empty($_SESSION["passw_sess"])){
					
					/* Si alguna de ellas está vacía, recargo la página de login */
					
					header("location: entrar.html");
					
					/* Salgo del script php */
					
					exit();
					
					
				}
				
				/* Si la sesión ha sido iniciada correctamente, continuo ejecutando el script */
				
				
?>


<html>
	<head>
	
		<title>Garimbas V3.0</title>
		
		<!-- Hoja de Estilos -->
		
		<link href="estilo.css" type="text/css" rel="stylesheet">
		
		<!-- Icono de la pestaña -->
		
		<link href="img/garimbas.ico" rel="shortcut icon" type="image/x-icon" />
		
		
	
	</head>
	<body>
	
		
	
	
		<div class="ventanacentro">
			<center>
			
			<center><br><font face='verdana' size='5' color='#307d7e'><b>Consultas y Modificaciones</b></font><hr><br></center>
			
			<form action="consu.php" method="POST">
			
				<input type="text" 		name="nom_html" placeholder="Introduzca al menos tres letras del nombre o deje en blanco para ver todas" size="60"><br><br>
				<input type="submit"	name="botoncon"	value="consultar"><br><br><hr>
			
			</form>
			
			<a href="index.php"><font face='verdana' size='4' color='#307d7e'><button class="boton">Volver al Indice</button><br><br></font>
			
			</center>
		</div>
	
	
	</body>



</html>