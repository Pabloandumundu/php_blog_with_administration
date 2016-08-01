<?php require 'header.php'; ?> <!-- toda la primera parte del html que incluye inicialización, head y header se escribe en este fichero aparte pues es lo mismo para todos y así no hay que repetir copiar y pegar -->

    <div class="contenedor">
        <h2><?php echo $titulo ?>&nbsp;&nbsp; <!-- $titulo esta definido dentro de un un condicional en buscar.php (es lo de "Resultados de busqueda: ..."--> 
        <small><a href="<?php echo RUTA; ?>/index.php" class="btn">Volver</a></small></h2>
        <?php foreach($resultados as $post): ?> <!-- recorre el array $resultados definido en buscar.php que incluye los post en los que se ha encontrado lo buscado, cada uno de los $post sera un objeto que incluye titulo, fecha, etc.. -->
            <div class="post">
                <article>
                    <h2 class="titulo"><a href="single.php?id=<?php echo $post['id'] ?>"><?php echo $post['titulo'] ?></a></h2>
                    <!-- el enlace a single.php llevaría al post completo -->
                    <p class="fecha"><?php echo fecha($post['fecha']) ?></p>
                    <!-- función fecha esta definida en funciones.php es para darle un formato, con meses en español -->
                    <div class="thumb">
                        <a href="single.php?id=<?php echo $post['id'] ?>"><img src="<?php echo $blog_config['carpeta_imagenes']; ?><?php echo $post['thumb'] ?>" alt=""></a>
                    </div>
                    <p class="extracto"><?php echo $post['extracto'] ?></p>
                    <a href="single.php?id=<?php echo $post['id'] ?>" class="continuar">Continuar Leyendo</a>
                </article>
            </div> 
        <?php endforeach ?>

    </div>

<?php require 'footer.php' ?>