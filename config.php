<?php

			/* Inicio sesion para poder recoger variables */
			
			session_start();
			
			/* Me conecto a la base de datos */
			
			include("connect.php");

			/* Compruebo si las variables de sesión están vacías o no (Si se ha iniciado la sesión)*/
				
			if(empty($_SESSION["usuario_sess"]) OR empty($_SESSION["passw_sess"])){
					
				/* Si alguna de ellas está vacía, recargo la página de login */
					
				header("location: entrar.html");
					
				/* Salgo del script php */
					
				exit();
					
			}
				
			/* Si la sesión ha sido iniciada correctamente, continuo ejecutando el script */
			
			/* Selecciono el registro para recuperar los datos de configuracion */
			
			$sql_sel="SELECT * FROM configuracion";
			
			/* Ejecuto la orden SQL SELECT */
			
			$eje_cons=mysqli_query($conexion, $sql_sel);
			
			/* Meto los datos en un array */
			
			$fila=mysqli_fetch_array($eje_cons);
			
			/* Recupero el valor de los campos */
			
			$tit_conf	=$fila["titulo"];
			$et_1_conf	=$fila["et_1"];
			$et_2_conf	=$fila["et_2"];
			$et_3_conf	=$fila["et_3"];
			$et_4_conf	=$fila["et_4"];
			$et_5_conf	=$fila["et_5"];
			
			
			
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
		
		
		<div class="ventanaconfig">
			
				<center><br><font face='verdana' size='5' color='#307d7e'><b>CONFIGURACIÓN GARIMBAS V3.0</b></font><hr><br></center>
				
				<center><img src="img/config.png" width='80%'></center><br><br>
				
				<?php
					echo"
						<center>
						<form action='conf.php' method='POST'>
							<input type='text' name='n_local_html'	value='$tit_conf' 		maxlength=45	size=50><br><br>
							<input type='text' name='et_1_html'		value='$et_1_conf' 		maxlength=7		size=7>
							<input type='text' name='et_2_html'		value='$et_2_conf' 		maxlength=7		size=7>
							<input type='text' name='et_3_html'		value='$et_3_conf' 		maxlength=7		size=7>
							<input type='text' name='et_4_html'		value='$et_4_conf' 		maxlength=5		size=5>
							<input type='text' name='et_5_html'		value='$et_5_conf' 		maxlength=4		size=5><br><br><hr>
							<input type='submit' value='Grabar'><br><hr>
						
						
						</form>
						<a href='index.php'><button class='boton'>Volver al Indice</button></a><br><br>
						</center>
					";
				?>
				
				<center><hr><font face='verdana' size='5' color='#307d7e'><b>CONFIGURACIÓN GARIMBAS V3.0</b></font><br><br></center>
				
		</div>
	
	
	
	
	
	
	
	</body>
</html>