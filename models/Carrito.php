<?php
    namespace Model;

    class Carrito extends ActiveRecords{
        protected static $tabla = 'carrito';
        protected static $columnasDB = ['id_compra', 'dniUsuario', 'id_juego', 'id_consola', 'nombreJuego', 'fotoJuego', 'precioJuego', 'cantidad'];
        public $id_compra;
        public $dniUsuario;
        public $id_juego;
        public $id_consola;
        public $nombreJuego;
        public $fotoJuego;
        public $precioJuego;
        public $cantidad;

        public function __construct($args = []) {
            $this->id_compra = $args['id_compra'] ?? null;
            $this->dniUsuario = $args['dniUsuario'] ?? '';
            $this->id_juego = $args['id_juego'] ?? '';
            $this->id_consola = $args['id_consola'] ?? '';
            $this->nombreJuego = $args['nombreJuego'] ?? '';
            $this->fotoJuego = $args['fotoJuego'] ?? '';
            $this->precioJuego = $args['precioJuego'] ?? '';
            $this->cantidad = $args['cantidad'] ?? '';
        }
        
    }
?>