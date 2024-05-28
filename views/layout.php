<?php
    // Recoge los datos del usuario logueado y su carrito de compras
    if(isset($_SESSION['usuario'])){
        $usuario = unserialize($_SESSION['usuario']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../build/css/headerUser.css">
    <title>Index</title>
</head>
<body class="light-mode">
    <header>
        <!---------- MENU NORMAL --------->
        <div class="<?php 
                        if($inicio){
                            echo 'fondo';
                        } elseif($ps5){
                            echo 'bg-gradient-to-r from-gray-900 via-blue-900 to-gray-900';
                        } elseif($xbox){
                            echo 'bg-gradient-to-r from-gray-900 via-green-700 to-gray-900';
                        } elseif($nintendo){
                            echo 'bg-gradient-to-l from-gray-900 via-red-600 to-gray-900';
                        } elseif($pc){
                            echo 'bg-gradient-to-r from-gray-900 via-purple-700 to-gray-900';
                        }  elseif($footer){
                            echo 'gradientFooter';
                        }
                    ?>">
                <nav class="relative px-4 py-4 flex justify-between items-center">
                    <a class="text-3xl text-white font-bold leading-none" href="/index">Game Play</a>

                    <!----- Muestra las consolas en el header ---->
                    <ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
                        <?php
                            // Muestra las consolas
                            if(count($datosConsolas) !== 0){
                                foreach($datosConsolas as $consola){
                                echo "<li><a class='text-sm text-white font-bold' href='/juegos/" . $consola['nombreConsola'] . "'>" . $consola['nombreConsola'] . "</a></li>";
                                }
                            }   
                        ?>
                    </ul>

                    <!----- Botón desplegable del usuario ------>
                    <div class="menu-button ml-auto">
                        <button class="text-white bg-purple-600 hover:bg-purple-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center w-20" type="button">
                            <img src="../build/img/iconoLogin.png" class="h-1/2" width="50%">
                            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>

                        <!----- Información del desplegable ---->
                        <div class="dropdown-options" id="dropdownInformation">

                        <?php
                                // Valida si hay algún usuario logueado
                                if(isset($usuario)) {
                                    foreach($usuario as $login){
                                    // Valida si la persona logueada es usuario normal para mostrar su nombre
                                    if($login['administrador'] == 0){
                        ?>
                                        <div class="px-2 py-3 text-sm text-gray-900">
                                            <div class="font-bold">
                                                <?php echo $login['nombreUsuario']; ?>
                                            </div>
                                        </div>

                                    <!-- Valida si la persona logueada es admin para mostrar su nombre -->
                            <?php 	} else if($login['administrador'] == 1){ ?>

                                        <div class="px-4 py-3 text-sm text-gray-900">
                                            <div class="font-bold">Admin</div>
                                        </div>
                            <?php
                                        }
                                    }
                                }
                            ?>

                            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownInformationButton">
                                <?php if(!isset($_SESSION['usuario'])){ ?>
                                    <li>
                                        <a href="/login_register/register" class="block px-4 py-2 hover:bg-gray-100">Register</a>
                                    </li>

                                    <li>
                                        <a href="/login_register/login" class="block px-4 py-2 hover-bg-gray-100">Login</a>
                                    </li>
                                <?php } else{ ?>
                                    <li>
                                        <a href="/usuario/perfil" class="block px-4 py-2 hover-bg-gray-100">Perfil</a>
                                    </li>

                                    <div class="py-2">
                                        <a href="/usuario/signOut" class="block px-4 py-2 text-sm text-gray-700 hover-bg-gray-100">Sign out</a>
                                    </div>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>

                    <!-- Carrito de compras -->
                    <div class="relative inline-block">
                        <img src="../build/img/carrito.png" class="w-10 m-2 cursor-pointer" id="mostrar-carrito">

                        <div id="carrito" class="hidden absolute mt-2 bg-white border rounded shadow-lg z-10 left-0 transform -translate-x-full origin-left">
                            <!-- Contenido del carrito -->
                            <table id="lista-carrito"">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 text-center">Foto</th>
                                        <th class="px-6 py-3 text-center">Nombre</th>
                                        <th class="px-6 py-3 text-center">Precio</th>
                                        <th class="px-6 py-3 text-center">Cantidad</th>
                                        <th class="px-6 py-3 text-center">🗑️</th>
                                    </tr>
                                </thead>

                                <tbody class="tbody"></tbody>
                            </table>
                        </div>
                    </div>

                    <!----- Buttton menú hamburguesa ----->
                    <div class="lg:hidden">
                        <button class="navbar-burger flex items-center text-black-600 p-3">
                            <svg fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="30px" height="30px">
                                <path d="M 5 8 A 2.0002 2.0002 0 1 0 5 12 L 45 12 A 2.0002 2.0002 0 1 0 45 8 L 5 8 z M 5 23 A 2.0002 2.0002 0 1 0 5 27 L 45 27 A 2.0002 2.0002 0 1 0 45 23 L 5 23 z M 5 38 A 2.0002 2.0002 0 1 0 5 42 L 45 42 A 2.0002 2.0002 0 1 0 45 38 L 5 38 z"/>
                            </svg>
                        </button>
                    </div>

                    <!----- MENU HAMBURGUESA ----->
                    <div class="navbar-menu relative z-50 hidden">
                        <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
                            <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
                                <div class="flex items-center mb-8">
                                    <a class="mr-auto text-3xl font-bold leading-none" href="/index">Game Play</a>
                                    <button class="navbar-close">
                                        <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>

                                <!----- Muestra las consolas en el header ----->
                                <div>
                                    <ul>
                                        <?php
                                            // Muestra las consolas
                                            if(count($datosConsolas) !== 0){
                                                foreach($datosConsolas as $consola){;
                                                    echo "<li class='mb-1'>";
                                                    echo "<a class='block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded' href='/juegos/" . $consola['nombreConsola'] . "'>" . $consola['nombreConsola'] . "</a>";
                                                    echo "</li>";
                                                }
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>   
        </div>
    </header>

    <?php echo $contenido; ?>

        <footer>
            <div class="flex justify-between text-center p-3 items-center text-white 
                <?php   
                    if($inicio2){
                        echo 'fondo';
                    } elseif($ps52){
                        echo 'bg-gradient-to-r from-gray-900 via-blue-900 to-gray-900';
                    } elseif($xbox2){
                        echo 'bg-gradient-to-r from-gray-900 via-green-700 to-gray-900';
                    } elseif($nintendo2){
                        echo 'bg-gradient-to-l from-gray-900 via-red-600 to-gray-900';
                    } elseif($pc2){
                        echo 'bg-gradient-to-r from-gray-900 via-purple-700 to-gray-900';
                    } elseif($footer2){
                        echo 'gradientFooter';
                    }
                ?>
            ">

            <p class="text-xl">Copyright© 2023</p>
            <p class="text-3xl font-bold ">Game Play</p>
            <p class="text-xl">DSW /CRUD

            <?php
                if(isset($_SESSION['usuario'])){
                    foreach($usuario as $datosUsuario){
                        if($datosUsuario['administrador'] == 1){ ?>
                            <a href="/admin/index" class="bg-purple-600 text-white p-2 rounded-lg border-2 border-purple-950 m-2">Admin</a>
            <?php 
                        }
                    }
                }
            ?>
            </p>
        </footer>
        
        <!-- JAVASCRIPT -->
        <script src="../build/js/carrito.js"></script>
        <script src="../build/js/indexUser.js"></script>
        <script src="../build/js/buttonUser.js"></script>
    </body>
</html>