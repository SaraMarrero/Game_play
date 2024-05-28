<?php
	/**
	    * Almacena todas las funciones de unión, validación de formularios y manejo de errores
		* @author Sara Marrero Miranda
		* @category File
		* @version 1.0
		* @package includes
		* 
	*/

    define('TEMPLATES_URL', __DIR__.'/templates');
    define('FUNCIONES_URL', __DIR__.'./funciones.php');

    function incluirTemplate($nombre, $inicio = false, $ps5 = false, $xbox = false, $nintendo = false, $pc = false, $footer = false){
        include TEMPLATES_URL."/$nombre.php";
    }

    // Muestra el mensaje de error en caso de campo inválido
    function mostrarErrores($errores, $campo){
        $alerta = '';
        if(isset($errores[$campo]) && !empty($campo)){
            $alerta = '<p style="color:red;">' . $errores[$campo] . '</p>';
        }
        return $alerta;
    }

    // Elimina los mensaje de error en caso de haberlo
    function borrarErrores(){
        $borradoErrores = false;

        if(isset($_SESSION['errores'])){
            $_SESSION['errores'] = null;
            $borradoErrores = $_SESSION['errores'];
            unset($_SESSION['errores']);
        }

        return $borradoErrores;
    }

    // Elimina los mensaje de error en caso de haberlo de los formularios
    function borrarSesiones(&$sesion){
        $borradoErrores = false;

        if(isset($sesion)){
            $sesion = null;
            $borradoErrores = $sesion;
            unset($sesion);
        }

        return $borradoErrores;
    }

    function debuguear($variable){
        echo '<pre>';
        var_dump($variable);
        echo '</pre>';
        exit;
    }

    function s($html): string {
        // Verifica si $html es nulo y proporciona un valor predeterminado
        $html = $html ?? '';
        
        // Llama a htmlspecialchars con el valor modificado
        $s = htmlspecialchars($html, ENT_QUOTES, 'UTF-8');
        return $s;
    }
?>