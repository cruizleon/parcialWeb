<?php


	class Conectar{
		public static function conexion(){

			try{

				$conexion=new PDO('mysql:host=localhost; dbname=ods_db', 'root', '');
				$conexion->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$conexion->exec("SET CHARACTER SET UTF8");
				}catch(Exceptiom $e){
					die("Error:" . $e->getMessage());
					echo "Linea de error: " . $e->getLine();
					}
			return $conexion;
		}
	}




?>
