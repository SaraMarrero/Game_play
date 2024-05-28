<div class="wrapper fadeInDown">
    <div id="formContent">
        <h2 class="active">Iniciar Sesión</h2>
        <h2 class="inactive underlineHover"><a href="/login_register/register">Registrarse</a></h2>

        <!-- Login Form -->
        <form method="POST">
            <!-- Email -->
            <input type="text" id="emailUsuario" class="fadeIn second" name="emailUsuario" placeholder="Email">
            <p class="text-red-500"><?php echo isset($errores['email']) ? $errores['email'] : ''; ?></p>

            <!-- Contraseña -->
            <div class="flex justify-center items-center">
                <input type="password" id="passwordUsuario" class="fadeIn third" name="passwordUsuario" placeholder="·····">
                <img src='../build/img/ocultar.png' class="buttonPassword">
            </div>

            <p class="p"></p>
            <p class="text-red-500"><?php echo isset($errores['password']) ? $errores['password'] : ''; ?></p>

            <p class="text-red-500"><?php echo isset($errores['usuarioNoExiste']) ? $errores['usuarioNoExiste'] : ''; ?></p>
            <p class="text-red-500"><?php echo isset($errores['passwordIncorrecta']) ? $errores['passwordIncorrecta'] : ''; ?></p>

            <!-- Iniciar sesión -->
            <input type="submit" name="login" class="fadeIn fourth" value="Iniciar sesión">
            <a href="/index">Web</a>
        </form>
    </div>
</div>