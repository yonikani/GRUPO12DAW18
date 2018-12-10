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
</body>
</html>
<?php
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

?>