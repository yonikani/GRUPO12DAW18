<?php
session_start();
	include ('codigos/funciones.php'); 
	if (!isset($_SESSION['adminconectado'])) {
		header("Location:formularios/loginadmin.php");
	}
	if (isset($_POST['oculto'])) {
		cerrarsesion();
	}
?>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
    <title>FIESTAS - Inicio</title>
</head>
<body>
	<!--Barra de Navegacion -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 d-flex justify-content-center align-items-center" style="background: #154034;color: white">
					<h1><?php echo "Hola, ".$_SESSION['adminconectado']; ?></h1>
				</div>
				<div class="col-12 d-flex justify-content-center" style="background: #154034;color: white">
					<form  action="index.php" method="POST">
						<input type="hidden" name="oculto" />
						<input class="btn" type="submit" value="Cerrar Sesión">
					</form>
				</div>				
				<div class="col-6 d-flex justify-content-center align-items-center" style="background-color: #36a383; border-left: 1em solid yellow;">
					<a style="text-decoration: none;color: yellow" href="formularios/daraltaanimador.php">Dar de alta a un animador</a>
				</div>
				<div class="col-6 d-flex justify-content-center align-items-center" style="background-color: #36a383; border-left: 1em solid yellow;">
					<a style="text-decoration: none;color: yellow" href="formularios/darbajaanimador.php">Dar de baja a un animador</a>
				</div>
				<div class="col-6 d-flex justify-content-center align-items-center" style="background-color: #36a383; border-left: 1em solid yellow;">
					<a style="text-decoration: none;color: white" href="formularios/modificaranimador.php">Modificar a un animador</a>
				</div>
				<div class="col-6 d-flex justify-content-center align-items-center" style="background-color: #36a383; border-left: 1em solid yellow;">
					<a style="text-decoration: none;color: white" href="formularios/consultatodoanimador.php">Consultar todas las características de los animadores</a>
				</div>
				<div class="col-6 d-flex justify-content-center align-items-center" style="background-color: #36a383; border-left: 1em solid yellow;">
					<a style="text-decoration: none;color: yellow" href="formularios/consultatodaslasfiestasconfiltro.php">Consultar todas las fiestas con filtros</a>
				</div>
				<div class="col-6 d-flex justify-content-center align-items-center" style="background-color: #36a383; border-left: 1em solid yellow;">
					<a style="text-decoration: none;color: yellow" href="formularios/consultatodaslasfiestasdeundeterminadocliente.php">Consultar fiestas por cliente</a>
				</div>						
				</div>				
			</div>
		</div>
		<!-- Fin de Barra de Navegación -->
</body>
</html>
