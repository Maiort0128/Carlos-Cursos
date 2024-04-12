

<fieldset>
                <legend>Informacion General</legend>


                <label for="nombre">Titulo:</label>
                <input type="text" id="nombre" name="guias[nombre]" placeholder="Nombre Guias" value="<?php echo s( $guias->nombre ); ?>" >


                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="guias[imagen]">
                
                <?php if($guias->imagen) { ?>
                    <img src="/imagenes/<?php echo $guias->imagen ?>" class="imagen-small">
                <?php } ?>

                <label for="descripcion">Descripcion:</label>
                <textarea id="descripcion" name="guias[descripcion]"><?php echo s( $guias->descripcion ); ?></textarea>
            </fieldset>


            
    <fieldset>
        <legend>Curso</legend>
        <label for="guias[curso_id]"></label>
        <select name="guias[curso_id]" id="curso_name">
            <option selected value="">-- Seleccione --</option>
            <?php foreach($Cursos as $curso): ?>
                <option
                <?php echo $guias->curso_id === $curso->id ? 'selected' : ''; ?>
                value="<?php echo s($curso->id); ?>"
                
                
            ><?php echo s($curso->curso_name); ?></option>
            <?php endforeach;?>
        </select>
        
    </fieldset>
        
        
