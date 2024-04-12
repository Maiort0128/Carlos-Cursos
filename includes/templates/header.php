<?php
    
    if (!isset($_SESSION)) {
        session_start();
        
    }
    
    $auth = $_SESSION['login'] ?? false;
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carlos curso</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/index.php">
                    <h1>Carlos Estudios</h1>
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg">
                    <nav class="navegacion">
                        <a href="anuncios.php">Guias</a>
                        <a href="cursos.php">Cursos</a>
                        <a href="contacto.php">Contacto</a>
                        <?php if($auth):  ?>
                            <a href="cerrar-sesion.php">Cerrar sesion</a>

                        <?php endif; ?>
                        
                    </nav>
                </div>

                
            </div> <!--.barra-->
            <?php if($inicio) {  ?>
                <h1>Cursos y guias</h1>
            <?php  }  ?>
        </div>
    </header>