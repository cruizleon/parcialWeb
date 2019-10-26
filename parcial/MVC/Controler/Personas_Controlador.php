<?php
	//llama al modelo
	require_once("Model/Personas_Model.php");

		$usuario=new Personas_Model();
		$matrizUsuarios=$usuario->get_Usuarios();

//realiza llamado a la vista
require_once("View/Personas_View.php");
?>
