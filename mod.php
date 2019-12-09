<?php
		
			/* Inicio sesion para poder recoger variables */
			
			session_start();
		
			/* Establezco la conexion con la base de datos */
			
			include("connect.php");
			
			/* Creo la variable para decir a la siguiente página de dónde vengo */
			
			$pagina="mod";

			/* Compruebo si las variables de sesión están vacías o no (Si se ha iniciado la sesión)*/
				
			if(empty($_SESSION["usuario_sess"]) OR empty($_SESSION["passw_sess"])){
					
				/* Si alguna de ellas está vacía, recargo la página de login */
					
				header("location: entrar.html");
					
				/* Salgo del script php */
					
				exit();
					
			}
				
			/* Si la sesión ha sido iniciada correctamente, continuo ejecutando el script */
				
				
			/* Recojo el codigo del registro que viene del formulario */
			
			$cod_php=$_POST["cod_html"];
			
						
			/* Recojo el resto de las variables */
			
			$nom_php	=$_POST["nom_html"]	;
			$pais_php	=$_POST["pais_html"];
			$est_php	=$_POST["est_html"]	;
			$col_php	=$_POST["col_html"]	;
			$alc_php	=$_POST["alc_html"]	;
			$cant_php	=$_POST["cant_html"];
			$fot_php	=$_POST["fot_html"]	;
			$prec_php	=$_POST["prec_html"];
			$most_php	=$_POST["most_html"];
			
			
			/* Establezco la orden sql para seleccionar el registro que interesa y cambiar sus datos */
			
			
			$sql="UPDATE beer SET
					
						nombre	='$nom_php'	,
						pais	='$pais_php',
						estilo	='$est_php'	,
						color	='$col_php'	,
						alcohol	='$alc_php'	,
						cantidad='$cant_php',
						precio	='$prec_php',
						mostrar	='$most_php'
					
					WHERE id_beer='$cod_php'
						
						";
						
			/* Ejecuto la orden SQL para modificar los datos */
			
			$ejecutar=mysqli_query($conexion, $sql);
			
				
			/* Recargo la pagina de modificar registros enviando la variable var y la variable pagina */
			
			header("Location: editar.php?var=$cod_php&page=$pagina");
	
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
	
	</body>

</html>