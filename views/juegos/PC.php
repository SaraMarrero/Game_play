<?php 
	// Valida si existe un $_GET en Play Station 5.php
	if(!$_GET){
		header('Location: /juegos/PC?pagina=1');
	}

	if(isset($_SESSION['usuario'])){
        $usuario = unserialize($_SESSION['usuario']);
    }

	$inicio = false;
	$ps5 = false;
	$xbox = false;
	$nintendo = false;
	$pc = true;
?>

<section class="bg-gradient-to-r from-gray-900 via-purple-600 to-gray-900">
	<main class="w-3/5 m-auto bg-purple-950">
		<h1 class="text-center p-5 font-bold text-3xl text-gray-200">PC</h1>

		<div class=" rounded overflow-hidden flex flex-wrap justify-center">
			<?php
			// Aqui tengo que recoger los datos de la segunda consulta para solo mostrar los X juegos
				foreach($result as $juego){ ?>
					<div class="rounded shadow-lg m-4 w-50 p-4 bg-gray-300">
						<img class="w-40 m-auto" src="../build/img/<?php echo $juego['fotoJuego']; ?>" alt="<?php echo $juego['nombreJuego'] ?>">
						
						<div class="px-6 py-4">
							<div class="font-bold text-xl mb-3 flex flex-wrap justify-center"><?php echo $juego['nombreJuego']; ?></div>
							<div class="text-xl mb-2 text-center"><?php echo $juego['precioJuego']; ?>€</div>
							<div class="text-center mt-2">⭐⭐⭐⭐⭐</div>
						</div>
						
						<!-- Se agrega al carrito solo si está logueado -->
						<?php if(isset($usuario)) { 
							foreach($usuario as $datos){
						?>
							<form method="POST" action="/carrito/addCarrito" id="formAdd">
								<!-- Agrega inputs hidden para cada dato que deseas pasar -->
								<input type="hidden" name="dniUsuario" value="<?php echo $datos['dniUsuario'] ?>">
								<input type="hidden" name="id_juego" value="<?php echo intval($juego['id_juego']) ?>">
								<input type="hidden" name="id_consola" value="<?php echo intval($juego['id_consola']) ?>">
								<input type="hidden" name="nombreJuego" value="<?php echo $juego['nombreJuego'] ?>">
								<input type="hidden" name="fotoJuego" value="<?php echo $juego['fotoJuego'] ?>">
								<input type="hidden" name="precioJuego" value="<?php echo $juego['precioJuego'] ?>">
								<input type="hidden" name="cantidad" value="<?php echo $juego['cantidad'] = 1; ?>">
							
								<div class="px-6 py-4 text-center">
									<span class="inline-block bg-green-300 rounded-xl px-3 py-5 text-sm font-semibold text-gray-700 mr-1 mb-1 hover:bg-green-500">
										<button type="submit" class='agregarCarrito' name="addCarrito">Agregar al carrito</button>
									</span>
								</div>
							</form>
						<?php } } ?>
					</div>
			<?php }?>
		</div>

		<!----- PAGINACION ----->
		<div class="flex-1 flex justify-center mr-auto py-5">
			<nav class="content-center">
				<ul class="inline-flex -space-x-px">
					<!-- Veo en que página estoy si es menor o igual que 1 se queda en la misma página, si no se resta 1 -->
					<li>
						<a href="/juegos/PC?pagina=<?php echo $_GET['pagina'] <= 1 ? $_GET['pagina'] : $_GET['pagina']-1; ?>"
							class="bg-white border border-gray-300 text-gray-500 hover:bg-gray-100 hover:text-gray-700 ml-0 rounded-l-lg leading-tight py-2 px-3">Anterior</a>
					</li>

					<?php for($i = 1; $i <= $paginas; $i++){ ?>
						<li <?php echo $_GET['pagina'] == $i ? 'class="font-bold text-purple-900 "' : 'class="text-gray-500"' ?>>
							<a href="/juegos/PC?pagina=<?php echo $i ?>""
								class=" bg-white border border-gray-300 leading-tight py-2 px-3"><?php echo $i ?></a>
						</li>
					<?php } ?>
					<!-- Veo en que página estoy si es mayor o igual que 3 se queda en la misma página, si no se suma 1 -->
					<li>
						<a href="/juegos/PC?pagina=<?php echo $_GET['pagina'] >= $paginas ? $_GET['pagina'] : $_GET['pagina']+1; ?>"
							class="bg-white border border-gray-300 text-gray-500 hover:bg-gray-100 hover:text-gray-700 rounded-r-lg leading-tight py-2 px-3">Siguiente</a>
					</li>
				</ul>
			</nav>

		</div>
	</main>
</section>

<?php
	$inicio2 = false;
	$ps52 = false;
	$xbox2 = false;
	$nintendo2 = false;
	$pc2 = true;
?>