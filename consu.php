<?php
		
			/* Inicio sesion para poder recoger variables */
			
			session_start();
			
			/* Establezco la conexion */
		
			include("connect.php");
			
			/* Recojo la variable del input de consultas */
			
			$nom_php	=$_POST["nom_html"];
			
			// Establezco la orden SQL para realizar la consulta //
				
			$sql="SELECT * FROM beer WHERE nombre LIKE '%$nom_php%'";
				
			// Ejecuto el sql y guardo en la variable $fila //
						
			$fila=mysqli_query($conexion, $sql);
				
			// Meto el resultado en la matriz $datos//
						
			$datos=mysqli_fetch_array($fila);
			
			/* Creo la variable para decir a la siguiente página de dónde vengo */
			
			$pagina="consu";

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
	
		
	
	
		<br><br>
		
		<table width="60%" height="90%" align="center" cellspacing=0 cellpadding=0 border=1 bordercolor="#307d7e">
			<tr bgcolor='#f0ffff'>
				
				<td height="10%">
					<!-- Creo otro enlace para volver atrás -->
					<center>
					<br><a href="consultas.php"><font face='Verdana' size='4' color='#307d7e'><button class="boton">Volver a Consultas</button></font></a>
					<br><br>
					</center>
				</td>
			
			
			
			</tr>
			<tr bgcolor='#f0ffff'>
				<td height="10%" align='center' colspan=5><font face='Verdana' size='5' color='#307d7e'><b>Resultado de la Consulta</b></font></td>
			</tr>
			<tr>
				<td align="center">
					<div class="ventanaconsultas">
					
						<?php
							/* Compruebo si existen datos en la matriz */
							
							
							if($datos!=""){
								
								/* Hago el encabezado de una tabla para mostrar los datos */
								
								echo"
									<center>
										
										<table cellpadding=5 border=1>
											
											<tr bgcolor='#307d7e'>
												<td><font face='Verdana' size='5' color='#f0ffff'>Foto</font></td>
												<td><font face='Verdana' size='5' color='#f0ffff'>Nombre</font></td>
												<td><font face='Verdana' size='5' color='#f0ffff'>Precio</font></td>
												<td align='center'><font face='Verdana' size='5' color='#f0ffff'>Mos</font></td>
												<td><font face='Verdana' size='5' color='#f0ffff'>Accion</font></td>
											</tr>
								
									</center>
									";
								
									/* comienzo el bucle para recorrer la base de datos */
									do{
										
										/* Extraigo los datos de la matriz */
										
										$cod_cons	=$datos["id_beer"];
										$nom_cons	=$datos["nombre"];
										$prec_cons	=$datos["precio"];
										$mos_cons	=$datos["mostrar"];
										$fot_cons	=$datos["foto"];
										
										/* Convierto la variable mostrar a mayusculas */
										
										$mos_cons=strtoupper($mos_cons);
										
										/* Le doy formato al numero del precio */
										
										$prec_cons	=number_format($prec_cons,2);
										
										echo "
											<tr>
												<td><img src='$fot_cons' width='80'></td>
												<td><font face='Verdana' size='4' color='#307d7e'>$nom_cons</font></td>
												<td align='right'><b><font face='Verdana' size='5' color='red'>".$prec_cons."€</b></font></td>
												<td align='center'><font face='Verdana' size='6' color='black'><b>$mos_cons</b></font></td>
												<td><a href='editar.php?var=$cod_cons&page=$pagina'><button class='boted'>Editar</button></a><br><a href='cambfot.php?var=$cod_cons'><button class='boted'>Cambiar Foto</button></font></a></td>
											</tr>
										
										";
										
																
									}
									while($datos=mysqli_fetch_array($fila));
									
									
									echo "</table>";
								
							}
							else{
								
								echo"
								
									<center><br><font face='verdana' size='6' color='red'><b>¡¡¡NO HAY REGISTROS CON ESE NOMBRE!!!</b></font><Br>
									
								
								";
								
							}
									
						?>
						
					</div>
				</td>
			</tr>		
					
					
	
	
		</table>
	
	</body>




</html>