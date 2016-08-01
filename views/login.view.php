<?php require 'header.php'; ?> <!-- toda la primera parte del html que incluye inicialización, head y header se escribe en este fichero aparte pues es lo mismo para todos y así no hay que repetir copiar y pegar -->

<div class="contenedor">
        <div class="post">
            <article>
                <!-- el array $post que se utiliza abajo esta definido en single.php -->
                <h2 class="titulo">Iniciar Sesión</h2>
                <form class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"> 
                <!-- htmlspecialchar para evitar inyección de código -->
                    <input type="text" name="usuario" placeholder="Usuario">
                    <input type="password" name="password" placeholder="Contraseña">
                    <input type="submit" value="Iniciar Sesión">
                </form>

            </article>
        </div>

    </div>

<?php require 'footer.php' ?>