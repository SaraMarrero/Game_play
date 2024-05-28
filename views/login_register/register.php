<div class="wrapper fadeInDown">
    <div id="formContent">
        <h2 class="inactive underlineHover"><a href="/login_register/login">Iniciar Sesión</a></h2>
        <h2 class="active">Registrarse</h2>

        <!-- Register Form -->
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <!-- Dni -->
            <input type="text" id="dniUsuario" class="fadeIn second" name="dniUsuario" placeholder="Dni" value="<?php echo s($usuario->dniUsuario); ?>"><br>
            <p class="text-red-500"><?php echo isset($errores['dni']) ? mostrarErrores($errores, 'dni') : ''; ?></p>
            <?php echo isset($errores['dniExiste']) ? mostrarErrores($errores, 'dniExiste') : ''; ?>

            <!-- Nombre de usuario  -->
            <input type="text" id="nombreUsuario" class="fadeIn third" name="nombreUsuario" placeholder="Nombre" value="<?php echo s($usuario->nombreUsuario); ?>"><br>
            <p class="text-red-500"><?php echo isset($errores['nombre']) ? mostrarErrores($errores, 'nombre') : ''; ?></p>

            <!-- Apellidos de usuario -->
            <input type="text" id="apellidosUsuario" class="fadeIn third" name="apellidosUsuario" placeholder="Apellidos" value="<?php echo s($usuario->apellidosUsuario); ?>"><br>
            <p class="text-red-500"><?php echo isset($errores['apellidos']) ? mostrarErrores($errores, 'apellidos') : ''; ?></p>

            <!-- Email -->
            <input type="text" id="emailUsuario" class="fadeIn third" name="emailUsuario" placeholder="Email" value="<?php echo s($usuario->emailUsuario); ?>">
            <p class="text-red-500"><?php echo isset($errores['email']) ? mostrarErrores($errores, 'email') : ''; ?></p>

            <!-- Contraseña -->
            <div class="flex justify-center items-center">
                <input type="password" id="passwordUsuario" class="fadeIn third" name="passwordUsuario" placeholder="·····">
                <img src='../build/img/ocultar.png' class="buttonPassword">
            </div>
            <p class="text-red-500"><?php echo isset($errores['password']) ? mostrarErrores($errores, 'password') : ''; ?></p>

            <!-- Registrarse -->
            <input type="submit" class="fadeIn fourth" name="register" value="Registrarse">
            <a href="/index">Web</a>
        </form>
    </div>
</div>