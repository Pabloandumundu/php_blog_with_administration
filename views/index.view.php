<?php require 'header.php'; ?> <!-- toda la primera parte del html que incluye inicialización, head y header se escribe en este fichero aparte pues es lo mismo para todos y así no hay que repetir copiar y pegar -->

    <div class="contenedor">
        <?php foreach($posts as $post): ?> <!-- recorre el array $post definido en en index.php que incluye los post que se van a mostrar en cada una de las páginas, cada uno de los $post sera un objeto que incluye titulo, fecha, etc.. -->
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

        <?php require 'paginacion.php'; ?> <!-- se utiliza archivo externo porque la paginación también se utilizara en otras páginas, en este caso en el admin.php -->
    </div>

<?php require 'footer.php' ?>
