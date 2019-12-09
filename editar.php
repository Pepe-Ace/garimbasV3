<?php
		
			/* Inicio sesion para poder recoger variables */
			
			session_start();
		
			/* Establezco la conexion */
		
			include("connect.php");
			
			/* Recojo la variable con el codigo del registro */
			
			$cod_mod	=$_GET["var"];
			$pagina		=$_GET["page"];
			
			// Establezco la orden SQL para realizar la consulta //
				
			$sql="SELECT * FROM beer WHERE id_beer='$cod_mod'";
				
			// Ejecuto el sql y guardo en la variable $fila //
						
			$fila=mysqli_query($conexion, $sql);
				
			// Meto el resultado en la matriz $datos//
						
			$datos=mysqli_fetch_array($fila);
			
			/* Extraigo los campos de la matriz */
			
			$nom_mod	=$datos["nombre"];
			$pais_mod	=$datos["pais"];
			$est_mod	=$datos["estilo"];
			$col_mod	=$datos["color"];
			$alc_mod	=$datos["alcohol"];
			$cant_mod	=$datos["cantidad"];
			$fot_mod	=$datos["foto"];
			$prec_mod	=$datos["precio"];
			$most_mod	=$datos["mostrar"];

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
	
			<center><br><font face='verdana' size='5' color='#307d7e'><b>Editar Datos</b></font><hr></center>
			
			
			<!-- Muestro los datos en un formulario -->
			
				<?php
				
					/* Si vengo de la página que ejecuta la modificación, muestro DATOS ACTUALIZADOS: */
					if($pagina=="mod"){
						
						echo "
						
							<center><font face='verdana' size='5' color='#307d7e'>Datos Actualizados:</font><hr><br></center>
						
						";
						
					}
				
					echo "
						<center>
						<font face='verdana' size='3' color='#307d7e'>
						<form action='mod.php' method='POST' enctype='multipart/form-data'>
							<img src='$fot_mod' width='80'><br><br>
							<input type='hidden'	name='fot_html' 	value='$fot_mod'>
							<input type='hidden'	name='cod_html' 	value='$cod_mod'>
							<input type='text' 		name='nom_html' 	value='$nom_mod'>
							<input type='text' 		name='pais_html'	value='$pais_mod' maxlength=22>
							<input type='text' 		name='est_html' 	value='$est_mod' maxlength=22><br><br>
							Color: 
							<input type='text' 		name='col_html' 	value='$col_mod' maxlength=22>
							Graduación: 
							<input type='number'	name='alc_html' 	value='$alc_mod'	step='any'><br><br>
							Contenido: 
							<input type='number'	name='cant_html' 	value='$cant_mod' 	step='any'>
							Precio: 
							<input type='number'	name='prec_html' 	value='$prec_mod' 	step='any'><br><br>
							
							
											
						";
					/* Para el campo mostrar hago un if y así dependiendo del valor que tenga el check está en si o en no */
					
					if($most_mod=='s'){
						
						echo"
							<input type='radio' 	name='most_html' 		value='s' checked> Mostrar
							<input type='radio' 	name='most_html' 		value='n'> No Mostrar<br><br>
						";
					}
					else{
						echo"
							<input type='radio' 	name='most_html' 		value='s'> Mostrar
							<input type='radio' 	name='most_html' 		value='n' checked> No Mostrar<br><br>
						";
					}
					
					/* Coloco el boton y cierro el formulario */
					
						echo"
							<input type='submit' 	name ='botoneditar' 	value='Actualizar'><br><br><hr>
					
						</form>
						</font>
						";
				
				?>
			
				<a href="consultas.php"><font face='Verdana' size='4' color='#307d7e'><button class="boton">Volver a Consultas</button></font><br><br></a>
				
				</center>
		</div>
		
	</body>






</html>