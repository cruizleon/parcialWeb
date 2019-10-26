
<?php
	class Personas_Model{

		private $conexion_db;
		private $usuarios;
		public function __construct(){
			//requiere once impide la carga de un mismo archivo más de una vez. Si incluimos el mismo código más de una vez corremos el riesgo de redeclaraciones de variables, funciones o clases
			require_once("Model/conectar.php");
			$this->conexion_db=conectar::conexion();
			$this->usuarios=array();
		}
		public function get_Usuarios(){
			require ("paginacion.php");
			//establecemos el limite del número de registro a mostrar segun la paginación

		//	$SQL=$this->conexion_db->query("SELECT * FROM DATOS_USUARIOS");

			//EL PARAMETRO LIMIT MANEJA DOS PARAMETROS, CUAL ES EL PRIMER REGISTRO Y CUAL ES EL ULTIMO A MOSTRAR

			$SQL=$this->conexion_db->query("SELECT * FROM usuarios_plataforma LIMIT $empezar_desde, $tamano_paginas");
			while($fila=$SQL->fetch(PDO::FETCH_ASSOC)){
				$this->usuarios[]=$fila;
			}
			return $this->usuarios;
		}
	}

?>
