<?php ob_start() ?>

 <table>
     <tr>
         <th>nombre de alimento (por 100g)</th>
         <th>Enlace externo a wiki</th>
  
     </tr>
     <?php foreach ($params['alimentos'] as $alimento) :?>
     <tr>
         <td><a href="index.php?ctl=ver&id=<?php echo $alimento['id']?>">
                 <?php echo $alimento['nombre'] ?></a></td>
				 <td><a href="http://es.wikipedia.org/wiki/<?php echo $alimento['nombre']?>" target="_blank"> + info </a></td>
     </tr>
     <?php endforeach; ?>

 </table>


 <?php $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>
