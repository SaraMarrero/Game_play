<?php
    namespace Controllers;

    use MVC\Router;
    use Model\Juegos;
    use Model\Consolas;
    use Intervention\Image\ImageManagerStatic as Image;

    session_start();

    class JuegosController{

        // Muestra a los usuarios lo juegos de Play Station 5
        public static function play(Router $router){
            // Instancia la clase
            $consolas = new Consolas();
            $juegos = new Juegos();

            // Recoge todas las consolas
            $datosConsolas = $consolas->selectAll();

            $query = $juegos->selectEspecifico('id_consola', 1);

            // Paginacion
            // Cuenta los artículos que hay en nuestra base de datos
            $filas = count($query);
            
            // Elementos por página
            $articulosPorPagina = 10;

            // Calcula cuantas páginas necesitamos
            $paginas = ceil($filas/$articulosPorPagina);

            // Esta variable nos sirve para saber desde que número iniciamos el limite de juegos
            $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
            $iniciar = ($pagina - 1) * $articulosPorPagina;


            // Recoge los datos con el limite de Elementos que queremos en pantalla
            $result = $juegos->selectLimit('id_consola', 1, $iniciar, $articulosPorPagina);

            $router->render('/juegos/Play Station 5', [
                'datosConsolas' => $datosConsolas,
                'paginas' => $paginas,
                'result' => $result
            ]);
        }

        // Muestra a los usuarios lo juegos de Play Station 5
        public static function xbox(Router $router){
            // Instancia la clase
            $consolas = new Consolas();
            $juegos = new Juegos();

            // Recoge todas las consolas
            $datosConsolas = $consolas->selectAll();

            $query = $juegos->selectEspecifico('id_consola', 2);
            
            // Paginacion
            // Cuenta los artículos que hay en nuestra base de datos
            $filas = count($query);
            
            // Elementos por página
            $articulosPorPagina = 10;

            // Calcula cuantas páginas necesitamos
            $paginas = ceil($filas/$articulosPorPagina);

            // Esta variable nos sirve para saber desde que número iniciamos el limite de juegos
            $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
            $iniciar = ($pagina - 1) * $articulosPorPagina;	

            // Recoge los datos con el limite de Elementos que queremos en pantalla
            $result = $juegos->selectLimit('id_consola', 2, $iniciar, $articulosPorPagina);

            $router->render('/juegos/Xbox Series', [
                'datosConsolas' => $datosConsolas,
                'paginas' => $paginas,
                'result' => $result
            ]);
        }

        // mUestra a los usuarios los juegos de Nintendo Switch
        public static function nintendo(Router $router){
            // Instancia la clase
            $consolas = new Consolas();
            $juegos = new Juegos();

            // Recoge todas las consolas
            $datosConsolas = $consolas->selectAll();

            $query = $juegos->selectEspecifico('id_consola', 3);

            // Paginacion
            // Cuenta los artículos que hay en nuestra base de datos
            $filas = count($query);
            
            // Elementos por página
            $articulosPorPagina = 10;

            // Calcula cuantas páginas necesitamos
            $paginas = ceil($filas/$articulosPorPagina);

            // Esta variable nos sirve para saber desde que número iniciamos el limite de juegos
            $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
            $iniciar = ($pagina - 1) * $articulosPorPagina;


            // Recoge los datos con el limite de Elementos que queremos en pantalla
            $result = $juegos->selectLimit('id_consola', 3, $iniciar, $articulosPorPagina);

            $router->render('/juegos/Nintendo Switch', [
                'datosConsolas' => $datosConsolas,
                'paginas' => $paginas,
                'result' => $result
            ]);
        }

        // Muestra a los usuarios los juegos de PC
        public static function pc(Router $router){
            // Instancia la clase
            $consolas = new Consolas();
            $juegos = new Juegos();

            // Recoge todas las consolas
            $datosConsolas = $consolas->selectAll();

            $query = $juegos->selectEspecifico('id_consola', 4);

            // Paginacion
            // Cuenta los artículos que hay en nuestra base de datos
            $filas = count($query);
            
            // Elementos por página
            $articulosPorPagina = 10;

            // Calcula cuantas páginas necesitamos
            $paginas = ceil($filas/$articulosPorPagina);

            // Esta variable nos sirve para saber desde que número iniciamos el limite de juegos
            $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
            $iniciar = ($pagina - 1) * $articulosPorPagina;


            // Recoge los datos con el limite de Elementos que queremos en pantalla
            $result = $juegos->selectLimit('id_consola', 4, $iniciar, $articulosPorPagina);

            $router->render('/juegos/PC', [
                'datosConsolas' => $datosConsolas,
                'paginas' => $paginas,
                'result' => $result
            ]);
        }

        // Muestra al admin los juegos de PS5
        public static function verPS5(Router $router){
            // Instancia la clase
            $juegos = new Juegos();

            // Recoge los datos de todas las consolas
            $datosJuegos = $juegos->selectAll();

            $router->renderAdmin('/admin/juegos/verJuegosPS5', [
                'datosJuegos' => $datosJuegos
            ]);
        }

        // Muestra al admin los juegos de Xbox
        public static function verXbox(Router $router){
            // Instancia la clase
            $juegos = new Juegos();

            // Recoge los datos de todas las consolas
            $datosJuegos = $juegos->selectAll();

            $router->renderAdmin('/admin/juegos/verJuegosXboxSeries', [
                'datosJuegos' => $datosJuegos
            ]);
        }

        // Muestra al admin los juegos de nintendo
        public static function verNintendo(Router $router){
            // Instancia la clase
            $juegos = new Juegos();

            // Recoge los datos de todas las consolas
            $datosJuegos = $juegos->selectAll();

            $router->renderAdmin('/admin/juegos/verJuegosNintendo', [
                'datosJuegos' => $datosJuegos
            ]);
        }

        // Muestra al admin los juegos de PC
        public static function verPC(Router $router){
            // Instancia la clase
            $juegos = new Juegos();

            // Recoge los datos de todas las consolas
            $datosJuegos = $juegos->selectAll();

            $router->renderAdmin('/admin/juegos/verJuegosPC', [
                'datosJuegos' => $datosJuegos
            ]);
        }

        // Crea videojuegos
        public static function addJuegos(Router $router){
            // Instancia la clase
            $juegos = new Juegos();

            // Obtiene los datos de todas las consolas
            $queryConsolas =  Consolas::selectAll();

            // Almacena los errores
            $errores = Juegos::getErrores();

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
		
                // Recoge los datos del formulario
                $juegos = new Juegos($_POST + $_FILES);

                // Comprueba si ya existe un juego con ese nombre para esa consola
                $idConsola = intval($juegos->id_consola);
                $queryExiste = $juegos->selectEspecificoDoble('nombreJuego', 'id_consola',  "'$juegos->nombreJuego'", $idConsola);
                
                if(count($queryExiste) == 0){
                    // Crea la carpeta donde se almacenan las fotos en caso de que aún no exsitan
                    $carpetaImagenes = '../public/build/img/';
        
                    if(!is_dir($carpetaImagenes)){
                        mkdir($carpetaImagenes);
                    }
        
                    // Genera un nombre a cada imagen
                    $nombreImagen = $juegos->fotoJuego['name'];
        
                    //Realiza resize
                    if($juegos->fotoJuego['tmp_name']){
                        $image = Image::make($juegos->fotoJuego['tmp_name']);
                        $juegos->setImagen($nombreImagen);
                    }
            
                    // Valida que no haya errores
                    $errores = $juegos->validar();

                    if(empty($errores)){
                        // Subir la imagen
                        $image->save($carpetaImagenes . $nombreImagen);

                        // Inserta los datos del juego en la base de datos
                        $query = $juegos->guardarAutoincremental('id_juego');
            
                        if($query){
                            if($queryConsolas[0]['id_consola'] == 1){
                                header('Location: /admin/juegos/verJuegosPS5');
                            } elseif($queryConsolas[0]['id_consola'] == 2){
                                header('Location: /admin/juegos/verJuegosXboxSeries');
                            } elseif($queryConsolas[0]['id_consola'] == 3){
                                header('Location: /admin/juegos/verJuegosNintendo');
                            } elseif($queryConsolas[0]['id_consola'] == 4){
                                header('Location: /admin/juegos/verJuegosPC');
                            }
                        }
                    }
                } else{
                    // Guarda el error en el array de errores
                    $errores['juegoExiste'] = 'Ya existe ese juego en esa consola';
                }
            }

            $router->renderAdmin('/admin/juegos/addJuegos', [
                'errores' => $errores,
                'queryConsolas' => $queryConsolas
            ]);
        }

        public static function borrarJuegos(Router $router){
            // Instancia la clase
            $juegos = new Juegos();

            // Recoge el id del juego seleccionado de la url
            $idJuego = $_POST['id_juego'];

            // Coge todos los datos del juego seleccionado
            $query = $juegos->selectEspecifico('id_juego', $idJuego);

            if(count($query) !== 0){

                foreach($query as $datosJuego){

                    // Almacena el id del juego seleccionado
                    $id = $datosJuego['id_juego'];

                    // Elimina la foto del directorio donde se almacena
                    $nombreFoto = $juegos->fotoJuego;
                    unlink("../../build/img/$nombreFoto");

                    // Borra el juego
                    $query = $juegos->deleteEspecifico('id_juego', $id);

                    // Redirecciona a la página de ver los juegos
                    $idConsola = $datosJuego['id_consola'];

                    if($idConsola == 1){
                        header('Location: /admin/juegos/verJuegosPS5');
                    } elseif($idConsola == 2){
                        header('Location: /admin/juegos/verJuegosXboxSeries');
                    } else if($idConsola == 3){
                        header('Location: /admin/juegos/verJuegosNintendo');
                    } else if($idConsola == 4){
                        header('Location: /admin/juegos/verJuegosPC');
                    }
                }
            } else{
                // Redirecciona a la página de ver los juegos
                if($query[0]['id_consola'] == 1){
                    header('Location: /admin/juegos/verJuegosPS5');
                } elseif($query[0]['id_consola'] == 2){
                    header('Location: /admin/juegos/verJuegosXboxSeries');
                } else if($query[0]['id_consola'] == 3){
                    header('Location: /admin/juegos/verJuegosNintendo');
                } else if($query[0]['id_consola'] == 4){
                    header('Location: /admin/juegos/verJuegosPC');
                }
            }
        }

        // Edita los juegos
        public static function editarJuegos(Router $router){
            // Instancia la clase
            $juegos = new Juegos();

            if($_SERVER['REQUEST_METHOD'] === 'GET'){
                // Recoge el id de la url
                $idJuego = $_GET['id_juego'];

                // Recoge los datos del juego seleccionado
                $juegos = $juegos->selectEspecifico('id_juego', $idJuego);
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Instancia la clase
                $juegos = new Juegos($_POST);

                // Pasa los id a entero
                $idJuego = intval($juegos->id_juego);
                $idConsola = intval($juegos->id_consola);

                // Almacena los datos actualizados
                $datosJuego = [
                    'id_juego' => $idJuego,
                    'nombreJuego' => $juegos->nombreJuego,
                    'precioJuego' => $juegos->precioJuego,
                    'id_consola' => $idConsola
                ];
                
                // Actualiza los datos
                $query = $juegos->update('id_juego', $datosJuego, $datosJuego['id_juego']);

                // Redirecciona a la página de ver los juegos
                if($query){
                    if($idConsola == 1){
                        header('Location: /admin/juegos/verJuegosPS5');
                    } elseif($idConsola == 2){
                        header('Location: /admin/juegos/verJuegosXboxSeries');
                    } else if($idConsola == 3){
                        header('Location: /admin/juegos/verJuegosNintendo');
                    } else if($idConsola == 4){
                        header('Location: /admin/juegos/verJuegosPC');
                    }
                }
            }

            $router->renderAdmin('/admin/juegos/editarJuegos', [ 
                'juegos' => $juegos,
            ]);
        }
    }
?>  