<?php require '../views/header.php'; ?> <!-- toda la primera parte del html que incluye inicialización, head y header se escribe en este fichero aparte pues es lo mismo para todos y así no hay que repetir copiar y pegar -->

    <div class="contenedor">
        <h2>Panel de Contról</h2>
        <a href="nuevo.php" class="btn">Nuevo Post</a>
        <a href="cerrar.php" class="btn">Cerrar Sesión</a>
        <?php foreach($posts as $post): ?> <!-- recorre el array $post definido en en index.php que incluye los post que se van a mostrar en cada una de las páginas, cada uno de los $post sera un objeto que incluye titulo, fecha, etc.. -->
            <div class="post">
                <article>
                    <h2 class="titulo"><?php echo $post['id'] . ".-" . $post['titulo'] ?></h2>
                    <a href="editar.php?id=<?php echo $post['id']; ?>">Editar</a>
                    <a href="../single.php?id=<?php echo $post['id']; ?>">Ver</a>
                    <a href="borrar.php?id=<?php echo $post['id']; ?>">Borrar</a>
                </article>
            </div> 
        <?php endforeach ?>

        <?php require '../paginacion.php'; ?> <!-- se utiliza archivo externo porque la paginación también se utilizara en otras páginas -->
    </div>

<?php require '../views/footer.php' ?>