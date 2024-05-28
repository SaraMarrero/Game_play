<?php
    namespace Controllers;

    use MVC\Router;
    use Model\Consolas;

    session_start();

    class ConsolasController{
        
        // Muestra las consolas
        public static function verConsolas(Router $router){
            // Instancia la clase
            $consolas = new Consolas();

            // Recoge los datos de todas las consolas
            $datosConsolas = $consolas->selectAll();

            $router->renderAdmin('/admin/consolas/verConsolas', [
                'datosConsolas' => $datosConsolas
            ]);
        }

        // Crea consolas
        public static function addConsolas(Router $router){
            $errores = Consolas::getErrores();

            if($_SERVER['REQUEST_METHOD'] === 'POST'){

                // Almacena los datos
                $consola = new Consolas($_POST);
        
                // Array para los errores
                $errores = $consola->validar();
        
                // Comprueba que no haya errores e inserta los datos en la base de datos
                if(empty($errores)){
                    $query = $consola->guardarAutoincremental('id_consola');
        
                    if($query){
                        header('location: /admin/consolas/verConsolas');
                    }
                }
            }

            $router->renderAdmin('/admin/consolas/addConsolas', [
                'errores' => $errores
            ]);
        }

         // Borra consolas
        public static function borrarConsolas(Router $router){
            // Instancia la clse
            $consolas = new Consolas();

            // Recoge el id de la consola seleccionada de la url
            $idConsola = $_POST['id_consola'];

            // Coge todos los datos de la consola seleccionada
            $query = $consolas->selectEspecifico('id_consola', $idConsola);

            if(count($query) !== 0){

                foreach($query as $datosConsola){
                    // Almacena el id de la consola seleccionada
                    $id = $datosConsola['id_consola'];
                
                    // Borra la consola
                    $query = $consolas->deleteEspecifico('id_consola', $id);

                    if($query){
                        // Redirecciona a la página de ver las consolas
                        header('Location: /admin/consolas/verConsolas');
                    }
                }
            }
        } 
    }
?>