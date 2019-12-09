<?php
		
		/* Inicio sesion para poder recoger variables */
			
		session_start();
	
		/* Establezco la conexion */
		
		include("connect.php");
				
		
		/* Recojo la variable con el codigo del registro */
		
		$cod_fot	=$_POST["cod_html"];

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
		
				<?php
				
					/* Compruebo si existe algo en el input del fichero */
					
					if(isset($_FILES["archivosubido"]) AND $_FILES["archivosubido"]["error"] === UPLOAD_ERR_OK){
					
						/* Recojo los datos del archivo en variables */
						
						$fileTmpPath	=$_FILES["archivosubido"]["tmp_name"]; 	// Nombre temporal del archivo //
						$fileName		=$_FILES["archivosubido"]["name"]; 		// Nombre del archivo //
						$fileSize		=$_FILES["archivosubido"]["size"]; 		// Tamaño del archivo //
						$fileType		=$_FILES["archivosubido"]["type"]; 		// Tipo de archivo //
						
						/* Divido el nombre del archivo por donde encuentre un punto */
						
						$fileNameCmps	=explode(".", $fileName);
						
						/* Extraigo el último componente del nombre después de un punto (la extensión) */
						
						$fileExtension	=strtolower(end($fileNameCmps));
						
						/* saneo el nombre del archivo añadiendo al principio la hora de subida */
						
						$newFileName=md5(time() . $fileName) . "." . $fileExtension;
						
						/* Establezco las extensiones de archivo permitidas guardándolas en una matriz*/
						
						$allowedfileExtensions	=array("jpg", "gif", "png");
						
						/* Compruebo si la extensión del archivo está incluida en la matriz de extensiones permitidas */
						
						if(in_array($fileExtension, $allowedfileExtensions)){
							
							/* Establezco el directorio donde guardar el archivo */
							
							$uploadFileDir	="img/";
							
							/* Le digo el destino del fichero con su nuevo nombre */
							
							$dest_path= $uploadFileDir . $newFileName;
							
							/* Mueve el fichero del directorio temporal al sitio definitivo y comprueba si se movió */
							
							if(move_uploaded_file($fileTmpPath, $dest_path)){
								
								echo "<br><center><font face='Verdana' size='4' color='#307d7e'>Archivo subido correctamente - $dest_path</center></font>";
								
								// Establezco la orden SQL para insertar los campos en la base de datos //

								$sql="UPDATE beer SET foto='$dest_path' WHERE id_beer='$cod_fot'";
								
								/* ejecuto el sql */
								
								mysqli_query($conexion, $sql);
							}
							
							/* Si no lo ha podido mover, error */
							
							else{
								
							echo "<br><center><font face='Verdana' size='4' color='#307d7e'>Se ha producido un error moviendo el archivo al directorio destino. Compruebe si tiene permisos
								en el servidor para escribir en este directorio</font></center>";
							
							}
															
						}
						
						/* Si la extensión no está dentro de las permitidas */
						
						else{
							
							echo "<br><center><font face='Verdana' size='4' color='#307d7e'>La subida ha fallado. Los tipos de archivo permitidos son: " . implode(" - ", $allowedfileExtensions) . "</font></center>";
							
						}
						
					/* Si no hay nada en el input del fichero */
						
					}
					else{
							
							echo "<br><center><font face='Verdana' size='4' color='#307d7e'>NO HA CAMBIADO LA FOTO. <br></font></center>";
												
					}
													
				?>
				
				<!-- Creo un enlace para volver atrás -->
				
				<center>
				<br><hr><br>
				<a href="consultas.php"><font face='Verdana' size='4' color='#307d7e'><a href="consultas.php"><font face='Verdana' size='4' color='#307d7e'><button class="boton">Volver a Consultas</button></font></a></font></a>
				<br><br>
				</center>
		</div>
		
	</body>

</html>