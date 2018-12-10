<center><h1>ADMINISTRACION</h1></center>
<center><form action="crearbdytablas.php" method="POST">
            <input type="radio" name="option" value="1"/>Crear BD y tablas.
            <input type="radio" name="option" value="2"/>Borrar BD y tablas.
            </br><input type="submit"/>
        </form></center>
            <center><?php
if (isset($_POST['option'])) {
    $option = $_POST['option'];
    switch ($option) {
        case 1:
            //Crea bd
            if ($c = mysqli_connect("localhost", "root", "")) {
                mysqli_query($c, "CREATE DATABASE fiestas");
                echo "Base de datos fiestas creada satisfactoriamente.";
                } else {
                echo "<h2> No ha sido posible crear la base de datos</h2><br>";
                } if ($c = mysqli_close($c)) {
                    echo "<h2 style='color:green;'>Conexion cerrada correctamente</ h2>";
                    } else {
                        echo "<h2> No se ha cerrado la conexion.</h2>";
                        }
            //Tabla animadores
            $c = mysqli_connect("localhost","root","","fiestas");
            $crear = "CREATE TABLE animadores(";
            $crear .= "idanimador INT(4) AUTO_INCREMENT UNIQUE, ";
            $crear .= "nombreanimador VARCHAR(100) NOT NULL, ";
            $crear .= "especialidad VARCHAR(100), ";
            $crear .= "PRIMARY KEY(especialidad),";
            $crear .= "precio INT(4) NOT NULL ";
            $crear .= ")";
            if (mysqli_query($c, $crear)) {
                echo "<h2 style='color:green;'> Tabla animadores creada con EXITO </h2><br>";
            } else {
                echo "<h2> La tabla animadores NO HA PODIDO CREARSE ";
                $numerror = mysqli_errno($c);
                if ($numerror == 1050) {
                    echo "porque YA EXISTE</h2>";
                }
            }
            //Tabla clientes
            $c = mysqli_connect("localhost", "root", "","fiestas");
            $crear = "CREATE TABLE clientes(";
            $crear .= "idcliente INT(4) AUTO_INCREMENT PRIMARY KEY, ";
            $crear .= "nombrecliente VARCHAR(100) NOT NULL, ";
            $crear .= "direccion VARCHAR(100) NOT NULL,";
            $crear .= "email VARCHAR(100) UNIQUE NOT NULL";
            $crear .= ")";

            if (mysqli_query($c, $crear)) {
                echo "<h2 style='color:green;'> Tabla clientes creada con EXITO </h2><br>";
            } else {
                echo "<h2> La tabla clientes NO HA PODIDO CREARSE ";
                $numerror = mysqli_errno($c);
                if ($numerror == 1050) {
                    echo "porque YA EXISTE</h2>";
                }
            }
            $insertar=mysqli_query($c, "INSERT clientes (nombrecliente,direccion,email) VALUES ('administrador','la web','admin@admin.com')");
            if (mysqli_errno($c) == 0) {
                echo "<center><h1 class='display-1' style='color:green;'>admin registrado</b></h2></center>";
            } else {
                if (mysqli_errno($c) == 1062) {
                    echo "<h2>No ha podido añadirse el administrador<br></h2>";
                } else {
                    $numerror = mysqli_errno($c);
                    $descrerror = mysqli_error($c);
                    echo "Se ha producido un error nº $numerror que corresponde a: $descrerror  <br>";
                }
            }
            //Tabla fiestas
            $c = mysqli_connect("localhost","root","","fiestas");
            $crear = "CREATE TABLE fiestas(";
            $crear .= "idfiesta INT(4) AUTO_INCREMENT UNIQUE,";
            $crear .= "fecha DATE,";
            $crear .= "especialidad VARCHAR(100) NOT NULL,";
            $crear .= "duracion INT(4) DEFAULT 0 NOT NULL,";
            $crear .= "tipodefiesta VARCHAR(100) NOT NULL,";
            $crear .= "numero INT(4) NOT NULL,";
            $crear .= "edadmedia INT(4) NOT NULL,";
            $crear .= "importe INT(4) NOT NULL,";
            $crear .= "idcliente INT(4),";
            $crear .= "consideracionesespeciales VARCHAR(145) DEFAULT 'Sin especificar', ";
            $crear .= "PRIMARY KEY(fecha,especialidad),";
            $crear .= "FOREIGN KEY(idcliente) REFERENCES clientes(idcliente),";
            $crear .= "FOREIGN KEY(especialidad) REFERENCES animadores(especialidad)";
            $crear .= ")";
            if (mysqli_query($c, $crear)) {
                echo "<h2 style='color:green;'> Tabla fiestas creada con EXITO </h2><br>";
            } else {
                echo "<h2 style='color:red'> La tabla fiestas NO HA PODIDO CREARSE ";
                $numerror = mysqli_errno($c);
                if ($numerror == 1050) {
                    echo "porque YA EXISTE</h2>";
                }
            }
            mysqli_close($c);
            break;
        case 2:
            if ($c = mysqli_connect("localhost", "root", "")) {
                mysqli_query($c, "DROP DATABASE fiestas");
                    echo "Base de datos fiestas borrada correctamente.";
                } else {
                echo "No se ha podido conectar con PHP MyAdmin";
                }
            break;
                }
} else {
    echo "Esperando respuesta...";
}
?></center>