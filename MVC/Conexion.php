<?php

			try{
				$conexion_db=new PDO('mysql:host=localhost;dbname=pruebas','root','');
			    $conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$conexion_db->exec("SET CHARACTER SET utf8");
				//return $conexion_db;
				}catch(PDOException $e){
					die ('error:'  . $e->getMessage());
					echo "se está presentando un error en la línea:"  . $e->getLine();
					}
			
?>