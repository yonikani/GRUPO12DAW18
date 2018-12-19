 <?php ob_start() ?>

 <?php if(isset($params['mensaje'])) :?>
 <b><span style="color: red;"><?php echo $params['mensaje'] ?></span></b>
 <?php endif; ?>
 <br/>
 <form name="formInsertar" action="index.php?ctl=insertar" method="POST">
     <table>
         <tr>
             <td>Nombre</td> <td><input type="text" name="nombre" value="<?php echo $params['nombre'] ?>" /></td> </tr>
					<tr>
             <td>Energía (Kcal)</td><td><input type="text" name="nombre" value="<?php echo $params['energia'] ?>" /></td> </tr>
					<tr>
             <td>Proteina (g)</td><td><input type="text" name="energia" value="<?php echo $params['proteina'] ?>" /></td></tr>
					<tr>            
						 <td>H. de carbono (g)</td><td><input type="text" name="proteina" value="<?php echo $params['hc'] ?>" /></td> </tr>
					<tr>
             <td>Fibra (g)</td><td><input type="text" name="hc" value="<?php echo $params['fibra'] ?>" /></td> </tr>
					<tr>
             <td>Grasa total (g)</td><td><input type="text" name="fibra" value="<?php echo $params['grasa'] ?>" /></td>
         </tr>
       

     </table>
     <input type="submit" value="insertar" name="insertar" />
 </form>
 * Los valores deben referirse a 100 g del alimento

 <?php $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>
