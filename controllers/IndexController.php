<?php 
    namespace Controllers;
    use MVC\Router;
    use Model\Consolas;

    session_start();

    class IndexController{

        // Index de un usuario normal
        public static function index(Router $router){
            $consolas = new Consolas();

            // Recoge todas las consolas
            $datosConsolas = $consolas->selectAll();

            $router->render('/index', [
                'datosConsolas' => $datosConsolas
            ]);
        }

        // Index Admin
        public static function indexAdmin(Router $router){
            $router->renderAdmin('/admin/index');
        }
    }