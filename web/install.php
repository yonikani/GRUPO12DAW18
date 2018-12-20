<?php
  include("../app/datosBD/Config.php");

  //Nos conectamos a la base de datos
  $conexion = mysqli_connect($servidor, $usuario, $psw, $bd) or die ("<p>No se ha podido establecer la conexion con la base de datos</p>");

	   if($conexion -> query("USE g12alimentos")===TRUE){
		     printf("Estas usando la base de datos g12alimentos <br>");
	   }
	   include("../app/datosBD/secuencia.sql.php");
	   if ($conexion -> multi_query($sentenciaMysql)===TRUE) {
		     printf("Se han creado las tablas de la base de datos<br>");
	   }
?>
