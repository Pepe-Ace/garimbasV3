<?php
	/* Inicio la sesion para poder mandar las variables */
	
		session_start();


?>
<html>
	<head>
	
		<title>Garimbas V3.0</title>
		
		<!-- Hoja de Estilos -->
		
		<link href="estilo.css" type="text/css" rel="stylesheet">
		
		<!-- Icono de la pestaña -->
		
		<link href="img/garimbas.ico" rel="shortcut icon" type="image/x-icon" />
		
		<?php
		
			
			/* Me conecto con la base de datos */
			
			include('connect.php');
			
			/* Establezco la orden SQL para seleccionar la tabla de configuracion */
			
			$sql_conf="SELECT * FROM configuracion";
			
			/* Ejecuto la orden SQL */
			
			$ejecutar_conf=mysqli_query($conexion, $sql_conf);
			
			/* Meto los datos en la matriz de configuracion */
			
			$fila_conf=mysqli_fetch_array($ejecutar_conf);
			
			/* Recojo las variables para las etiquetas */
			
			$tit_php	=$fila_conf["titulo"];
			$et_1_php	=$fila_conf["et_1"];
			$et_2_php	=$fila_conf["et_2"];
			$et_3_php	=$fila_conf["et_3"];
			$et_4_php	=$fila_conf["et_4"];
			$et_5_php	=$fila_conf["et_5"];
			
			
		
			
		?>
	
	</head>
	<body>
		<div id="pantalla">
			<div id="cabecera">
				<table  class="textotitulo" width="100%" height="90%" border=4 cellspacing=4 bordercolor="#99ffff">
					<tr>
						<td width="100%" align="center" valign="middle">
							
							<?php
							
								echo"$tit_php";
							
							?>
							
						</td>
					</tr>
				</table>
			
			</div>
			<div id='cuerpos'>
			<?php
			
		
			/* Compruebo con la funcion isset() si están definidas la variables de los contadores que
				traigo del final de la pagina */
			
			if(isset($_SESSION["contadortotal"]) && $_SESSION["contadortotal"]){
				
					
					/* Recojo el estado de los contadores */
					
					$cont_tot=$_SESSION["contadortotal"];
					$cont_par=$_SESSION["contadorparcial"];
					
					/* Recojo el estado de las variables mysql */
					
					$ejecutar	=$_SESSION["ejecutar"];
					
					$fila		=$_SESSION["fila"];
					
					/* Recojo el contador del numero de registros */
					
					$reg_cont	=$_SESSION["numeroregistros"];
					
					/* Recojo las variables de los campos */
					
					$cod_php	=$_SESSION["codigo"];
					$nom_php	=$_SESSION["nombre"];
					$pais_php	=$_SESSION["pais"];
					$est_php	=$_SESSION["estilo"];
					$col_php	=$_SESSION["color"];
					$alc_php	=$_SESSION["alcohol"];
					$cant_php	=$_SESSION["cantidad"];
					$prec_php	=$_SESSION["precio"];
					$fot_php	=$_SESSION["foto"];
					$most_php	=$_SESSION["mostrar"];
														

					/* Establezco la conexion con la base de datos */

					include('connect.php');
				
					/* Establezco la orden sql para seleccionar la base de datos */
					
					$sql="SELECT * FROM beer WHERE mostrar='s' AND id_beer > $cod_php";
					
					/* Ejecuto el sql */
							
					$ejecutar=mysqli_query($conexion, $sql);
						
									
					/* Meto los datos en una matriz */
							
					$fila=mysqli_fetch_array($ejecutar);
					
					
			}
			else{
		
				/* Establezco la conexion con la base de datos */

				include('connect.php');
			
				/* Establezco la orden sql para seleccionar la base de datos */
				
				$sql="SELECT * FROM beer WHERE mostrar='s'";
				
				/* Ejecuto el sql */
						
				$ejecutar=mysqli_query($conexion, $sql);
					
				/* Contar cuantos registros hay seleccionados */
						
				$reg_cont=mysqli_num_rows($ejecutar);
						
								
				/* Establezco un contador para que cuando llegue al final, vuelva al primer registro */
				
					$cont_tot=1;
					
				/* Establezco un contador parcial para saber cuando llega al maximo de registros por pagina */
				
					$cont_par=1;
						
						
				/* Meto los datos en una matriz */
						
				$fila=mysqli_fetch_array($ejecutar);
					
			}
				
	
				// Inicio el bucle para recorrer la base de datos

				do{
					// Extraigo cada campo de la matriz y los guardo en variables//
			
					$cod_php	=$fila['id_beer'];
					$nom_php	=$fila['nombre'];
					$pais_php	=$fila['pais'];
					$est_php	=$fila['estilo'];
					$col_php	=$fila['color'];
					$alc_php	=$fila['alcohol'];
					$cant_php	=$fila['cantidad'];
					$prec_php	=$fila['precio'];
					$fot_php	=$fila['foto'];
					$most_php	=$fila['mostrar'];
	
					echo "	
							
										<div id='etiqueta'>
											
											<div id='fila1'>
											
												<div  id='numero'>
													<table align='right' border=0 widtth='100%' height='100%' cellspacing=0 cellpadding=0>
														<tr valign='bottom'>
															<td class='textonumero' align='right'>
																$cod_php
															</td>
														</tr>	
													</table>
												</div>
												
												<div class='textonombre' id='ncerveza'>
													<table align='left' border=0 widtth='100%' height='100%' cellspacing=0 cellpadding=0>
														<tr valign='bottom'>
															<td class='textonombre' align='right'>	
																&nbsp- $nom_php
															</td>
														</tr>	
													</table>
												</div>
											
											</div>
											
											<div id='foto'>
											
												<table align='right' border=0 widtth='100%' height='100%' cellspacing=0>
													<tr valign='center'>
														<td><img class='fotosgarimbas' src='$fot_php'></td>
													</tr>
												</table>
											
											</div>
											
											<div id='fila2'>
											
											<div class='textoncampo' id='tpais'>
												
													$et_1_php:
												
												</div>

												<div class='textocampo' id='pais'>
												
													$pais_php
												
												</div>

											</div>

											<div id='fila3'>
												
												<div class='textoncampo' id='testilo'>
												
													$et_2_php:
												
												</div>
												
												<div class='textocampo' id='estilo'>
												
													$est_php
												
												</div>
											
											</div>
											
											<div id='fila4'>
											
												<div class='textoncampo' id='tcolor'>
												
													$et_3_php:
												
												</div>
												
												<div class='textocampo' id='colorcer'>
												
													$col_php
												
												</div>
											
											</div>
											
											<div class='textoabajo' id='fila5'>
											
												<div id='alcoho'>
												
													$alc_php $et_4_php
												
												</div>
												
												<div class='textoabajo' id='canti'>
												
													$et_5_php:$cant_php cl
												
												</div>
												
												<div id='prec'>
													<table align='right' border=0 widtth='100%' height='100%' cellspacing=0 cellpadding=0>
														<tr valign='middle'>
												
															<td class='textoprecio'>" .number_format($prec_php,2)."€</td>
															
														</tr>
													</table>
												
												</div>
											
											</div>
							
										</div>
									
							";
							
					/* sumo 1 al contador parcial y al total */
				
					$cont_tot=$cont_tot+1;
				
					$cont_par=$cont_par+1;
					
				}
				while($fila=mysqli_fetch_array($ejecutar) AND $cont_par<13);
				
				echo
					"</div>";
				
				/* Si el contador parcial es mayor de 12 lo devuelvo a 1 */
				
				if($cont_par>12){
					
					$cont_par=1;
					
				}
				
				/* Establezco las variables que voy a pasar por $_SESSION */
			
				$_SESSION["contadortotal"]	=$cont_tot;
				$_SESSION["contadorparcial"]=$cont_par;
				
				$_SESSION["codigo"]			=$cod_php;
				$_SESSION["nombre"]			=$nom_php;
				$_SESSION["pais"]			=$pais_php;
				$_SESSION["estilo"]			=$est_php;
				$_SESSION["color"]			=$col_php;
				$_SESSION["alcohol"]		=$alc_php;
				$_SESSION["cantidad"]		=$cant_php;
				$_SESSION["precio"]			=$prec_php;
				$_SESSION["foto"]			=$fot_php;
				$_SESSION["mostrar"]		=$most_php;
				
				/* Pasamos la variable de ejecucion del SQL $ejecutar */
				
				$_SESSION["ejecutar"]		=$ejecutar;
				
				/* Pasamos la variable de la matriz de datos $fila */
				
				$_SESSION["fila"]			=$fila;
				
				/* Pasamos la variable del numero de registros $reg_cont */
				
				$_SESSION["numeroregistros"]=$reg_cont;
				
				/* Si el contador total es mayor que el numero de registros anulo la variable contadortotal
					para que todo vuelva a ejecutarse desde el principio */
				
				if($cont_tot>$reg_cont){
					
					unset($_SESSION["contadortotal"]);
					
				}
				
			?>
		
		</div>
		
		<!-- Recargo la página cada cierto tiempo -->
		
		<script>setTimeout('document.location.reload()',5000);</script>
	
	</body>

</html>