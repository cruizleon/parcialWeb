<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD - MVC</title>
<!--llama la hoja de estilos-->
<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
<?php  require("model/paginacion.php");
?>
<Form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

  <table width="50%" border="0" align="center">
    <tr > <!--TR crea las filas en la tabla-->
      <td class="primera_fila">Id</td> <!--TD maneja las columnas de la tabla-->
      <td class="primera_fila">Nombre</td>
      <td class="primera_fila">Apellido</td>
      <td class="primera_fila">Dirección</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
    </tr>

		<!-- filas que requiero repetir n veces, conforme el número de registros de la BD-->
   	<?php
    foreach($matrizUsuarios as $usuario):?>
    <tr>

      <td><?php echo $usuario["Id"]?></td>
      <td><?php echo $usuario["Nombre"]?></td>
      <td><?php echo $usuario["Apellido"]?></td>
      <td><?php echo $usuario["Direccon"]?></td>

      <!--Con el boton borrar,  llamar el archivo Borrar_Registro y le paso el Id a eliminar
      despues de llamar la pagina Borrar_Registro.php, agrego un ? y el nombre del parametro
      ademas de eso no puedo decirle que el ?Id=3, porque siempre me estaría refiriendo al registro 3
      lo que debo hacer es insertar un código PHP, para pasarle ese parametro dinamicamente, es decir el Id
      del objeto que el bucle foreach este evaluando en el momento, del botón que se haya oprimido-->
      <td class="bot"><a href="Borrar_Registro.php?Id=<?php echo $usuario["Id"]?>">
                      <input type='button' name='del' id='del' value='Borrar'></a></td>


 <!--Con el boton borrar,  llamar el archivo Borrar_Registro y le paso el Id a eliminar
      despues de llamar la pagina Borrar_Registro.php, agrego un ? y el nombre del parametro-->

      <td class='bot'><a href="Update_Registro.php?Id=<?php echo $usuario["Id"]?> & nom=<?php echo $usuario["Nombre"]?>
                       & apell=<?php echo $usuario["Apellido"]?> & dir=<?php echo $usuario["Direccon"]?>">
                      <input type='button' name='up' id='up' value='Actualizar'></a></td>
    </tr>  <!-- finaliza la primera fila-->
	  <?php
    endforeach;
    ?>

  <tr>
	<td></td>
      <td><input type='text' name='nom' size='10' class='centrado'></td>
      <td><input type='text' name='apell' size='10' class='centrado'></td>
      <td><input type='text' name='dir' size='10' class='centrado'></td>
      <!--este bóton insertar es de tipo submit, para que envié la info a la BD-->
      <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr>
     <tr><td>
     <?php
//___________________________BLOQUE CODIGO PAGINACION__________________________

  for($i=1; $i<=$total_paginas; $i++){

            echo "<a href='?pagina=" . $i . "'>" . $i . "</a>  ";
      }


//___________________-----FINALIZA BLOQUE PAGINACION_____________________________________
      ?>
  </td></tr>
  </table>
</Form>
<p>&nbsp;</p>
</body>
</html>
