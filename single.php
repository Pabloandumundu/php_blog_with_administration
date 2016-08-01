<?php
require 'admin/config.php';
require 'functions.php';

$conexion = conexion($bd_config);  // la función conexión esta definida en functions.php y $bd_config en config.php
$id_articulo = id_articulo($_GET['id']); // pilla el id de los que haya en la dirección pero lo pasa por un filtro id_articulo definido en funciones.php para evitar código extraño.


if (!$conexion) {
	header('Location: error.php');
}
if (empty($id_articulo)) {
	header('Location: index.php');
}

$post = obtener_post_por_id($conexion, $id_articulo);

if(!$post) {
	header('Location: index.php');
}
$post = $post[0]; //porque $post es un arreglo del tipo:

			// [id] => 1
   			// [0] => 1
   			// [titulo] => Energistically unleash corporate solutions via holistic initiatives.
   			// [1] => Energistically unleash corporate solutions via holistic initiatives       

require 'views/single.view.php';

 ?>
