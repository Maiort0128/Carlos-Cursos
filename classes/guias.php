<?php

namespace App;

class guias extends ActiveRecord {
    
    protected static $tabla = 'guias' ;

    protected static $columnasDB = ['id', 'nombre' , 'imagen' , 'descripcion', 'curso_id' ];

    
    public $id = '';
    public $nombre = '';
    public $imagen = '';
    public $descripcion = '';
    public $curso_id = '';
    
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->curso_id = isset($args['curso_id']) ? intval($args['curso_id']) : '';
    }
    
    
    public function validar() {
        if (!$this->nombre) {
            self::$errores[] = "Debes añadir un nombre a la guia";
        }
        
        
        if (strlen($this->descripcion) < 50 ) {
            self::$errores[] = "La descripcion es obligatoria y debe tener almenos 50 caracteres";
        }
        
        
        if (!$this->curso_id) {
            self::$errores[] = "Elige un curso";
        }
        
        if (!$this->imagen  ) {
            self::$errores[] = "La imagen es obligatoria";
        }
        
        
        
        
        return self::$errores;
    }
    
    
}