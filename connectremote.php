<?php

/* Establezco los datos de conexion con la bd */
			
			$servidor="localhost";
			$usuario="id11850425_garimbeiro";
			$pass="9834a";
			$bd="id11850425_garimbas";
			
			/* Me conecto con la base de datos y establezco la variable $conexion */
			
			$conexion=mysqli_connect($servidor, $usuario, $pass, $bd) or die ("NO ME PUEDO CONECTAR CON LA BASE DE DATOS");

?>