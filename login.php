<?php session_start(); //ya que vamos a trabajar con sesiones

require 'admin/config.php'; // se utiliza la variable RUTA y los datos de acceso de administración
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
	//se recogen los datos enviados por formulario con limpiarDatos definido en funciones.php quitara código malicioso
	$usuario = limpiarDatos($_POST['usuario']);
	$password = limpiarDatos($_POST['password']); 

	//el array blog_admin esta definido en config.php
	if ($usuario == $blog_admin['usuario'] && $password == $blog_admin['password']) {
		$_SESSION['admin'] = $blog_admin['usuario'];
		header('Location:' . RUTA . '/admin');

	}
}

require 'views/login.view.php';

?>