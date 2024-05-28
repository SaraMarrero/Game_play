<main class="h-screen w-4/5">
    <h1 class="text-center my-5 font-bold text-xl">Editar juegos</h1>
    
	<div class="mx-auto w-1/2">
		<form action="/admin/juegos/editarJuegos" method="POST">
			<?php foreach($juegos as $datosJuego){ ?>
				<div class="mb-6">
					<label for="idJuego" class="block mb-2 text-sm font-medium text-gray-900">Id</label>
					<input type="number" id="id_juego" name="id_juego" class="bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo $datosJuego['id_juego']; ?>" readonly>
				</div>

				<div class="mb-6">
					<label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
					<input type="text" id="nombreJuego" name="nombreJuego" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo $datosJuego['nombreJuego']; ?>">
				</div>

				<div class="mb-6">
					<label for="precio" class="block mb-2 text-sm font-medium text-gray-900">Precio</label>
					<input type="num" id="precioJuego" name="precioJuego" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo $datosJuego['precioJuego']; ?>">
				</div>

				<div class="mb-6">
					<label for="idConsola" class="block mb-2 text-sm font-medium text-gray-900">Id_consola</label>
					<input type="number" id="id_consola" name="id_consola" class="bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo $datosJuego['id_consola']; ?>" readonly>
				</div>

				<!-- Actualizo el juego -->
				<button type="submit" class="text-white bg-purple-600 hover:bg-purple-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Actualizar</button>
			
				<!-- Botón para volver al index del admin -->
				<a href="/admin/index" class="text-white bg-purple-600 hover:bg-purple-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Volver</a>
			<?php } ?>
		</form>
	</div>
</main>