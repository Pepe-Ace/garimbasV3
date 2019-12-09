<?php

/* Inicio sesión para mandar variables de una pagina a otra */
	
	session_start();
	
/* Compruebo si las variables de sesión están vacías o no (Si se ha iniciado la sesión)*/
	
if(empty($_SESSION["usuario_sess"]) OR empty($_SESSION["passw_sess"])){
					
					/* Si alguna de ellas está vacía, recargo la página de login */
					
					header("location: entrar.html");
					
					/* Salgo del script php */
					
					exit();
					
					
				}
				
/* Si la sesión ha sido iniciada correctamente, continuo ejecutando el script */
	
/* Pongo a cero la variable message */
	
	$message="";


/* Establezco la conexion con la base de datos */

	include("connect.php");
	
	
/* Recojo las variables de los input de texto */
		
		$nomphp		=$_POST['nomhtml'];
		$paisphp	=$_POST['paishtml'];
		$estphp		=$_POST['esthtml'];
		$colphp		=$_POST['colhtml'];
		$alcphp		=$_POST['alchtml'];
		$cantphp	=$_POST['canthtml'];
		$precphp	=$_POST['prechtml'];
		$mosphp		=$_POST['moshtml'];
		


/* Compruebo si llego a esta página a través de pulsar el botón grabar del formulario */
	
	if(isset($_POST["botonsubir"]) AND $_POST["botonsubir"]=="Grabar");{
		
		/* Compruebo si el nombre y el precio están vacíos */
		
		if($nomphp!="" and $precphp!=""){
			
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
						
						/* $message=$resulconexion . "Archivo subido correctamente - " . $dest_path . "<br> Nombre: " . $nomphp . " - Precio: " . $precphp; */
						
						
						$_SESSION["nom_sess"]		= $nomphp;
						$_SESSION["prec_sess"]		= $precphp;
						
					}
					
					/* Si no lo ha podido mover, error */
					
					else{
						
						$message="Se ha producido un error moviendo el archivo al directorio destino. Compruebe si tiene permisos
						en el servidor para escribir en este directorio";
					
						$_SESSION["message"] 	= $message;	
					
					}
													
				}
				
				/* Si la extensión no está dentro de las permitidas */
				
				else{
					
					$message="La subida ha fallado. Los tipos de archivo permitidos son: " . implode(" - ", $allowedfileExtensions);
					$_SESSION["message"] 	= $message;
				}
				
			/* Si no hay nada en el input del fichero */
				
			}
			else{
				
					
					$dest_path="img/sinfoto.png";
					
					
					$message="Ha subido los datos sin foto. Actualice la foto cuanto antes. <br>";
					$_SESSION["message"] 	= $message;
					
			}
			
			
				
			// Establezco la orden SQL para insertar los campos en la base de datos //

			$sql="INSERT INTO beer (nombre, pais, estilo, color, alcohol, cantidad, precio, foto, mostrar) VALUES('$nomphp', 
					'$paisphp',	'$estphp', '$colphp', '$alcphp', '$cantphp', '$precphp', '$dest_path', '$mosphp')";
			
			/* ejecuto el sql */
			
			mysqli_query($conexion, $sql);
			
		}
		else{
			
			$message="No ha subido ningún dato";
			$_SESSION["message"] 	= $message;
		}
					
	}
			
	/* Recargo la página anterior */
	
	echo"<script>window.location='altas_v2.php';</script>";
	

?>