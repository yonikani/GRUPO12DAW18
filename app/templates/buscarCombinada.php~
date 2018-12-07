 <?php ob_start() ?>

      <form name="formBusqueda" action="index.php?ctl=buscarE" method="POST">

          <table>
              <tr>
                  <td>energía del alimento:</td>
                  <td><input type="text" name="energia" value="<?php echo $params['energia']?>">(introducir únicamente números positivos)</td>

                  <td><input type="submit" value="buscar"></td>
              </tr>
          </table>

          </table>

      </form>

      <?php if (count($params['resultado'])>0): ?>
      <table>
         <tr>
             <th>alimento (por 100g)</th>
             <th>energía (Kcal)</th>
             <th>grasa (g)</th>
         </tr>
         <?php foreach ($params['resultado'] as $alimento) : ?>
             <tr>
                 <td><a href="index.php?ctl=ver&id=<?php echo $alimento['id'] ?>">
                         <?php echo $alimento['nombre'] ?></a></td>
                 <td><?php echo $alimento['energia'] ?></td>
                 <td><?php echo $alimento['grasatotal'] ?></td>
             </tr>
         <?php endforeach; ?>

     </table>
			 
			<?php else:?>
 				<b><span style="color: red;"><?php echo $params['mensaje'] ?></span></b>
 			
      <?php endif; ?>
			

      <?php $contenido = ob_get_clean() ?>

      <?php include 'layout.php' ?>
