<?php
session_start();
	include ('../codigos/funciones.php'); 
	if (!isset($_SESSION['usuarioconectado'])) {
		header("Location:login.php");
	}
	if (isset($_POST['oculto'])) {
		cerrarsesion();
	}
?>
<html>
<head>
<link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <title>FIESTAS - Pedir cita</title>
</head>
<body>
	<!--Barra de Navegacion -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 d-flex justify-content-center align-items-center" style="background: #154034;color: white">
					<h1><?php echo "Hola, ".$_SESSION['usuarioconectado']; ?></h1>
				</div>
				<div class="col-12 d-flex justify-content-center" style="background: #154034;color: white">
					<form  action="../index.php" method="POST">
						<input type="hidden" name="oculto" />
						<input class="btn" type="submit" value="Cerrar Sesión">
					</form>
				</div>				
				<div class="col-6 d-flex justify-content-center align-items-center" style="background-color: #36a383; border-left: 1em solid yellow;">
					<a style="text-decoration: none;color: yellow" href="pedircita.php">Pedir cita</a>
				</div>
				<div class="col-6 d-flex justify-content-center align-items-center" style="background-color: #36a383; border-left: 1em solid yellow;">
					<a style="text-decoration: none;color: yellow" href="../index.php">Inicio</a>
				</div>		
			</div>
		</div>
		<!-- Fin de Barra de Navegación -->
		<!-- Formulario pedir cita -->
		<div class="container-fluid mt-3">
			<div class="row">
				<div class="col-12">
					<form class="form-login" action="pedircita.php" method="POST">
						<div class="form-group">
                			<input type="date" class="form-control" name="fecha" required autofocus>
                		</div>
                		<div class="form-group">
                			<input type="text" class="form-control" name="especialidad" placeholder="especialidad" required>
                		</div>                    		
                		<div class="form-group d-flex justify-content-center">
                			<input type="submit" class="btn btn-success" value="Consultar Cita">
                		</div>
					</form>
				</div>
			</div>			
		</div>
</body>
</html>
<?php 
	if (isset($_POST['fecha']) and isset($_POST['especialidad'])) {
		$fecha=$_POST['fecha'];
		$especialidad=$_POST['especialidad'];
		$c=mysqli_connect("localhost","root","","fiestas");
			$consulta=mysqli_query($c,"SELECT animadores.precio FROM animadores,fiestas WHERE(animadores.especialidad LIKE '$especialidad' AND fiestas.fecha LIKE '$fecha')");
			$consultax=mysqli_query($c,"SELECT animadores.precio FROM animadores,fiestas WHERE(animadores.especialidad LIKE '$especialidad')");
			$registrodeprecio=mysqli_fetch_row($consultax);
			$preciofinal=$registrodeprecio[0]+200;
			if(mysqli_num_rows($consulta)==0){
				echo "<center style='color:green'>Está disponible la fecha y especialidad.</center>";
				echo "<center style='color:darkgreen'>El precio sería de: $preciofinal.</center>";
				echo "<form action='pedircita.php' method='POST'>
						<div class='form-group'>
                			<input type='date' class='form-control' name='fecha' required autofocus>
                		</div>
                		<div class='form-group'>
                			<input type='text' class='form-control' name='especialidad' placeholder='especialidad' required>
                		</div> 
						<div class='form-group'>
							<input type='hidden' value='1' name='escondido'/>
						<div class='form-group'>
                			<input type='text' class='form-control' name='tipodefiesta' placeholder='tipo' required>
                		</div>
                		<div class='form-group'>
                			<input type='text' class='form-control' name='numasistentes' placeholder='numero de asistentes' required>
                		</div>
                 		<div class='form-group'>
                			<input type='text' class='form-control' name='edadmedia' placeholder='edad media' required>
                		</div>
                		<div class='form-group'>
                			<input type='text' class='form-control' name='duracion' placeholder='duracion' required>
                		</div>
                		<div class='form-group'>
                			<input type='text' class='form-control' name='consideracionesespeciales' placeholder='consideraciones especiales' required>
                		</div>
                		<div class='form-group d-flex justify-content-center'>
                			<input type='submit' class='btn btn-outline-success' value='confirmar'/>		
                		</div>
					  </form>";
			}else{
				echo "Escoja otro día o especialidad de animador, ya que no hay disponibilidad para ese día";
			}
			if(isset($_POST['escondido'])){
				$fecha=$_POST['fecha'];
				$especialidad=$_POST['especialidad'];
				$tipodefiesta=$_POST['tipodefiesta'];
				$numasistentes=$_POST['numasistentes'];
				$edadmedia=$_POST['edadmedia'];
				$consideracionesespeciales=$_POST['consideracionesespeciales'];
				$duracion=$_POST['duracion'];
				$id=$_SESSION['usuarioconectadoid'];
				$ar = fopen("Fiesta-Nº$id.txt","a+") or die("no se ha podido crear");

				fwrite($ar,$fecha);
				fwrite($ar,"\r\n");
				fwrite($ar,$especialidad);
				fwrite($ar,"\r\n");
				fwrite($ar,$tipodefiesta);
				fwrite($ar,"\r\n");
				fwrite($ar,$numasistentes);
				fwrite($ar,"\r\n");
				fwrite($ar,$edadmedia);
				fwrite($ar,"\r\n");
				fwrite($ar,$consideracionesespeciales);
				fwrite($ar,"\r\n");
				fwrite($ar,$duracion);
				fwrite($ar,"\r\n");
				fwrite($ar,$id);
				fwrite($ar,"\r\n");
				echo "Se creo el archivo Fiesta-Nº$id.txt correctamente";

			$insertar=mysqli_query($c, "INSERT fiestas (fecha,especialidad,duracion,tipodefiesta,numero,edadmedia,importe,idcliente,consideracionesespeciales) VALUES ('$fecha','$especialidad','$duracion','$tipodefiesta','$numasistentes','$edadmedia','$preciofinal','$id','$consideracionesespeciales')");
            if (mysqli_errno($c) == 0) {
                echo "<center><h1 class='display-1' style='color:green;'>Fiesta pedida</b></h2></center>";
            } else {
                if (mysqli_errno($c) == 1062) {
                    echo "<h2>No ha podido añadirse la fiesta<br></h2>";
                } else {
                    $numerror = mysqli_errno($c);
                    $descrerror = mysqli_error($c);
                    echo "Se ha producido un error nº $numerror que corresponde a: $descrerror  <br>";
                }
			}
		mysqli_close($c);
	}else{
		
	}
}
?>