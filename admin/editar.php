<?php session_start(); // porque vamos utilizar sesiones para proteger el archivo

require 'config.php';
require '../functions.php';


comprobarSession(); //si no hay sesion nos redirije

$conexion = conexion($bd_config);
if (!$conexion) {
	header('Location: ../error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // si se ha pulsado el boton de modificar datos (para guardar en db) entonces guardar 
	$titulo = limpiarDatos($_POST['titulo']);
	$extracto = limpiarDatos($_POST['extracto']);
	$texto = $_POST['texto'];
	$id = limpiarDatos($_POST['id']);
	$thumb_guardada = $_POST['thumb-guardada']; //se guarda en memoria porsiacaso no hay nueva img, thumb_guardada es un imput tipo hidden de editar.view.php que, al cargarse, ha tomado el valor de $post['thumb']
	$thumb = $_FILES['thumb']; // los ficheros que se pasan con un imput type file se toman así con $_FILES

	if (empty($thumb['name'])) { //si no hay nueva imágen enviada
	 	$thumb = $thumb_guardada; // carga la guardada anterirmente
	} else {
		$archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name']; // el destino del archivo
		move_uploaded_file($_FILES['thumb']['tmp_name'], $archivo_subido); // se mueve de temporal a destino
		$thumb = $_FILES['thumb']['name'];
	}

	$statement = $conexion->prepare(
		'UPDATE articulos SET titulo = :titulo, extracto = :extracto, texto = :texto, thumb = :thumb WHERE id = :id'
		);
	$statement->execute(array(
		':titulo' => $titulo,
		':extracto' => $extracto,
		':texto' => $texto,
		':thumb' => $thumb,
		':id' => $id
	));

	header('Location: ' . RUTA . '/admin');

} else { // sinó cargar los datos del post con el id definido por url para poder editar
	$id_articulo = id_articulo($_GET['id']); //id_articulo es una función que limpia la cadena 

	if (empty($id_articulo)) {
		header('Location: ' . RUTA . '/admin');
	}
	$post = obtener_post_por_id($conexion, $id_articulo);
	if (!$post) {
		header('Location: ' . RUTA . '/admin');
	}
	$post = $post[0]; //se pone [0] porque en realidad el array tomado de la base de datos es un array dentro de un array de esta manera se llama al array inferior, mirar:

	/* 
	Array
	(
	    [0] => Array
	        (
	            [id] => 1
	            [0] => 1
	            [titulo] => Energistically unleash corporate solutions via holistic initiatives.
	            [1] => Energistically unleash corporate solutions via holistic initiatives.
	            [extracto] => Synergistically disintermediate stand-alone value through principle-centered content. Completely maintain prospective networks with ubiquitous e-services. Rapidiously grow quality resources for princi
	            [2] => Synergistically disintermediate stand-alone value through principle-centered content. Completely maintain prospective networks with ubiquitous e-services. Rapidiously grow quality resources for princi
	            [fecha] => 2016-07-05 10:31:48
	            [3] => 2016-07-05 10:31:48
	            ...
	        )

	)
	*/
}


require '../views/editar.view.php'

?>