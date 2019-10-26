<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body>

<h1>ACTUALIZAR</h1>

<!--Recupero los valores que esta pasando el formulario-->
<?php
include ("Conexion.php");
/*Cuando la página se carga pro primera vez la información se recupera con GET, pero una vez esta
cargada y se pulsa el botón de actualizar, esta información no debe leerse, por que la información 
se pasa por post, para evitar que al presionar actualizar los datos se vuelvan a leer lo metemos en un if*/

if(!isset($_POST["bot_actualizar"])){ //si no ha pulsado el boton actualizar, ejecutar instrucciones del if
    
   
    $Id=$_GET["Id"];
    $nom=$_GET["nom"];
    $apell=$_GET["apell"];
    $dir=$_GET["dir"];
    }else{//en caso que si haya pulsado el botón actualizar
    //El Id no lo muestra pero lo requiero como criterio en la sentencia SQL
    
    echo "entre al else";  
    $Id=$_POST["Id"];
    $nom=$_POST["nom"];
    $apell=$_POST["apell"];
    $dir=$_POST["dir"];
   

    //Sentencia SQL usando marcadores
    $SQL="UPDATE DATOS_USUARIOS SET Nombre=:fname, Apellido=:lname, Direccon=:midir WHERE Id=:miId";
    //Creo la consulta preparada para evitar la inyección SQL
    $resultado=$conexion_db->prepare($SQL);//crea consulta preparada
    //ejecutamos el array, asignando los parametros a cada variable
    $resultado->execute(array(":miId"=>$Id,":fname"=>$nom,":lname"=>$apell,":midir"=>$dir));
    //una vez asignados los valores, para verificar que se han actualizado los valores, regreso al index para confirmar
    header("Location:index.php");
  }
?>
<p>
</p>
<p>&nbsp;</p>
 <!--El action me permite que la información sea enviada a la misma página update con el método post--> 
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <table width="25%" border="0" align="center">
    <tr>
      <td></td>
      <td><label for="id"></label>
       <!--Este type=hidden, significa que el valor existe, pero el ususario no li puede ver ni lo puede editar--> 
      <input type="hidden" name="Id" id="id" value="<?php echo $Id ?>"></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" value="<?php echo $nom ?>"</td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><label for="ape"></label>
      <input type="text" name="apell" id="apell" value="<?php echo $apell ?>"</td>
    </tr>
    <tr>
      <td>Dirección</td>
      <td><label for="dir"></label>
      <input type="text" name="dir" id="dir" value="<?php echo $dir ?>"</td>
    </tr>
    <tr>
       <!--Este botón cuando se pulsa, los datos son enviados a la misma página para actulizar el registro--> 
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>