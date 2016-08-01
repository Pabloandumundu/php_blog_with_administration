<?php 
require 'admin/config.php';
require 'functions.php';

$conexion = conexion($bd_config);
if (!$conexion) {
	// header ('Location: error.php');
	echo "Error";
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['busqueda'])) { // si se ha realizado petición por método get y el campo búsqueda de get no esta vació

	$busqueda = limpiardatos($_GET['busqueda']);   //limpiardatos definido en funciones.php se encarga de quitar etiquetas html que se traten de inyectar
	$statement = $conexion->prepare(
		'SELECT * FROM articulos WHERE titulo LIKE :busqueda or texto LIKE :busqueda'
		);
	//artículos es el nombre de la tabla, en LIKE  reside la fuerza de la búsqueda. :busqueda es un placeholder que se define a continuación en la ejecución:
	$statement->execute(array(':busqueda' => "%$busqueda%")); //el signo % se pone para que sea cualquier texto que contenga $busqueda y no que tenga que ser exactamente igual a $busqueda
	$resultados = $statement->fetchAll();//extrae/muestra todos los datos

	if (empty($resultados)) {
		$titulo = "No se encontraron artículos con el resultado: " . $busqueda;
	} else {
		$titulo = 'Resultados de la búsqueda: ' . $busqueda;
	}
} else {
	header('Location: ' . RUTA . '/index.php');
}

require 'views/buscar.view.php';

?>