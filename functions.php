<?php

function conexion($bd_config){ 	// se utiliza una función para la conexión porque se va ha reutilizar muchas veces. el parámetro $bd_config es un array con los parámetros de conexión que esta guardado en config.php

	try {
		// la forma de acceder directamente es 
    	// $conexion = new PDO('mysql:host=localhost;dbname='cursophp0_blog', ''root', '');  
    	
    	// pero vamos a hacerlo mediante la variable así se pueden cambiar los datos fácilmente desde config.php:
    	$conexion = new PDO('mysql:host=sql304.hostfree.pw;dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
    	return $conexion; //si la conexión es correcta devuelve sus valores

	} catch (PDOException $e) { 
		return false;
	}

}

function limpiardatos($datos) { // esta función sirve para limpiar datos (para evitar inserción código) que el usuario haya podido introducir en el módulo de administración (a la hora de añadir post)

	$datos = trim($datos);     //quita espacios delate y detrás
	$datos = stripcslashes($datos); //quita barras '/' y las concatena
	$datos = htmlspecialchars($datos); //quita caracteres especiales
	return $datos; //devuelve los datos limpios
}

function pagina_actual(){ // esta función se utiliza en la función de obtener_post 
	return isset($_GET['p']) ? (int)$_GET['p'] : 1; // si la variable p tomada del GET (la de url) esta seteada devuelve su valor entero (para evitar hackeo) y si no su valor será 1
}

function obtener_post($post_por_pagina, $conexion) { // para obtener los artículos en cada página del blog, se le pasan los parámetros definido en config.php de numero de post por página y los datos de conexión porque hacen falta

	$inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0; // calcula desde que post se inicia en la página actual si es la página 1 devuelve 0. pagina_actual es una función que se define abajo
	$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT $inicio, $post_por_pagina"); // para obtener los posts (para que funcionen las variables hay que poner entre comillas doble) para que calcule cuantos artículos hay en la base de datos y luego ese dato se utilizará para la imaginación
	$sentencia->execute();
	return $sentencia->fetchAll();

}
function numero_paginas($post_por_pagina, $conexion) {
	// esta función se utiliza en paginación.php
	$total_post = $conexion->prepare('SELECT FOUND_ROWS() as total');
	$total_post->execute();
	$total_post = $total_post->fetch()['total'];
	$numero_paginas = ceil($total_post / $post_por_pagina); // con ceil para redondear hacia arriba y haya paginas para todos los posts
	return $numero_paginas;
}

function id_articulo($id) {
	return (int)limpiardatos($id); // esto es una pequeña función que utiliza la función limpiardatos definida arriba e (int) para que el id devuelto solo sea numero, y así no tenga posibilidades de ser código malicioso
}

function obtener_post_por_id($conexion, $id){
	$resultado = $conexion->query("SELECT * FROM articulos WHERE id = $id LIMIT 1");
	$resultado = $resultado->fetchAll(); 
	return ($resultado) ? $resultado : false; // si tiene resultado lo devuelve sino devuelve false
}

function fecha($fecha) {
	$timestamp = strtotime($fecha);
	$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
	$dia = date('d', $timestamp);
	$mes = date('m', $timestamp) - 1;
	$year = date('Y', $timestamp);
	$fecha = "$dia de " . $meses[$mes] . " del $year";
	return $fecha;
}

function comprobarSession() { //se utilizará en los archivos de la carpeta admin para que nadie pueda acceder con un enlace directo sin haber iniciado sesion
	if(!isset($_SESSION['admin'])) {
		header ('Location: ' . RUTA);
	}
}

?>