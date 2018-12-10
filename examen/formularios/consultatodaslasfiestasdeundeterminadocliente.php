<?php
session_start();
  if (!isset($_SESSION['adminconectado'])) {
    header("Location:loginadmin.php");
  }
?>
<html>
<head>
<link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <title>FIESTAS - FIESTAS POR CLIENTES</title>
</head>
<body>
  <!--Barra de Navegacion -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center" style="background: #154034;color: yellow">
          <h1>FIESTAS POR CLIENTES</h1>
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
                <form class="form-login" action="consultatodaslasfiestasdeundeterminadocliente.php" method="POST">
                  <div class="form-group">
                    <input type="text" class="form-control" name="id" placeholder="Id Cliente" required autofocus/>
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
    if (isset($_POST['id'])) {
      $id=$_POST['id'];
          $c=mysqli_connect("localhost","root","");
            mysqli_select_db($c, "fiestas");
            $resultado= mysqli_query($c, "SELECT clientes.nombrecliente,clientes.email,clientes.direccion,fiestas.idfiesta,fiestas.fecha,fiestas.duracion,fiestas.tipodefiesta,fiestas.numero,fiestas.edadmedia,animadores.especialidad,animadores.nombreanimador FROM clientes,fiestas,animadores WHERE(clientes.idcliente = '$id' and clientes.idcliente=fiestas.idcliente and fiestas.especialidad=animadores.especialidad) GROUP BY fiestas.idfiesta");
            $num=mysqli_num_rows($resultado);
            if($num==0){
                echo "<center style='color:red'>Actualmente, no hay fiestas registradas para ese cliente</center>";
                echo "<center style='color:red'><a style='text-decoration:none;' href='consultatodaslasfiestasdeundeterminadocliente.php'>Pulsa aquí para mostrar la lista de clientes de nuevo</a></center>";
            }else{
                    echo "<table class='table mt-3'>";
                    echo"<th class='text-center' style='color: white;background:lightgreen'>Nombre</th><th class='text-center' style='color: white;background:lightgreen'>E-Mail</th><th class='text-center' style='color: white;background:lightgreen'>Dirección</th><th class='text-center' style='color: white;background:lightgreen'>Id Fiesta</th><th class='text-center' style='color: white;background:lightgreen'>fecha</th><th class='text-center' style='color: white;background:lightgreen'>duracion</th><th class='text-center' style='color: white;background:lightgreen'>Tipo de fiesta</th><th class='text-center' style='color: white;background:lightgreen'>Numero de asistentes</th><th class='text-center' style='color: white;background:lightgreen'>Edad Media asistentes</th><th class='text-center' style='color: white;background:lightgreen'>Especialidad del Animador</th><th class='text-center' style='color: white;background:lightgreen'>Nombre del Animador</th>";
                    while ($registro = mysqli_fetch_row($resultado)){
                    echo "<tr>";
                        foreach($registro as $clave){
                            echo "<td class='text-center text-muted' style='border-right:1px dotted lightgrey;'>",$clave,"</td>";
                        }
                    }
                    echo "</table>";
                    echo "<br><center style='color:red'><a style='text-decoration:none;' href='consultatodaslasfiestasdeundeterminadocliente.php'>Pulsa aquí para mostrar la lista de clientes de nuevo</a></center>";
                    }
         }else{
           $c=mysqli_connect("localhost","root","");
            mysqli_select_db($c, "fiestas");
            $resultado= mysqli_query($c, "SELECT * FROM clientes WHERE(idcliente!=1)");
            $num=mysqli_num_rows($resultado);
            if($num==0){
                echo "Actualmente, no hay animadores registrados";
            }else{
                    echo "<center style='color:lightgreen'><h2>Lista de Clientes</h2><center>";
                    echo "<center style='color:darkgreen'><h5>Introduzca un id para ver las fiestas de ese cliente</h5><center>";
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