<?php $numero_paginas = numero_paginas($blog_config['post_por_pagina'], $conexion); ?>
<section class="paginacion">
    <ul>
    	<!-- botón de retroceso que además se deshabilitara y habilitará dependiendo de si esta en la primera página o no -->
    	<?php if (pagina_actual() === 1): ?>
        	<li class="disabled">&laquo;</li>
    	<?php else: ?>
			<li><a href="index.php?p=<?php echo pagina_actual() - 1 ?>">&laquo;</a></li>
    	<?php endif ?>

        <?php for($i = 1; $i <= $numero_paginas; $i++): ?>        	
			<!-- lo siguiente es para cambiar el estilo si el botón de paginación es el actualmente activo -->
			<?php if (pagina_actual() === $i): ?>
				<li class="active"><?php echo $i ?></li>
			<?php else: ?>
				<!-- aquí se ponen el resto de números de paginación hagan falta -->
				<li><a href="index.php?p=<?php echo $i ?>"><?php echo $i ?></a></li>
			<?php endif ?>
		<?php endfor; ?>
		
		<!-- botón de avance -->
		<?php if (pagina_actual() == $numero_paginas): ?>
        	<li><a href="#" class="disabled">&raquo;</a></li>
    	<?php else: ?>
			<li><a href="index.php?p=<?php echo pagina_actual() + 1 ?>">&raquo;</a></li>
    	<?php endif ?>        

    </ul>
</section>
