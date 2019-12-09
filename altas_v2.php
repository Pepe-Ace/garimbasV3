<?php
	
		/* Esta funcion inicia sesion para poder recoger las variables que envia la pagina que sube los datos, al devolverme aqui */
		
		session_start();
		

				/* Compruebo si las variables de sesión están vacías o no (Si se ha iniciado la sesión)*/
				
				if(empty($_SESSION["usuario_sess"]) OR empty($_SESSION["passw_sess"])){
					
					/* Si alguna de ellas está vacía, recargo la página de login */
					
					header("location: entrar.html");
					
					/* Salgo del script php */
					
					exit();
					
					
				}
				
				/* Si la sesión ha sido iniciada correctamente, continuo ejecutando el script */
				
				
			
			/* Compruebo con la funcion isset() si está definida la variable message 
			que traigo de la pagina que sube los datos cuando hay algún error */			
			
			if(isset($_SESSION["message"]) && $_SESSION["message"]){
				
				/* Recojo la variable */
				
				$alert=$_SESSION["message"];
				
				/* Muestro el mensaje que viene de la pagina de grabar */
				
				echo"
					<div class='ventanaerror'>			
						
						<center><br><font face='verdana' size='6' color='red'><b>$alert</b></font><Br>
									
					</div>
					";
				
				
				
				/* printf("<b>%s", $_SESSION["message"]); */
				
				// Vacío la variable $_SESSION //
				
				unset($_SESSION["message"]);				
			}
			
			/* Si no hay error y he grabado correctamente */
			
			else{
				
				/* Compruebo si existe el nombre que viene del php de grabar
				y si existe recojo el nombre y el precio y muestro lo que acabo de grabar */
				
					
				if(isset($_SESSION["nom_sess"]) AND $_SESSION["nom_sess"]){	
					$nombre_s=$_SESSION["nom_sess"];
					$precio_s=$_SESSION["prec_sess"];
				
				
				
					/* Muestro los datos que acabo de grabar */
					
					echo"
						<center>
						<table border=1 width='50%'>
							<tr bgcolor='#307d7e'>
								<td colspan=2 Align='center'><font face='verdana' size='4' color='#f0ffff'><b>Ultimos datos Grabados</b></font></td>
							</tr>
							<tr bgcolor='#7bccb5'>
								<td Align='left'><font face='verdana' size='4'>Nombre</font></td>
								<td Align='Right'><font face='verdana' size='4'>Precio</font></td>
							</tr>
							<tr bgcolor='#f0ffff'>
								<td Align='left'><font face='verdana' size='4'><b>$nombre_s</b></font></td>
								<td Align='Right'><font face='verdana' size='5'><b>$precio_s</b> €</font></td>
							</tr>
						</table>
						</center>
											
						";
					
					/* Vacío las variables nombre y precio */
					
					unset($_SESSION["nom_sess"]);
					unset($_SESSION["prec_sess"]);
				
				}
				
				
			}
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
		
			<center><br><font face='verdana' size='5' color='#307d7e'><b>Alta de Nuevas Cervezas</b></font><hr><br>
			
			<form action="grabar_v2.php" method="POST" enctype="multipart/form-data">
			
				<input type="text" 		name="nomhtml" 	placeholder="Nombre de la cerveza" required>
				<input type="text" 		name="paishtml" placeholder="Pais de Origen" maxlength=22>
				<input type="text" 		name="esthtml" 	placeholder="Estilo de cerveza" maxlength=22><br><br>
				<input type="text" 		name="colhtml" 	placeholder="Color" maxlength=22>
				<input type="number"	name="alchtml" 	placeholder="Graduacion" 		step="any">
				<input type="number"	name="canthtml" placeholder="Contenido" 		step="any"><br><br>
				<input type="number"	name="prechtml" placeholder="Precio de venta" 	step="any" required><br><br>
				
				
				<input type="file" name="archivosubido"><br><br>
				
				
				<input type="radio" 	name="moshtml" 		value="s" checked> Mostrar
				<input type="radio" 	name="moshtml" 		value="n"> No Mostrar<br><br>
				<input type="submit" 	name ="botonsubir" 	value="Grabar"><br><br><hr>
			
			</form>
			
			<a href="index.php"><font face='verdana' size='4' color='#307d7e'><button class="boton">Volver al Indice</button></font><br><br>
			
			</center>
			
		</div>
	
	</body>

</html>