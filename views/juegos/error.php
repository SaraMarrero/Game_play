<?php
	// Recoge los datos del usuario logueado
	if(isset($_SESSION['usuario'])){
        $usuario = unserialize($_SESSION['usuario']);
    }

	// Muestra el header adaptado dependiendo si es admin o usuario normal
	$inicio = false;
	$ps5 = false;
	$xbox = false;
	$nintendo = false;
	$pc = false;
	$footer = true;
?>

<link rel="stylesheet" href="/build/css/404.css">

<main class="bg-gray-300">
    <div>
        <section class="msg">
            <h1>404</h1>
            <h2>Página en mantenimiento</h2>
        </section>

        <section class="connected">
            <img src="/build/img/404.png" alt="404" class="img">
        </section>

        <section class="buttonVolver">
        <a href="/index" class="bg-purple-600 text-white p-2 rounded-lg border-2 border-purple-950 m-2">Inicio</a>
        </section>
    </div>
</main>

<?php 
	$inicio2 = false;
	$ps52 = false;
	$xbox2 = false;
	$nintendo2 = false;
	$pc2 = false;
	$footer2 = true;
?>