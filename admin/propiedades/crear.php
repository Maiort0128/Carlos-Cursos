<?php

    require '../../includes/app.php';
    
    use App\guias;
    use App\Cursos;
    use Intervention\Image\ImageManagerStatic as Image;
    
    
    estaAutenticado();
    
    
    $guias = new guias;
    
    
    // Consultar para obtener todos los vendedores
    
    $Cursos = Cursos::all();
    
    
    //Arreglo con mensajes de errores
    $errores = guias::getErrores();
    
    
    //Ejecuta el codigo despues de que el usuario envia el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        
        // Crea una nueva instancia
        $guias = new guias ($_POST['guias']);
        
        
        
        /// Generate a unique name for the file
        $extension = pathinfo($_FILES['guias']['name']['imagen'], PATHINFO_EXTENSION);
        $nombreArchivo = md5(uniqid(rand(), true)) . "." . $extension;
        
        // Set the file name
        $guias->setImagen($nombreArchivo);
        
        // Set the destination path
        $destino = CARPETA_IMAGENES . $nombreArchivo;
        
        // Move the uploaded file to the server
        $archivoTemporal = $_FILES['guias']['tmp_name']['imagen'];
        
        // Validar
        $errores = $guias->validar() ;
        
        if (empty($errores)) {
        // Check if the file is a PDF
            if ($_FILES['guias']['type']['imagen'] === 'application/pdf') {
            // Handle PDF file upload
                if (move_uploaded_file($archivoTemporal, $destino)) {
                // Save to the database
                $guias->guardar();
                } else {
                // Handle upload failure
                $errores[] = "Error uploading PDF file";
                }
        } else {
            // Check if the file is an image (JPG, JPEG)
            if (in_array($extension, ['jpg', 'jpeg'])) {
                // Handle image file upload
                if (move_uploaded_file($archivoTemporal, $destino)) {
                    // Save to the database
                    $guias->guardar();
                } else {
                    // Handle upload failure
                    $errores[] = "Error uploading JPG file";
                }
            } else {
                // Unsupported file type
                $errores[] = "Unsupported file type: $extension";
            }

            
            
        }
        
        
    }
        
}
    
    
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Crear</h1>
        
        <a href="/admin/" class="boton boton-verde">Volver</a>
        
        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        
        
        </div>
        <?php endforeach; ?>
        
        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
            
            <?php  include '../../includes/templates/formulario_propiedades.php' ?>
            
            <input type="submit" value="Crear Propiedad" class="boton boton-verde"   >
        </form>
        
        
        
    </main>
    
<?php
    incluirTemplate('footer');
?>