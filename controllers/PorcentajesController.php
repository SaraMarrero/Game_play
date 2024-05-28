<?php
    namespace Controllers;

    use MVC\Router;
    use Model\Juegos;

    session_start();

    class PorcentajesController{

        public static function porcentajeJuegos(Router $router){

            $ruta_json = './build/js/juegos.json';
        
            // Carga contenido del archivo JSON
            $contenido = file_get_contents($ruta_json);
            
            // Valida si el json está vacío
            if(!empty($contenido)){
                // Carga los datos existentes del JSON
                $datos_existente = json_decode($contenido, true);
            } else {
                // Si no está vacío, lo inicializa vacío
                $datos_existente = [];
            }
        
            $juegos = Juegos::selectAll();
        
            // Recorre los juegos y agrega los que no existen
            foreach ($juegos as $datosJuegos) {
                $juegoExistente = false;
                // Si existe el juego en el json
                foreach($datos_existente as $dato) {
                    if($dato['nombre_juego'] == $datosJuegos['nombreJuego'] && $dato['id_consola'] == $datosJuegos['id_consola']) {
                        $juegoExistente = true;
                        break;
                    }
                }

                if (!$juegoExistente) {
                    $datos_existente[] = [
                        "nombre_juego" => $datosJuegos['nombreJuego'],
                        "id_consola" => $datosJuegos['id_consola']
                    ];
                }
            }
        
            // Codifica y guarda el array actualizado como JSON
            $json_actualizado = json_encode($datos_existente);
            file_put_contents($ruta_json, $json_actualizado);
        
            // Renderizar la vista con el contenido actualizado
            $router->renderAdmin('/admin/porcentaje/porcentajeJuegos', [
                "contenido" => $json_actualizado,
            ]);
        }
        
    }