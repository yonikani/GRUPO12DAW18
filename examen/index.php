<?php
session_start();
	include ('codigos/funciones.php'); 
	if (!isset($_SESSION['usuarioconectado'])) {
		header("Location:formularios/login.php");
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
					<h1><?php echo "Hola, ".$_SESSION['usuarioconectado']; ?></h1>
				</div>
				<div class="col-12 d-flex justify-content-center" style="background: #154034;color: white">
					<form  action="index.php" method="POST">
						<input type="hidden" name="oculto" />
						<input class="btn" type="submit" value="Cerrar Sesión">
					</form>
				</div>				
				<div class="col-12 d-flex justify-content-center align-items-center" style="background-color: #36a383; border-left: 1em solid yellow;">
					<a style="text-decoration: none;color: yellow" href="formularios/pedircita.php">Pedir cita para fiesta</a>
				</div>
				</div>				
			</div>
		</div>
		<!-- Fin de Barra de Navegación -->
</body>
</html>
