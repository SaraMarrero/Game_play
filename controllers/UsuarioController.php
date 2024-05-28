<?php
    namespace Controllers;

    use MVC\Router;
    use Model\Consolas;
    use Model\Usuario;

    session_start();

    class UsuarioController{
        // Muestra los datos del usuario logueado
        public static function perfilUser(Router $router){
            $consolas = new Consolas();

            // Recoge todas las consolas
            $datosConsolas = $consolas->selectAll();

            $router->render('/usuario/perfil', [
                'datosConsolas' => $datosConsolas
            ]);
        }

        // Borra un usuario
        public static function borrarUsuario(Router $router){
            // Instancia la clase
            $usuario = new Usuario();

            // Recoge los datos del usuario logueado
            if(isset($_SESSION['usuario'])){
                $datosUsuario = unserialize($_SESSION['usuario']);
            }

            // Elimina al usuario de la base de datos
            $dniUsuario = $datosUsuario[0]['dniUsuario'];
            $usuario->deleteEspecifico('dniUsuario', "'$dniUsuario'");

            // Elimina la sesión
            session_unset();
            session_destroy();

            // Redirige a la página principal
            header('Location: /index');
        }

        // Edita los datos de un usuario
        public static function editarPerfil(Router $router){
            $usuario = new Usuario();
            $consolas = new Consolas();

            // Recoge todas las consolas
            $datosConsolas = $consolas->selectAll();

            if($_SERVER['REQUEST_METHOD'] === 'GET'){
                $dni = $_GET['dniUsuario'];

                $usuarioActual = $usuario->selectEspecifico('dniUsuario', "'$dni'");
            }

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                // Recoge los datos del formulario
                $usuario = new Usuario($_POST);
                
                // Almacena los datos actulizados
                $datosUsuario = [
                    'dniUsuario' => $usuario->dniUsuario,
                    'nombreUsuario' => $usuario->nombreUsuario,
                    'apellidosUsuario' => $usuario->apellidosUsuario,
                    'emailUsuario' => $usuario->emailUsuario,
                    'passwordUsuario' => $usuario->passwordUsuario
                ];

                // Actualiza el usuario en la base de datos
                $dniUsuario = $datosUsuario['dniUsuario'];
                $update = $usuario->update('dniUsuario', $datosUsuario, "'$dniUsuario'");

                if($update){
                    // Recoge los datos del usuario
                    $selectUsuario = $usuario->selectEspecifico('dniUsuario', "'$dniUsuario'");
                    
                    // Almacena en una sesión los datos del carrito
                    $_SESSION['usuario'] = serialize($selectUsuario);

                    // Redirecciona a la página de ver perfil
                    header('Location: /usuario/perfil');
                }
            }

            $router->render('/usuario/editarPerfil', [
                'usuarioActual' => $usuarioActual,
                'usuario' => $usuario,
                'datosConsolas' => $datosConsolas
            ]);
        }

        // Muestra todos los usuatios al admin
        public static function verUsuarios(Router $router){
            // Instancia la clase
            $usuarios = new Usuario();

            // Recoge los datos de todas los usuarios
            $datosUsuarios = $usuarios->selectAll();

            $router->renderAdmin('/admin/usuario/verUsuarios', [
                'datosUsuarios' => $datosUsuarios
            ]);
        }

        //  Muestra el perfil del admin
        public static function perfilAdmin(Router $router){
            $router->renderAdmin('/admin/usuario/perfil');
        }
    }
?>