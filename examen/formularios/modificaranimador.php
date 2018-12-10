<?php
session_start();
  if (!isset($_SESSION['adminconectado'])) {
    header("Location:loginadmin.php");
  }
?>
<html>
<head>
<link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <title>FIESTAS - BAJA ANIMADOR</title>
</head>
<body>
  <!--Barra de Navegacion -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center" style="background: #154034;color: yellow">
          <h1>MODIFICAR A UN ANIMADOR</h1>
        </div>            
      </div>
    </div>
    <!-- Fin de Barra de Navegación -->
    <!-- Formulario pedir cita -->
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-12">
          <form class="form-login" action="modificaranimador.php" method="POST">
            <div class="form-group">
              <input type="text" class="form-control" name="id" placeholder="introduce id" required autofocus>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="nombre" placeholder="introduce nombre" required autofocus>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="especialidad" placeholder="introduce nueva especialidad" required autofocus>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="precio" placeholder="introduce nuevo precio" required autofocus>
            </div>
            <div class="form-group d-flex justify-content-center">
             <input type="submit" class="btn btn-success" value="Modificar">
            </div>
          </form>
        </div>
        <div class="col-12 d-flex justify-content-center align-items-center">
          <a href="../indexadmin.php"><button class="btn btn-outline-success">¡Volver al menú!</button></a>
        </div>
      </div>      
    </div>
</body>
</html>
<?php
if (isset($_POST['id']) and isset($_POST['nombre']) and isset($_POST['especialidad']) and isset($_POST['precio'])){
  $c = mysqli_connect("localhost", "root", "", "fiestas");
      $id = $_POST['id'];
      $nombre = $_POST['nombre'];
      $especialidad = $_POST['especialidad'];
      $precio = $_POST['precio'];
          mysqli_query($c, "UPDATE animadores SET nombreanimador='$nombre', especialidad='$especialidad', precio='$precio' WHERE (idanimador = '$id')");
          echo "<center style='color:green;'>DATOS MODIFICADOS</center>";
          echo "<center><a href='modificaranimador.php' style='text-decoration:none;'>Pulsa aquí para modificar más</a></center>";
      mysqli_close($c);
}else{
    $c=mysqli_connect("localhost","root","");
            mysqli_select_db($c, "fiestas");
            $resultado= mysqli_query($c, "SELECT * FROM animadores");
            $num=mysqli_num_rows($resultado);
            if($num==0){
                echo "Actualmente, no hay animadores registrados";
            }else{
                    echo "<table class='table mt-3'>";
                    echo"<th class='text-center' style='color: white;background:lightgreen'>Id Animador</th><th class='text-center' style='color: white;background:lightgreen'>Nombre del Animador</th><th class='text-center' style='color: white;background:lightgreen'>Especialidad</th><th class='text-center' style='color: white;background:lightgreen'>Precio</th>";
                    while ($registro = mysqli_fetch_row($resultado)){
                    echo "<tr>";
                        foreach($registro as $clave){
                            echo "<td class='text-center text-muted' style='border-right:1px dotted lightgrey;'>",$clave,"</td>";
                        }
                    }
                    echo "</table>";
                    }
            }

?>