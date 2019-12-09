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
	<Head>
	
		<title>Garimbas V3.0</title>
		
		<!-- Hoja de Estilos -->
		
		<link href="estilo.css" type="text/css" rel="stylesheet">
		
		<!-- Icono de la pestaña -->
		
		<link href="img/garimbas.ico" rel="shortcut icon" type="image/x-icon" />
		
		
	
	</head>
	
		
		
	<body>
		<?php

				
				
				
		?>
	
	
			
			<div class="ventanacentro">
			
				<center><br><font face='verdana' size='5' color='#307d7e'><b>PANEL DE CONTROL GARIMBAS V3.0</b></font><hr><br></center>
				
				<center>
				<a href="altas_v2.php"><button class="boton">Altas</button></a><br>
				<a href="consultas.php"><button class="boton">Modificaciones / Consultas</button></a><br>
				<a href="divs_v2.php"><button class="boton">Pantalla Completa</button></a><br>
				<a href="config.php"><button class="boton">Configuración</button></a><br><br><br>
				</center>
				
				<center><hr><font face='verdana' size='5' color='#307d7e'><b>PANEL DE CONTROL GARIMBAS V3.0</b></font><br><br></center>
				
			</div>
		
	</body>
		
		

</html>