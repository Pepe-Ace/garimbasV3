<?php

/* Establezco los datos de conexion con la bd */
			
			$servidor="localhost";
			$usuario="garimbeiro";
			$pass="9834a";
			$bd="garimbas";
			
			/* Me conecto con la base de datos y establezco la variable $conexion */
			
			$conexion=mysqli_connect($servidor, $usuario, $pass, $bd) or die ("NO ME PUEDO CONECTAR CON LA BASE DE DATOS");

?>