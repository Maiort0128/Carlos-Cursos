<?php 

    use App\Cursos;
    // Importar la conexión
    $db = conectarDB();
    
    // consultar
    $query = "SELECT * FROM guias LIMIT {$limite}";

    // obtener resultado
    $resultado = mysqli_query($db, $query);


?>

<div class="contenedor-anuncios">
        <?php while($guias = mysqli_fetch_assoc($resultado)): ?>
        <div class="anuncio">

        <?php
            // Get the file extension
            $extension = strtolower(pathinfo($guias["imagen"], PATHINFO_EXTENSION));
            
            // Display the appropriate content based on the file extension
            if ($extension === 'pdf'): ?>
                <embed src="imagenes/<?php echo $guias["imagen"]; ?>" type="application/pdf" width="100%" height="290px" />
            <?php elseif (in_array($extension, ['jpg', 'jpeg', 'png'])): ?>
                <img loading="lazy" src="imagenes/<?php echo $guias["imagen"]; ?>" alt="imagen del curso">
            <?php else: ?>
                <p>Unsupported file type: <?php echo htmlspecialchars($extension); ?></p>
            <?php endif; ?>

            <div class="contenido-anuncio">
                <h3><?php echo $guias['nombre']; ?></h3>
                <p><?php echo substr($guias['descripcion'],0,120); ?></p>
                <p class="precio"><?php echo Cursos::obtenerNombreCurso($guias["curso_id"]); ?></p>


                <a href="anuncio.php?id=<?php echo $guias['id']; ?>" class="boton-amarillo-block">
                    Ver guia
                </a>
            </div><!--.contenido-anuncio-->
        </div><!--anuncio-->
        <?php endwhile; ?>
    </div> <!--.contenedor-anuncios-->

<?php 

    // Cerrar la conexión
    mysqli_close($db);
?>