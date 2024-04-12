<?php
    
    require '../includes/app.php';
    estaAutenticado();
    
    use App\guias;
    use App\Cursos;
    
    // Implementar un metodo para obtener todas las propiedades
    
    $guias = guias::all();
    $cursos = Cursos::all();
    
    
    
    
    //Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        
        
        if ($id) {
            
            $guias = guias::find($id);
            
            $guias->eliminar();
            
            
            
            
            
        }
        
    }
    
    //Incluye un template
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Administrador de Guias y trabajos</h1>
        <?php if (intval($resultado) === 1): ?>
            <p class="alerta exito">Anuncio creado correctamente</p>
        <?php elseif (intval($resultado) === 2): ?>
        <p class="alerta exito">Anuncio Actualizado correctamente</p>
        <?php elseif (intval($resultado) === 3): ?>
        <p class="alerta exito">Anuncio Eliminado correctamente</p>
        <?php endif; ?>
        
        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nuevo anuncio</a>
            
            
            
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Descripcion</th>
                    <th>Curso</th>
                    <th>Acciones</th>
                </tr>
            
            </thead>
            
            <tbody> <!-- Mostrar los resultados -->
            
            <?php foreach ($guias as $guia): ?>
    <tr>
        <td><?php echo $guia->id; ?></td>
        <td><?php echo $guia->nombre; ?></td>
        
                    <td>
                    <?php
                        
                        // Get the file extension
                        $extension = strtolower(pathinfo($guia->imagen, PATHINFO_EXTENSION));
                        
                        // Display the appropriate content based on the file extension
                        if ($extension === 'pdf'): ?>
                            <embed src="imagenes/<?php echo $guia->imagen; ?>" type="application/pdf" width="100%" height="600px" />
                        <?php elseif (in_array($extension, ['jpg', 'jpeg', 'png'])): ?>
                            <img loading="lazy" src="imagenes/<?php echo $guia->imagen; ?>" alt="imagen del curso">
                        <?php else: ?>
                            <p>Unsupported file type: <?php echo htmlspecialchars($extension); ?></p>
                        <?php endif; ?>
                    </td>
                    <td><?php echo $guia->descripcion;  ?> </td>
                    <td><?php echo Cursos::obtenerNombreCurso($guia->curso_id);  ?> </td>
                    <td>
                        <form method="POST" class="w-100" >
                            <input type="hidden" name="id" value="<?php echo $guia->id; ?>" >
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        
                        
                        </form>
                        <a href="/admin/propiedades/actualizar.php?id=<?php echo $guia->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        
        </table>
    
    </main>

<?php
    //Cerrar la conexion
    mysqli_close($db);
    

    incluirTemplate('footer');
?>