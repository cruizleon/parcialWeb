<?php

include ("conexion.php");

$Id=$_GET["Id"];
//construyo la sentencia SQL, para borrar el argumento que recibo por la URL desde el formulario
$conexion_db->query("DELETE FROM DATOS_USUARIOS WHERE ID='$Id'");
//redirijo al Index para que no se quede en una página en blanco
header("Location:index.php");
?>