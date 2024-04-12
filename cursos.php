<?php
require 'includes/app.php';

// Include the header template
incluirTemplate('header');
?>

<h2>Cursos</h2>
<div class="contenedor-cursos">
    <div class="anuncio">
        <a href="curso.php?curso_id=1">
            <img loading="lazy" src="build/img/A1_level.png" alt="A1">
            <p>A1</p>
        </a>
    </div>
    
    <div class="anuncio">
        <a href="curso.php?curso_id=2">
            <img loading="lazy" src="build/img/A2_level.png" alt="A2">
            <p>A2</p>
        </a>
    </div>
    
    <div class="anuncio">
        <a href="curso.php?curso_id=3">
            <img loading="lazy" src="build/img/B1_level.png" alt="B1">
            <p>B1</p>
        </a>
    </div>
    
    <div class="anuncio">
        <a href="curso.php?curso_id=4">
            <img loading="lazy" src="build/img/B2_level.png" alt="B2">
            <p>B2</p>
        </a>
    </div>
    
    <div class="anuncio">
        <a href="curso.php?curso_id=5">
            <img loading="lazy" src="build/img/C1_level.png" alt="C1">
            <p>C1</p>
        </a>
    </div>
    
    <div class="anuncio">
        <a href="curso.php?curso_id=6">
            <img loading="lazy" src="build/img/C2_level.png" alt="C2">
            <p>C2</p>
        </a>
    </div>
</div>

<?php
// Include the footer template
incluirTemplate('footer');
?>
