<?php
    namespace Controllers;

    use MVC\Router;
    use Model\Carrito;
    use Model\Consolas;

    session_start();

    class CarritoController{
        // Añade elementos al carrito de compras
        public static function addCarrito(Router $router){
            
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                // Recoge los datos 
                $carrito = new Carrito($_POST);
        
                // Valida que no exista esa compra
                $idJuego = intval($carrito->id_juego);
                $idConsola = intval($carrito->id_consola);
        
                $queryDatos = $carrito->selectEspecificoDoble('id_juego', 'id_consola', $idJuego, $idConsola);
        
                // Si no existe lo añade
                if(count($queryDatos) == 0){
                    // Inserta los datos en la base de datos
                    $queryInsert = $carrito->guardarAutoincremental('id_compra');
                
                } else{
                    // Si ya el producto actualiza la cantidad
                    foreach($queryDatos as $datosJuego){
                        $cantidadDatos = intval($datosJuego['cantidad']);
                    }
        
                    $cantidadActual = $cantidadDatos+1;
        
                    $queryUpdate = $carrito->updateEspecifico('cantidad', $cantidadActual, 'id_compra', $queryDatos[0]['id_compra']);
                }
        
                // Selecciona todos los datos del carrito
                $querySelect = $carrito->selectAll();
        
                $result = [];
        
                foreach($querySelect as $datos){
                    $result[] = $datos;
                }
        
                // Almacena en una sesión los datos del carrito
                $_SESSION['carrito'] = $result;
        
                // Redirige después de enviar la respuesta al cliente
                $_SESSION['redirect'] = true;
            }
        
            // Si se ha configurado la redirección, realiza la redirección y sal de la secuencia de comandos
            if(isset($_SESSION['redirect']) && $_SESSION['redirect'] === true) {
                unset($_SESSION['redirect']);
                
                if(isset($_SERVER['HTTP_REFERER'])) {
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                } 
            }
        
            $carrito = json_encode($_SESSION['carrito']);
            echo $carrito;
        }

        // Suma cantidad a elementos que estan en el carrito
        public static function addCantidadCarrito(Router $router){
            // Instancia la clase
            $carrito = new Carrito();

            // Recoge las id de la url
            $idCompra = $_GET['id_compra'];

            // Valida que no exista esa compra
            $queryDatos = $carrito->selectEspecifico('id_compra', $idCompra);

            if(count($queryDatos) !== 0){
                // Recoge la cantidad almacenada
                foreach($queryDatos as $datosJuegos){
                    $cantidadDatos = intval($datosJuegos['cantidad']);
                }

                // Aumenta la cantidad
                $cantidadActual = $cantidadDatos+1;

                $queryUpdate = $carrito->updateEspecifico('cantidad', $cantidadActual, 'id_compra', $idCompra);
            }

            // Selecciona todos los datos del carrito
            $querySelect = $carrito->selectAll();

            $result = [];

            foreach($querySelect as $datos){
                $result[] = $datos;
            }

            // Almacena en una sesión los datos del carrito
            $_SESSION['carrito'] = $result;

            // Redirige después de enviar la respuesta al cliente
            $_SESSION['redirect'] = true;


            // Si se ha configurado la redirección, realiza la redirección y sal de la secuencia de comandos
            if(isset($_SESSION['redirect']) && $_SESSION['redirect'] === true) {
                unset($_SESSION['redirect']); 
                
                if(isset($_SERVER['HTTP_REFERER'])) {
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                } 
            }

            $carrito = json_encode($_SESSION['carrito']);
            echo $carrito;
        }

        // Disminuye la cantidad a elementos que estan en el carrito
        public static function removeCantidadCarrito(Router $router){
                // Instancia la clase
            $carrito = new Carrito();

            // Recoge las id de la url
            $idCompra = $_GET['id_compra'];

            // Selecciona el elemento del carrito con esas id
            $query = $carrito->selectEspecifico('id_compra', $idCompra);

            if(count($query) !== 0){
                // Elimina el juego de la base de datos
                foreach($query as $datosJuego){
                    $idCompraActual = intval($datosJuego['id_compra']);
                }

                $queryDelete = $carrito->deleteEspecifico('id_compra', $idCompraActual);
            }

            // Selecciona los datos del carrito
            $querySelect = $carrito-> selectAll();

            $result = [];

            foreach($querySelect as $datos){
                $result[] = $datos;
            }

            // Elimina los elementos actuales de la sesión para luego actualizarlos
            unset($_SESSION['carrito']);
            $_SESSION['carrito'] = $result;

            // Redirige después de enviar la respuesta al cliente
            $_SESSION['redirect'] = true;


            // Si se ha configurado la redirección, realiza la redirección y sal de la secuencia de comandos
            if(isset($_SESSION['redirect']) && $_SESSION['redirect'] === true) {
                unset($_SESSION['redirect']); 
                
                if(isset($_SERVER['HTTP_REFERER'])) {
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                } 
            }

            $carrito = json_encode($_SESSION['carrito']);
            echo $carrito;
        }

        // Borra un elemento del carrito
        public static function removeElementCarrito(Router $router){
            // Instancia la clase
            $carrito = new Carrito();

            // Recoge las id de la url
            $idCompra = $_GET['id_compra'];

            // Selecciona el elemento del carrito con esas id
            $query = $carrito->selectEspecifico('id_compra', $idCompra);

            if(count($query) !== 0){
                // Almacena la cantidad actual
                foreach($query as $datosJuego){
                    $juego = intval($datosJuego['cantidad']);
                }
                
                if($juego > 1){
                    // Actualiza la cantidad en la base de datos
                    $cantidadActual = $juego-1;

                    $queryUpdate = $carrito->updateEspecifico('cantidad', $cantidadActual, 'id_compra', $idCompra);
                } else{
                    // Elimina el juego de la base de datos
                    $queryDelete = $carrito->deleteEspecifico('id_compra', $idCompra);
                }
            }

            // Selecciona los datos del carrito
            $querySelect = $carrito->selectAll();

            $result = [];

            foreach($querySelect as $datos){
                $result[] = $datos;
            }

            // Almacena en una sesión los datos del carrito
            $_SESSION['carrito'] = $result;

            // Redirige después de enviar la respuesta al cliente
            $_SESSION['redirect'] = true;


            // Si se ha configurado la redirección, realiza la redirección y sal de la secuencia de comandos
            if(isset($_SESSION['redirect']) && $_SESSION['redirect'] === true) {
                unset($_SESSION['redirect']); 
                
                if(isset($_SERVER['HTTP_REFERER'])) {
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                } 
            }

            $carrito = json_encode($_SESSION['carrito']);
            echo $carrito;
        }

        // Elimina todos los elementos del carrito
        public static function vaciarCarrito(){
            // Instancia la clase
            $carrito = new Carrito();

            // Selecciona el elemento del carrito con esas id
            $query = $carrito->selectAll();

            if(count($query) !== 0){
                $carrito->delete();

                // Vacía la sesión del carrito
                unset($_SESSION['carrito']);

                if(isset($_SERVER['HTTP_REFERER'])) {
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                } 
            }
        }

        public static function error(Router $router){
            $consolas = new Consolas();

            // Recoge todas las consolas
            $datosConsolas = $consolas->selectAll();

            $router->render('/juegos/error', [
                'datosConsolas' => $datosConsolas
            ]);
        }

    }