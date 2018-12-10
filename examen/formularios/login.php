<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="es-ES">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FIESTAS - Iniciar Sesión</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">

  </head>

  <body class="text-center" style="background:linear-gradient(#B4D4E5,white)">
  <div class="container-fluid" style="background:linear-gradient(#B4D4E5,white)">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="border:1px solid lightgrey;border-radius: 1em;background: #B4D4E5;color:white">
          <h1>FIESTAS</h1>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <h1>Iniciar sesión</h1>
        </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <form class="form-signin" method="POST" action="login.php">
                <div class="form-group"><label for="inputEmail" class="sr-only">E-mail</label>
                <input type="email" class="form-control" name="usuario" placeholder="E-MAIL" required autofocus></div>
                <div class="form-group"><div class="checkbox mb-3">
                </div>
                <div class="form-group">
                  <input class="btn btn-lg btn-block" style="color:white;background-color: #4267b2" type="submit" value="Iniciar sesión" />
                </div>
                  <a href="altausuarios.php" style="margin-top:2em;text-decoration: none;color:white;">
                    <div class="form-group btn btn-block" style="background-color: red">
                      ¿Eres nuevo?
                    </div>
                  </a>
                  <a href="loginadmin.php" style="margin-top:2em;text-decoration: none;color:white;">
                    <div class="form-group btn btn-block" style="background-color: lightgreen">
                      ¿Eres admin?
                    </div>
                  </a>
              </form>
              <?php
                if(isset($_POST['usuario'])){
                    $usuario=$_POST['usuario'];
                    $c=mysqli_connect("localhost","root","","fiestas");
                    $consultausuarioreal=mysqli_query($c,"SELECT `email` FROM `clientes` WHERE (email LIKE '$usuario')");
                    $consultaguardarid=mysqli_query($c,"SELECT `idcliente` FROM `clientes` WHERE(email LIKE '$usuario')");
                    $registro=mysqli_fetch_row($consultaguardarid);
                    mysqli_close($c);
                      if (mysqli_num_rows($consultausuarioreal)==1 and mysqli_num_rows($consultaguardarid)==1) {
                        $_SESSION['usuarioconectado'] = $_POST['usuario'];
                        $_SESSION['usuarioconectadoid'] = $registro[0];
                        header("Location:../index.php");
                      }
                        else{
                          echo "<p style='color:red'><i>e-mail incorrecto</i></p>";
                        }
                }
              ?>
              <b><p class="mt-5 mb-3" style="color:#4267b2">&copy;<a target="blank" style="color:#4267b2; text-decoration: none" href="http://www.designblue.byethost18.com">Fiestas S.A</a> 2017-2018</p></b>       
            </div>
    </div>
   </div> 
  </body>
</html>