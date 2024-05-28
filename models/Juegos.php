<?php
    namespace Model;

    class Juegos extends ActiveRecords{
        protected static $tabla = 'juegos';
        protected static $columnasDB = ['id_juego', 'fotoJuego', 'nombreJuego', 'precioJuego', 'id_consola'];

        public $id_juego;
        public $fotoJuego;
        public $nombreJuego;
        public $precioJuego;
        public $id_consola;

        public function __construct($args = []) {
            $this->id_juego = $args['id_juego'] ?? null;
            $this->fotoJuego = $args['fotoJuego'] ?? '';
            $this->nombreJuego = $args['nombreJuego'] ?? '';
            $this->precioJuego = $args['precioJuego'] ?? '';
            $this->id_consola = $args['id_consola'] ?? '';
        }

        // Valida la inserción de datos
        public function validar(){
            if(!$this->nombreJuego){
                self::$errores['nombreJuego'] = "<p style='color:red;'>Debe añadir un nombre válido</p>";
            }

            if(!$this->precioJuego){
                self::$errores['precioJuego'] = "<p style='color:red;'>Debe añadir un precio válido</p>";
            }

            if(is_array($this->fotoJuego)){
                self::$errores['fotoJuego'] = "<p style='color:red;'>Debe añadir una foto válida</p>";
            }

            if(!$this->id_consola){
                self::$errores['id_consola'] = "<p style='color:red;'>Debe seleccionar una consola</p>";
            }

            return self::$errores;
        }
    }
?>