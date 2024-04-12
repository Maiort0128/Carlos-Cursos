<?php
require 'includes/app.php';
use App\Cursos;

$curso_id = $_GET['curso_id'] ?? null;
$curso_id = filter_var($curso_id, FILTER_VALIDATE_INT);

if (!$curso_id) {
    echo "Error: Invalid curso_id parameter.";
    exit;
}

$query = "SELECT * FROM guias WHERE curso_id = {$curso_id}";

// Execute the query
$resultado = mysqli_query($db, $query);




// Query the database for ads with the given curso_id
$query = "SELECT * FROM guias WHERE curso_id = {$curso_id}";

// Execute the query
$resultado = mysqli_query($db, $query);

// Include the header template
incluirTemplate('header');
?>

<main class="contenedor-anuncios ">
    <?php while ($guias = mysqli_fetch_assoc($resultado)): ?>
        <a href="anuncio.php?id=<?php echo $guias['id']; ?>" class="anuncio-link">
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
                    <h2><?php echo htmlspecialchars($guias['nombre']); ?></h2>
                    <p><?php echo substr($guias['descripcion'],0,120); ?></p>
                    <p class="curso-name"><?php echo Cursos::obtenerNombreCurso($guias["curso_id"]); ?></p>
                </div>
            </div>
        </a>
    <?php endwhile; ?>
</main>



<?php
// Include the footer template
incluirTemplate('footer');

// Close the database connection
mysqli_close($db);
?>
