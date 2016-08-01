<?php session_start();

// para cerrar la sesión
session_destroy();
$_SESSION = array(); //por precaución se reinicia la variable con 0 contenido

header ('Locarion: ../'); // un directorio atrás (al index.php)
die(); // se mata la ejecución de la página;
 ?>