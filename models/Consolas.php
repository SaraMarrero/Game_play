<?php
    namespace Model;

    class Consolas extends ActiveRecords{
        public static $tabla = 'consolas';
        public static $columnasDB = ['id_consola', 'nombreConsola'];
        public $id_consola;
        public $nombreConsola;

        public function __construct($args = []) {
            $this->id_consola = $args['id_consola'] ?? null;
            $this->nombreConsola = $args['nombreConsola'] ?? '';
        }

        // Valida la inserción de datos
        public function validar(){

            // Valida el nombre
            if($this->nombreConsola){
                $nombreValidado = true;
            } else{
                $nombreValidado = false;
                self::$errores['nombreConsola'] = "<p style='color: red'>Debes añadir el nombre de la consola</p>";
            }

            return self::$errores;
        }
    }
?>