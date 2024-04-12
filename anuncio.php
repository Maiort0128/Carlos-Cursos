<?php 
    // Ensure that the ID parameter is set and is a valid integer
    $id = $_GET['id'] ?? null;
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    if (!$id) {
        // Redirect if the ID is not valid
        header('Location: /');
        exit;
    }
    


    // Import the necessary classes and files
    require 'includes/app.php';
    use App\Cursos;

    // Establish a database connection
    $db = conectarDB();
    
    // Query the database for the guide with the given ID
    $query = "SELECT * FROM guias WHERE id = {$id}";
    
    // Execute the query
    $resultado = mysqli_query($db, $query);
    
    // Check if the guide with the given ID exists
    if (!$resultado || $resultado->num_rows === 0) {
        // Redirect if the guide does not exist
        header('Location: /');
        exit;
    }
?>

<?php
    // Include the header template
    incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <?php while ($guias = mysqli_fetch_assoc($resultado)): ?>
        <h1><?php echo htmlspecialchars($guias["nombre"]); ?></h1>
        
        <?php
            // Get the file extension
            $extension = strtolower(pathinfo($guias["imagen"], PATHINFO_EXTENSION));
            
            // Display the appropriate content based on the file extension
            if ($extension === 'pdf'): ?>
                <embed src="imagenes/<?php echo $guias["imagen"]; ?>" type="application/pdf" width="100%" height="600px" />
            <?php elseif (in_array($extension, ['jpg', 'jpeg', 'png'])): ?>
                <img loading="lazy" src="imagenes/<?php echo $guias["imagen"]; ?>" alt="imagen del curso">
            <?php else: ?>
                <p>Unsupported file type: <?php echo htmlspecialchars($extension); ?></p>
            <?php endif; ?>
        
        <div class="resumen-guias">
        <p class="curso-name"><?php echo Cursos::obtenerNombreCurso($guias["curso_id"]); ?></p>
            <p><?php echo htmlspecialchars($guias['descripcion']); ?></p>
        </div>
    <?php endwhile; ?>
</main>

<?php
    // Include the footer template
    incluirTemplate('footer');
    
    // Close the database connection
    mysqli_close($db);
?>
