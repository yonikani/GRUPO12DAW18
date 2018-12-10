<html>
<head>
<link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <title>FIESTAS - Alta Usuarios</title>
</head>
<body>
  <!--Barra de Navegacion -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center" style="background: #154034;color: yellow">
          <h1>*Registrarse*</h1>
        </div>            
      </div>
    </div>
    <!-- Fin de Barra de Navegación -->
    <!-- Formulario pedir cita -->
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-12">
          <form class="form-login" action="altausuarios.php" method="POST">
            <div class="form-group">
              <input type="text" class="form-control" name="nombre" placeholder="Nombre" required autofocus>
            </div>
            <div class="form-group">
             <input type="text" class="form-control" name="direccion" placeholder="Direccion" required>
            </div>
            <div class="form-group">
             <input type="email" class="form-control" name="email" placeholder="E-mail" required>
            </div>
            <div class="form-group d-flex justify-content-center">
             <input type="submit" class="btn btn-success" value="Registrarse">
            </div>
          </form>
        </div>
        <div class="col-12 d-flex justify-content-center align-items-center">
          <a href="login.php"><button class="btn btn-outline-success">¡Ya estoy registrado!</button></a>
        </div>
      </div>      
    </div>
</body>
</html>
<?php
  include ('../codigos/funciones.php');  
  if (isset($_POST['nombre']) and isset($_POST['direccion']) and isset($_POST['email'])) {
      $nombre=$_POST['nombre'];
      $direccion=$_POST['direccion'];
      $email=$_POST['email'];
        $c=mysqli_connect("localhost","root","","fiestas");
          mysqli_query($c,"INSERT clientes(nombrecliente,direccion,email) VALUES ('$nombre','$direccion','$email')");
            if (mysqli_errno($c) == 0) {
                echo "<center><h3 style='color: green'>Cliente registrado con éxito</b></h3></center>";
            } else {
                if (mysqli_errno($c) == 1062) {
                    echo "<h2 style='color: red'>No has podido registrarte<br></h2>";
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