<?php
/* Inicio sesión para poder guardar las credenciales */
				
				session_start();
				
/* Me conecto con la base de datos */
			
			include("connect.php");
		
			/* Recojo el usuario y contraseña del formulario de login */
			
			$usuario_php	=$_POST["usuario_html"];
			$passw_php		=$_POST["passw_html"];
			
			/* Establezco la orden sql para recoger usuario y contraseña */
			
			$sql="SELECT * FROM usuarios WHERE n_us='$usuario_php'";
			
			/* Ejecuto la orden SQL */
			
			$ejecutar=mysqli_query($conexion, $sql);
			
			/* Meto los datos en un array */
			
			$fila=mysqli_fetch_array($ejecutar);
			
			/* Recojo los campos */
			
			$usuario_correcto	=$fila["n_us"];
			$passw_correcto		=$fila["p_us"];
			
			
		
			/* Compruebo si el usuario y contraseña coinciden */
			
			if($usuario_php==$usuario_correcto && $passw_php==$passw_correcto){
				
				
				
				/* Guardo las credenciales en variables de sesion */
				
				$_SESSION["usuario_sess"]	=$usuario_php;
				$_SESSION["passw_sess"]		=$passw_php;
				
				/* Redirecciono a la página principal de la web con sesion iniciada */
				
				header("location: index.php");
				
			}
			
			/* Si usuario o contraseña no coinciden los mando a tomar por culo */
			
			else{
				
				echo"
					<div class='ventanacentro'>
						<center>
						<br>
						<p class='textoprecio'>
						¡¡¡USUARIO Y CONTRASEÑA NO COINCIDEN!!!
						</p>
						<br><hr>
						<a href='index.php'><font face='verdana' size='4' color='#307d7e'><button class='boton'>Volver</button></font><br><br>
						</center>
					</div>

				";
								
			}

		?>
		
<html>
	<head>
	
		<title>Garimbas V3.0</title>
		
		<!-- Hoja de Estilos -->
		
		<link href="estilo.css" type="text/css" rel="stylesheet">
		
		<!-- Icono de la pestaña -->
		
		<link href="img/garimbas.ico" rel="shortcut icon" type="image/x-icon" />
	
		<?php

			

		?>
	
	</head>
	<body>
	</body>
</html>
	
	