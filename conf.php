<?php

			/* Inicio sesion para poder recoger variables */
			
			session_start();
			
			/* Establezco la conexion con la base de datos */
			
			include("connect.php");
			
			/* Compruebo si las variables de sesión están vacías o no (Si se ha iniciado la sesión)*/
				
			if(empty($_SESSION["usuario_sess"]) OR empty($_SESSION["passw_sess"])){
					
				/* Si alguna de ellas está vacía, recargo la página de login */
					
				header("location: entrar.html");
					
				/* Salgo del script php */
					
				exit();
					
			}
				
			/* Si la sesión ha sido iniciada correctamente, continuo ejecutando el script */
			
			/* Recojo las variables del Input */
			
			$n_local_php	=$_POST["n_local_html"];
			$et_1_php		=$_POST["et_1_html"];
			$et_2_php		=$_POST["et_2_html"];
			$et_3_php		=$_POST["et_3_html"];
			$et_4_php		=$_POST["et_4_html"];
			$et_5_php		=$_POST["et_5_html"];
			
			/* Establezco la orden sql para cambiar los datos.
				Como solo hay un registro, no necesito el WHERE */
			
			
			$sql="UPDATE configuracion SET
					
						titulo	='$n_local_php',
						et_1	='$et_1_php',
						et_2	='$et_2_php',
						et_3	='$et_3_php',
						et_4	='$et_4_php',
						et_5	='$et_5_php'
						
						";
						
			/* Ejecuto la orden SQL para modificar los datos */
			
			$ejecutar=mysqli_query($conexion, $sql);
			
			/* Me vuelvo a la pagina principal */
			
			header("Location: index.php");
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