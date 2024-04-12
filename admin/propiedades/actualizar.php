<?php

use App\guias;
use App\Cursos;
use Intervention\Image\ImageManagerStatic as Image;


    require '../../includes/app.php';
    
    estaAutenticado();
    
    //Validar la URL por ID valido
    
    $id = $_GET ['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    if (!$id) {
        header('Location: /admin');
    }
    
    
    //Obtener los datos de la propiedad
    
    $guias = guias::find($id);
    
    
    
    
    // Consultar para obtener cursos
    $Cursos = Cursos::all();

    
    
    //Arreglo con mensajes de errores
    $errores = guias::getErrores();
    
    $titulo = $guias->nombre;
    
    
    
    //Ejecuta el codigo despues de que el usuario envia el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        
        // Asignar los atributos
        $args = $_POST['guias'];
        
        // Validacion
        $errores = $guias->validar();
        
        // Generar un nombre unico
        $nombreImagen = md5(uniqid( rand(), true ) ) . ".jpg" ;
        // Subida de archivos
        if ($_FILES['guias']['tmp_name']['imagen']) {
            $image = Image::make($_FILES['guias']['tmp_name']['imagen'])->fit(800,600);
            $guias->setImagen($nombreImagen);
        }
        
        
        $guias->sincronizar($args);
        
        $errores = $guias->validar();
        
        //Revisar que el arreglo de errores este vacia
        
        if (empty($errores)) {
            if ($_FILES['guias']['tmp_name']['imagen']){
                $image->save(CARPETA_IMAGENES . $nombreImagen);
            
            }
        }
        $guias->guardar();
        
    }
    
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Actualizar</h1>
        
        <a href="/admin" class="boton boton-verde" >Volver</a>
        
        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        
        
        </div>
        <?php endforeach; ?>
        
        <form class="formulario" method="POST" enctype="multipart/form-data">
            
            <?php  include '../../includes/templates/formulario_propiedades.php' ?>

            
            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde"   >
        </form>
        
        
        
    </main>
    
<?php
    incluirTemplate('footer');
?>