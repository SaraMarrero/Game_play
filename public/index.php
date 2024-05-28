<?php
    require_once __DIR__ . '/../includes/app.php';

    use MVC\Router;
    use Controllers\IndexController;
    use Controllers\LoginRegisterController;
    use Controllers\UsuarioController;
    use Controllers\ConsolasController;
    use Controllers\JuegosController;
    use Controllers\CarritoController;
    use Controllers\PorcentajesController;

    $router = new Router();

    // Redireccionar a /index cuando se accede a la raíz del sitio
    $router->get('/', function () {
        header('Location: /index');
        exit();
    });

    // Index Controller //
    $router->get('/index', [IndexController::class, 'index']);
    $router->get('/admin/index', [IndexController::class, 'indexAdmin']);

    // LoginRegister Controller //
    $router->get('/login_register/register', [LoginRegisterController::class, 'register']);
    $router->post('/login_register/register', [LoginRegisterController::class, 'register']);
    $router->get('/login_register/login', [LoginRegisterController::class, 'login']);
    $router->post('/login_register/login', [LoginRegisterController::class, 'login']);
    $router->get('/usuario/signOut', [LoginRegisterController::class, 'signOut']);

    // UsuarioController //
    $router->get('/usuario/perfil', [UsuarioController::class, 'perfilUser']);
    $router->get('/usuario/borrarUsuario', [UsuarioController::class, 'borrarUsuario']);
    $router->get('/usuario/editarPerfil', [UsuarioController::class, 'editarPerfil']);
    $router->post('/usuario/editarPerfil', [UsuarioController::class, 'editarPerfil']);
    $router->get('/admin/usuario/perfil', [UsuarioController::class, 'perfilAdmin']);
    $router->get('/admin/usuario/verUsuarios', [UsuarioController::class, 'verUsuarios']);

    // ConsolasController //
    $router->get('/admin/consolas/verConsolas', [ConsolasController::class, 'verConsolas']);
    $router->get('/admin/consolas/addConsolas', [ConsolasController::class, 'addConsolas']);
    $router->post('/admin/consolas/addConsolas', [ConsolasController::class, 'addConsolas']);
    $router->post('/admin/consolas/borrarConsolas', [ConsolasController::class, 'borrarConsolas']);


    // JuegosController //
    $router->get('/juegos/Play Station 5', [JuegosController::class, 'play']);
    $router->get('/juegos/Xbox Series', [JuegosController::class, 'xbox']);
    $router->get('/juegos/Nintendo Switch', [JuegosController::class, 'nintendo']);
    $router->get('/juegos/PC', [JuegosController::class, 'pc']);

    $router->get('/admin/juegos/verJuegosPS5', [JuegosController::class, 'verPS5']);
    $router->get('/admin/juegos/verJuegosXboxSeries', [JuegosController::class, 'verXbox']);
    $router->get('/admin/juegos/verJuegosNintendo', [JuegosController::class, 'verNintendo']);
    $router->get('/admin/juegos/verJuegosPC', [JuegosController::class, 'verPC']);

    $router->get('/admin/juegos/addJuegos', [JuegosController::class, 'addJuegos']);
    $router->post('/admin/juegos/addJuegos', [JuegosController::class, 'addJuegos']);
    $router->post('/admin/juegos/borrarJuegos', [JuegosController::class, 'borrarJuegos']);
    $router->get('/admin/juegos/editarJuegos', [JuegosController::class, 'editarJuegos']);
    $router->post('/admin/juegos/editarJuegos', [JuegosController::class, 'editarJuegos']);

    // CarritoController //
    $router->get('/carrito/addCarrito', [CarritoController::class, 'addCarrito']);
    $router->post('/carrito/addCarrito', [CarritoController::class, 'addCarrito']);
    $router->get('/carrito/addCantidadCarrito', [CarritoController::class, 'addCantidadCarrito']);
    $router->get('/carrito/removeElementCarrito', [CarritoController::class, 'removeElementCarrito']);
    $router->get('/carrito/removeCantidadCarrito', [CarritoController::class, 'removeCantidadCarrito']);
    $router->get('/carrito/vaciarCarrito', [CarritoController::class, 'vaciarCarrito']);
    $router->get('/juegos/error', [CarritoController::class, 'error']);


    // Porcentajes //
    $router->get('/admin/porcentaje/porcentajeJuegos', [PorcentajesController::class, 'porcentajeJuegos']);


    $router->comprobarRutas();