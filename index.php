<?php
    
    require 'includes/app.php';
    incluirTemplate('header',$inicio = true);
?>


    <section class="seccion contenedor">
        <h2>Guias y trabajos por realizar</h2>

        <?php 
            
            $limite = 3;
            include 'includes/templates/anuncios.php';
        ?> 
        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Connect with Professor Carlos - Your Guide to English Excellence!</h2>
        <p>Unlock academic success with Prof. Carlos. Get guidance, literary inspiration, and explore English nuances together. Connect now!</p>
        <a href="contacto.php" class="boton-amarillo">Contact Us</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Essay Assignment: Literary Analysis</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span> </p>

                        <p>
                        Analyze a selected piece of literature (fiction or poetry) and explore its themes, characters, and literary devices. Provide insightful commentary on the author's style and intent.
                        </p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Creative Writing Exercise: Short Story</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span> </p>

                        <p>
                        Craft a short story that incorporates a specific theme or literary technique discussed in class. Focus on character development, plot structure, and effective use of language.
                        </p>
                    </a>
                </div>
            </article>
        </section>


        </section>
    </div>

<?php
    incluirTemplate('footer');
?>

