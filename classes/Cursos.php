<?php

namespace App;

class Cursos extends ActiveRecord {
    
    protected static $tabla = 'cursos' ;
    
    protected static $columnasDB = ['id', 'curso_name' ];
    
    public $id;
    public $curso_name;
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->curso_name = $args['curso_name'] ?? '';
    }
    
    // Method to obtain the curso name based on curso_id
    public static function obtenerNombreCurso($curso_id)
    {
        $curso = static::find($curso_id);
        return $curso ? $curso->curso_name : null;
    }
    
    
}