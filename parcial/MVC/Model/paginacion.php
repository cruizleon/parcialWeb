<?php

//Oncluyo el archivo paginacion dentro de la capa modelo, debido a que este archivo requiere una sentencia SQL
	require_once("conectar.php");
	$conexion_db=conectar::conexion();
     //número de registros que quiero mostrar por página
     $tamano_paginas=3;
     	if(isset($_GET["pagina"])){
     		if ($_GET["pagina"]==1){	header("Location:index.php");
                    }else{  $pagina=$_GET["pagina"]; //si no es la pagina uno, captura la que le pasen por URL
                           }
     	}else{ $pagina=1;
               }  /*pagina que carga por primera vez al cargar la página web*/
          //almacena desde que registro voy a mostrar los resultados
     	$empezar_desde=($pagina-1) * $tamano_paginas;
     	$SQL_total="SELECT * FROM usuarios_plataforma";
     	$resultado=$conexion_db->prepare($SQL_total);
     	$resultado->execute([array ($SQL_total)]);
          //rowCount cuenta el número de registros
     	$num_filas=$resultado->rowCount();
          //la división me arroja el número de pagina de mi consulta, la función ceil redondear el resultado a un numero entero
     	$total_paginas=ceil($num_filas/$tamano_paginas);
?>
</body>
</html>
