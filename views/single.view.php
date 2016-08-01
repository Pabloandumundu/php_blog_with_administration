<?php require 'header.php'; ?> <!-- toda la primera parte del html que incluye inicialización, head y header se escribe en este fichero aparte pues es lo mismo para todos y así no hay que repetir copiar y pegar -->

    <div class="contenedor">
        <div class="post">
            <article>
                <!-- el array $post que se utiliza abajo esta definido en single.php -->
                <h2 class="titulo"><?php echo $post['titulo'] ?></h2>
                <p class="fecha"><?php echo fecha($post['fecha']) ?></p>
                <!-- función fecha esta definida en funciones.php es para darle un formato, con meses en español -->
                <div class="thumb"> 
                    <a href="#"><img src="<?php echo RUTA; ?>/imagenes/<?php echo $post['thumb'] ?>" alt="<?php echo $post['titulo'] ?>"></a>
                </div>
                <p class="extracto"><?php echo nl2br($post['texto']) ?></p> 
                <!-- la función nl2br esta integrada en PHP y sirve para que respete los saltos de linea del texto si los hubiera (sino los muestra todo seguido) -->
                <!-- en CSS se utiliza la misma clase que en el extracto del index, no importa porque el estilo es igual, solo que aquí se pone el contenido completo -->

            </article>
        </div>

    </div>

<?php require 'footer.php' ?>
