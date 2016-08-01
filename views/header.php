<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Blog</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="<?php echo RUTA; ?>/css/estilos.css"> <!-- varible RUTA desde config.php -->
</head>
<body>
    <header>
        <div class="contenedor">
            <div class="logo izquierda">
                <p><a href="<?php echo RUTA ?>">Mi primer blog</a></p> <!-- se podría poner una imagen.. -->
            </div>
            <div class="derecha">
                <form name="busqueda" class="buscar" action="<?php echo RUTA; ?>/buscar.php" method="get"> <!-- varible RUTA desde config.php -->
                    <input type="text" name="busqueda" placeholder="Buscar"><button type="submit" class="icono fa fa-search"></button> <!-- para que el icono aparezca dentro del imput hay que poner el button seguido de  -->
                </form>
                <nav class="menu">
                    <ul>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#">Contacto <i class="fa fa-envelope"></i></a></li>
                        <!-- Versión simplificada en la que el botón de login esta siempre presente, no se comprueba conexión -->
                        <li><a href="<?php echo RUTA; ?>/login.php">Login <i class="fa fa-sign-in" aria-hidden="true"></i></a></li>

                    </ul>
                </nav>
            </div>
        </div>
    </header>
