<?php
session_start();
  if (!isset($_SESSION['adminconectado'])) {
    header("Location:loginadmin.php");
  }
?>
<html>
<head>
<link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <title>FIESTAS - DATOS ANIMADORES</title>
</head>
<body>
  <!--Barra de Navegacion -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center" style="background: #154034;color: yellow">
          <h1>ANIMADORES</h1>
        </div>
        <div class="col-12 d-flex justify-content-center align-items-center" style="background: #154034;color: yellow">
          <a href="../indexadmin.php" style="text-decoration: none;color:white"><p>Volver al menú</p></a>
        </div>             
      </div>
    </div>
    <!-- Fin de Barra de Navegación -->
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-12">
          <div class="container-fluid mt-3">
            <div class="row">
              <div class="col-12">
                <form class="form-login" action="consultatodaslasfiestasconfiltro.php" method="POST">
                  <div class="form-group">
                   <select class="form-control" name="option">
                    <option value="1" name="option">Ya realizadas</option>
                    <option value="2" name="option">No realizadas</option>
                  </select>
                  </div>
                  <div class="form-group d-flex justify-content-center">
                   <input type="submit" class="btn btn-success" value="Mostrar">
                  </div>
                </form>
              </div>
              <div class="col-12 d-flex justify-content-center align-items-center">
                <a href="../indexadmin.php"><button class="btn btn-outline-success">¡Volver al menú!</button></a>
              </div>
            </div>      
          </div>
          
        </div>
      </div>      
    </div>
</body>
</html>
<?php
  $fechahoy=date("Y-m-d");
    if (isset($_POST['option'])) {
      $option=$_POST['option'];
      switch ($option) {
        case 1:
          $c=mysqli_connect("localhost","root","");
            mysqli_select_db($c, "fiestas");
            $resultado= mysqli_query($c, "SELECT * FROM fiestas WHERE(fecha<'$fechahoy')");
            $num=mysqli_num_rows($resultado);
            if($num==0){
                echo "Actualmente, no hay fiestas registradas";
            }else{
                    echo "<table class='table mt-3'>";
                    echo"<th class='text-center' style='color: white;background:lightgreen'>Id Fiesta</th><th class='text-center' style='color: white;background:lightgreen'>Fecha</th><th class='text-center' style='color: white;background:lightgreen'>Especialidad</th><th class='text-center' style='color: white;background:lightgreen'>Duracion</th><th class='text-center' style='color: white;background:lightgreen'>Tipo de Fiesta</th><th class='text-center' style='color: white;background:lightgreen'>Número de asistentes</th><th class='text-center' style='color: white;background:lightgreen'>Edad Media</th><th class='text-center' style='color: white;background:lightgreen'>Importe en €</th><th class='text-center' style='color: white;background:lightgreen'>Id Cliente</th><th class='text-center' style='color: white;background:lightgreen'>Consideraciones especiales</th>";
                    while ($registro = mysqli_fetch_row($resultado)){
                    echo "<tr>";
                        foreach($registro as $clave){
                            echo "<td class='text-center text-muted' style='border-right:1px dotted lightgrey;'>",$clave,"</td>";
                        }
                    }
                    echo "</table>";
                    }
          break;
        
        case 2:
          $c=mysqli_connect("localhost","root","");
            mysqli_select_db($c, "fiestas");
            $resultado= mysqli_query($c, "SELECT * FROM fiestas WHERE(fecha>'$fechahoy')");
            $num=mysqli_num_rows($resultado);
            if($num==0){
                echo "Actualmente, no hay fiestas registradas";
            }else{
                    echo "<table class='table mt-3'>";
                    echo"<th class='text-center' style='color: white;background:lightgreen'>Id Fiesta</th><th class='text-center' style='color: white;background:lightgreen'>Fecha</th><th class='text-center' style='color: white;background:lightgreen'>Especialidad</th><th class='text-center' style='color: white;background:lightgreen'>Duracion</th><th class='text-center' style='color: white;background:lightgreen'>Tipo de Fiesta</th><th class='text-center' style='color: white;background:lightgreen'>Número de asistentes</th><th class='text-center' style='color: white;background:lightgreen'>Edad Media</th><th class='text-center' style='color: white;background:lightgreen'>Importe en €</th><th class='text-center' style='color: white;background:lightgreen'>Id Cliente</th><th class='text-center' style='color: white;background:lightgreen'>Consideraciones especiales</th>";
                    while ($registro = mysqli_fetch_row($resultado)){
                    echo "<tr>";
                        foreach($registro as $clave){
                            echo "<td class='text-center text-muted' style='border-right:1px dotted lightgrey;'>",$clave,"</td>";
                        }
                    }
                    echo "</table>";
                    }
          break;
      }
    }
?>