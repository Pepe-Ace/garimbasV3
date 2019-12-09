<?php
		
			/* Esta funcion inicia sesion para poder recoger las variables que envia la pagina que sube
			el archivo, al devolverme aqui */
		
			session_start();
		
			/* Establezco la conexion */
		
			include("connect.php");
			
			/* Recojo la variable con el codigo del registro */
			
			$cod_mod	=$_GET["var"];
			
			// Establezco la orden SQL para realizar la consulta //
				
			$sql="SELECT * FROM beer WHERE id_beer='$cod_mod'";
				
			// Ejecuto el sql y guardo en la variable $ejecutar //
						
			$ejecutar=mysqli_query($conexion, $sql);
				
			// Meto el resultado en la matriz $fila//
						
			$fila=mysqli_fetch_array($ejecutar);
			
			/* Extraigo los campos que me interesan (nombre, foto y código) de la matriz */
			
			$nom_fot	=$fila["nombre"];
			$fot_fot	=$fila["foto"];
			


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
	<body class="fondoscuro">
	
		
	
	
		<div class="ventanacentro">
	
			<center><br><font face='verdana' size='5' color='#307d7e'><b>Cambiar Foto</b></font><hr></center>
			
			<?php
			
			/* Muestro la foto y el nombre de la cerveza */
			
			
			echo"
				<center>
					<table border=0>
						<tr bgcolor='#307d7e'>
							<td align='center'><font face='verdana' size='5' color='#f0ffff'>Foto</font></td>
							<td align='center'><font face='verdana' size='5' color='#f0ffff'>Nombre</font></td>
						</tr>
						<tr bgcolor='#f0ffff'>
							<td align='center'><font face='verdana' size='5' color='#307d7e'><img src='$fot_fot' width='150'></font></td>
							<td align='left'><font face='verdana' size='5' color='#307d7e'><b>&nbsp&nbsp$nom_fot</b></font></td>
						</tr>
					
					
					</table>
					
			
			
			
				</center>";
			
			
			
				/* Coloco el formulario para cambiar el archivo de foto */
			
				echo"	<center><br>
						<form action='modfot_v2.php' method='POST' enctype='multipart/form-data'>
						
							<input type='hidden' name='cod_html' value='$cod_mod'>
							<input class='subirarchivo' type='file' name='archivosubido'><br><br>
							<input type='submit' name ='botonsubir' value='Grabar'><br>
						
						</form>
						</center>";
			
			?>
			<!-- Creo un enlace para volver atrás -->
			
			<center>
			<hr>
			<a href="consultas.php"><font face='Verdana' size='4' color='#307d7e'><button class="boton">Volver a Consultas</button></font></a>
			<br><br>
			</center>
	
	
	
		</div>
	
	
	</body>




</html>