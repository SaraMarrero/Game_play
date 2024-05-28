<?php
    namespace MVC;

    class Router{
        public $rutasGET=[];
        public $rutasPOST=[];
        
        // Define ruta para manejar el get
        public function get($url, $fn){
            $this->rutasGET[$url] = $fn;
        }

        // Define ruta para manejar el post
        public function post($url, $fn){
            $this->rutasPOST[$url] = $fn;
        }

        // Valida si la url existe
        public function comprobarRutas(){
            $urlActual = $_SERVER['PATH_INFO'] ?? '/';
            $metodo = $_SERVER['REQUEST_METHOD'];

            if($metodo === 'GET'){
                $fn = $this->rutasGET[$urlActual] ?? null;
            } else 
            if($metodo === 'POST'){
                $fn = $this->rutasPOST[$urlActual] ?? null;
            }
            
            if($fn){
                //la url existe y hay una función asociada
                call_user_func($fn, $this);
            }else{
                echo "página no encontrada";
            }
        }
        
        // Render del usuario normal
        public function render($view, $datos = []){
            foreach($datos as $key => $value){
                $$key = $value;
            }

            // Inicia la salida
            ob_start();

            include __DIR__."/views/$view.php";

            // Obtiene el cotenido de la salida
            $contenido = ob_get_clean();

            include __DIR__."/views/layout.php";
        }

        // Render de login y del register
        public function renderLoginRegister($view, $datos = []){
            foreach($datos as $key => $value){
                $$key = $value;
            }

            // Inicia la salida
            ob_start();
            include __DIR__."/views/$view.php";

            // Obtiene el cotenido de la salida
            $contenido = ob_get_clean();
            
            include __DIR__."/views/layoutLoginRegister.php";
        }

        // Render del admin
        public function renderAdmin($view, $datos = []){
            foreach($datos as $key => $value){
                $$key = $value;
            }

            // Inicia la salida
            ob_start();
            include __DIR__."/views/$view.php";

            // Obtiene el cotenido de la salida
            $contenido = ob_get_clean();

            include __DIR__."/views/admin/layout.php";
        }
    }