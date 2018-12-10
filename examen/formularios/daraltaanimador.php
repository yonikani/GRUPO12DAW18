<?php
session_start();
  if (!isset($_SESSION['adminconectado'])) {
    header("Location:loginadmin.php");
  }
?>
<html>
<head>
<link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <title>FIESTAS - Alta animadores</title>
</head>
<body>
  <!--Barra de Navegacion -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center" style="background: #154034;color: yellow">
          <h1>*Registrar animador*</h1>
        </div>
        <div class="col-12 d-flex justify-content-center align-items-center" style="background: #154034;color: white">
          <h1><?php echo "Hola, ".$_SESSION['adminconectado']; ?></h1>
        </div>
        <div class="col-12 d-flex justify-content-center" style="background: #154034;color: white">
          <form  action="../indexadmin.php" method="POST">
            <input type="hidden" name="oculto" />
            <input class="btn" type="submit" value="Cerrar Sesión">
          </form>
        </div>              
      </div>
    </div>
    <!-- Fin de Barra de Navegación -->
    <!-- Formulario pedir cita -->
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-12">
          <form class="form-login" action="daraltaanimador.php" method="POST">
            <div class="form-group">
              <input type="text" class="form-control" name="nombre" placeholder="Nombre" required autofocus>
            </div>
            <div class="form-group">
             <input type="text" class="form-control" name="especialidad" placeholder="Especialidad" required>
            </div>
            <div class="form-group">
             <input type="text" class="form-control" name="precio" placeholder="Precio" required>
            </div>
            <div class="form-group d-flex justify-content-center">
             <input type="submit" class="btn btn-success" value="Registrarse">
            </div>
          </form>
        </div>
        <div class="col-12 d-flex justify-content-center align-items-center">
          <a href="../indexadmin.php"><button class="btn btn-outline-success">Volver al menú</button></a>
        </div>
      </div>      
    </div>
</body>
</html>
<?php
  include ('../codigos/funciones.php');  
  if (isset($_POST['nombre']) and isset($_POST['especialidad']) and isset($_POST['precio'])) {
      $nombre=$_POST['nombre'];
      $especialidad=$_POST['especialidad'];
      $precio=$_POST['precio'];
        $c=mysqli_connect("localhost","root","","fiestas");
          mysqli_query($c,"INSERT animadores(nombreanimador,especialidad,precio) VALUES ('$nombre','$especialidad','$precio')");
            if (mysqli_errno($c) == 0) {
                echo "<center><h3 style='color: green'>Animador registrado con éxito</b></h3></center>";
            } else {
                if (mysqli_errno($c) == 1062) {
                    echo "<h2 style='color: red'>No has podido registrar el animador<br></h2>";
                } else {
                    $numerror = mysqli_errno($c);
                    $descrerror = mysqli_error($c);
                    echo "Se ha producido un error nº $numerror que corresponde a: $descrerror  <br>";
                }
            }          
        mysqli_close($c);
      }else{

  }
?>