<?php session_start(); // porque vamos utilizar sesiones para proteger

require 'config.php';
require '../functions.php';


comprobarSession();

$conexion = conexion($bd_config);
if (!$conexion) {
	header('Location: ../error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$titulo = limpiarDatos($_POST['titulo']); //se corresponde con el name del imput
	$extracto = limpiarDatos($_POST['extracto']);
	$texto = $_POST['texto'];
	$thumb = $_FILES['thumb']['tmp_name'];

	$archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name']; // /imagenes/asasdas.jpg
	move_uploaded_file($thumb, $archivo_subido); // se mueve el archivo temporal al destino (/imagenes/asasdas.jpg)
	
	//para insertar los datos en la base de datos:
	$statement = $conexion->prepare(
		'INSERT INTO articulos (id, titulo, extracto, texto, thumb) 
		VALUES (null, :titulo, :extracto, :texto, :thumb)'
		);
	$statement->execute(array(
		':titulo' => $titulo,
		':extracto' => $extracto,
		':texto' => $texto,
		':thumb' => $_FILES['thumb']['name']
		));

	header('Location: ' . RUTA . '/admin');
}

require '../views/nuevo.view.php';


?>