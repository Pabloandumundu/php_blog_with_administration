<?php

define('RUTA', 'http://example-phh-blog.a0001.net');

$bd_config = array (
    'basedatos' => 'epree_18206683_example_php_blog',
    'usuario' => 'epree_18206683',
    'pass' => 'burriquito2123pasitos',
);
$blog_config = array(
    'post_por_pagina' => '2',
    'carpeta_imagenes' => 'imagenes/'
);

// También se crean los siguientes datos para controlar el acceso, se podría haber usado una base de datos pero significaba crear una tabla más, y por simplificar se ha hecho así (podría crear una..,se podría combinar con ejercicio anterior)
$blog_admin = array (
    'usuario' => 'Carlos',
    'password' => '123'
);

?>
