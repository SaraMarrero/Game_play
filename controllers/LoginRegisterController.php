<?php
    namespace Controllers;

    use MVC\Router;
    use Model\Usuario;

    session_start();

    class LoginRegisterController{
        
        // Registra un usuario
        public static function register(Router $router){
            $usuario = new Usuario();
            $errores = [];

            if($_SERVER['REQUEST_METHOD'] === 'POST'){

                // Recoge los datos del formulario
                $usuario = new Usuario($_POST + ['isRegister' => true]);
        
                // Array para los errores
                $errores = $usuario->validarRegister();
        
                // Comprueba si ya existe el usuario
                $queryDNI = $usuario->selectEspecifico('dniUsuario', "'$usuario->dniUsuario'");
        
                if(count($queryDNI) === 0){
                    // Si no hay errores crea el nuevo usuario
                    if(empty($errores)){
                        $guardarUsuario = $usuario->guardar();
                    
                        if($guardarUsuario){
                            header('location: /login_register/login');
                        } 
                    } 
                } else{
                    // Guarda el aviso de que ya existe ese usuario
                    $errores['dniExiste'] = 'Ya existe un usuario con este dni';
                }
            }

            $router->renderLoginRegister('/login_register/register', [
                'usuario' => $usuario,
                'errores' => $errores
            ]);
        }


        // Loguea al usuario
        public static function login(Router $router){
            // Inicializa la clase
            $usuario = new Usuario();
            $errores = [];

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                // Recoge los datos del formulario
                $usuario = new Usuario($_POST);
        
                // Array para los errores
                $errores = $usuario->validarLogin();
                
                if(empty($errores)){
                    // Comprueba si existe el usuario
                    $queryEmail = $usuario->selectEspecifico('emailUsuario', "'$usuario->emailUsuario'");
                    
                    if(count($queryEmail) !== 0){
                        // Verifica la contraseña
                        $dato = $queryEmail[0];
        
                        $passwordCifrada = password_verify($usuario->passwordUsuario, $dato['passwordUsuario']);
        
                        if($passwordCifrada){
                            // Almacena en una sesión los datos del usuario logueado
                            $_SESSION['usuario'] = serialize($queryEmail);
        
                            // Comprueba si accede un administrador o un usuario normal
                            if($dato['administrador'] == 0){
                                header('Location: /index');
                            } else{
                                header('Location: /admin/index');
                            }
        
                        } else{
                            $errores['passwordIncorrecta'] = "La contraseña es incorrecta";
                        }
                    } else{
                        $errores['usuarioNoExiste'] = "El usuario no existe";
                    }
                }
            }

            $router->renderLoginRegister('/login_register/login', [
                'usuario' => $usuario,
                'errores' => $errores
            ]);
        }

        // Cierra la sesión del usuario logueado
        public static function signOut(Router $router){
            $router->render('/usuario/signOut');
        }
    }
?>