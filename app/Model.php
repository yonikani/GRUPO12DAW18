<?php

 class Model
 {
     protected $conexion;

     public function __construct($dbname,$dbuser,$dbpass,$dbhost)
     {
       $mvc_bd_conexion = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

       if (!$mvc_bd_conexion) {
           die('No ha sido posible realizar la conexión con la base de datos: ' . mysql_error());
       }
       mysqli_select_db($mvc_bd_conexion,$dbname);

       mysqli_set_charset($mvc_bd_conexion,'utf8');

       $this->conexion = $mvc_bd_conexion;
     }



     public function bd_conexion()
     {

     }

     public function dameAlimentos()
     {
         $sql = "select * from alimentos order by energia desc";

         $result = mysqli_query($this->conexion,$sql);

         $alimentos = array();
         while ($row = mysqli_fetch_assoc($result))
         {
             $alimentos[] = $row;
         }

         return $alimentos;
     }

     public function buscarAlimentosPorNombre($nombre)
     {
         $nombre = htmlspecialchars($nombre);

         $sql = "select * from alimentos where nombre like '" . $nombre . "' order by energia desc";

         $result = mysqli_query($this->conexion,$sql);

         $alimentos = array();
         while ($row = mysqli_fetch_assoc($result))
         {
             $alimentos[] = $row;
         }

         return $alimentos;
     }

		public function buscarAlimentosPorEnergia($energia)
     {
         $energia = htmlspecialchars($energia);

         $sql = "select * from alimentos where energia=". $energia . " order by energia desc";

         $result = mysqli_query($this->conexion,$sql);

         $alimentos = array();
         while ($row = mysqli_fetch_assoc($result))
         {
             $alimentos[] = $row;
         }

         return $alimentos;
     }
		public function buscarAlimentosCombinada($energia,$nombre)
     {
         $energia = htmlspecialchars($energia);
				 $nombre = htmlspecialchars($nombre);
         $sql = "select * from alimentos where energia=". $energia . " and nombre like '" . $nombre . "' order by nombre desc";

         $result = mysqli_query($this->conexion,$sql);

         $alimentos = array();
         while ($row = mysqli_fetch_assoc($result))
         {
             $alimentos[] = $row;
         }

         return $alimentos;
     }

     public function dameAlimento($id)
     {
         $id = htmlspecialchars($id);

         $sql = "select * from alimentos where id=".$id;

         $result = mysqli_query($this->conexion,$sql);

         $alimentos = array();
         $row = mysqli_fetch_assoc($result);

         return $row;

     }

     public function insertarAlimento($n, $e, $p, $hc, $f, $g)
     {
         $n = htmlspecialchars($n);
         $e = htmlspecialchars($e);
         $p = htmlspecialchars($p);
         $hc = htmlspecialchars($hc);
         $f = htmlspecialchars($f);
         $g = htmlspecialchars($g);

         $sql = "insert into alimentos (nombre, energia, proteina, hidratocarbono, fibra, grasatotal) values ('$n','$e','$p','$hc','$f','$g')";

         $result = mysqli_query($this->conexion,$sql);

         return $result;
     }

     public function validarDatos($n, $e, $p, $hc, $f, $g)
     {
         return (is_string($n) &
                 is_numeric($e) &
                 is_numeric($p) &
                 is_numeric($hc) &
                 is_numeric($f) &
                 is_numeric($g));
     }

 }
?>
