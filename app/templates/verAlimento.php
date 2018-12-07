 <?php ob_start() ?>

 <h1><?php echo $params['nombre'] ?> | <a href="http://es.wikipedia.org/wiki/<?php echo $alimento['nombre']?>" target="_blank"> + info </a> </h1>
 <table border="1">

     <tr>
         <td>Energía</td>
         <td><?php echo $alimento['energia'] ?></td>
				 <td> Kcal </td>

     </tr>
     <tr>
         <td>Proteina</td>
         <td><?php echo $alimento['proteina']?></td>
				 <td> g </td>
     </tr>
     <tr>
         <td>Hidratos de Carbono</td>
         <td><?php echo $alimento['hidratocarbono']?></td>
 				 <td> g </td>
     </tr>
     <tr>
         <td>Fibra</td>
         <td><?php echo $alimento['fibra']?></td>
				 <td> g </td>
     </tr>
     <tr>
         <td>Grasa total</td>
         <td><?php echo $alimento['grasatotal']?></td>
				 <td> g </td>
     </tr>

 </table>
</br>
* Los valores se refieren a 100 g del alimento 


 <?php $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>

