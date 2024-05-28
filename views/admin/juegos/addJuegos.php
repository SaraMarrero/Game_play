<main class="bg-gray-200 h-screen w-4/5">
    <h1 class="text-center p-5 font-bold text-2xl">Añadir juegos</h1>
    
	<div class="mx-auto w-1/2">
		<form action="/admin/juegos/addJuegos" method="POST" enctype="multipart/form-data">
			<div class="mb-6">
				<label for="fotoJuego" class="block mb-2 text-sm font-medium text-gray-900">Foto juego</label>
                <input type="file" id="fotoJuego" name="fotoJuego" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" accept="image/jepg, image/png">
				<?php echo isset($errores['fotoJuego']) ? $errores['fotoJuego'] : ''; ?>
			</div>

			<div class="mb-6">
				<label for="nombreJuego" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
				<input type="text" id="nombreJuego" name="nombreJuego" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php  ?>">
				<?php echo isset($errores['nombreJuego']) ? $errores['nombreJuego'] : ''; ?>
			</div>

			<div class="mb-6">
				<label for="precioJuego" class="block mb-2 text-sm font-medium text-gray-900">Precio</label>
				<input type="number" id="precioJuego" name="precioJuego" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php  ?>">
				<?php echo isset($errores['precioJuego']) ? $errores['precioJuego'] : ''; ?>
			</div>

			<div class="mb-6">
			<label for="idConsola" class="block mb-2 text-sm font-medium text-gray-900">Consola</label>
				<select name="id_consola" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
					<option value="">--Seleccione--</option>
					<?php
						// Muestra las consolas
						foreach($queryConsolas as $consola){
							echo "<option " . ($consola === $consola['id_consola'] ? 'selected' : ' ') . "value='" . $consola['id_consola'] . "'>" . $consola['nombreConsola'] . "</option>";
						}
					?>
				</select>
				<?php echo isset($errores['id_consola']) ? $errores['id_consola'] : ''; ?>
			</div>

			<!-- Imprime fallo en caso de existe el juego -->
			<p class="text-red-500 mb-3"><?php echo isset($errores['juegoExiste']) ? $errores['juegoExiste'] : '' ?></p>

			<!-- Actualizo el juego -->
			<button type="submit " id="crearJuego" name="crearJuego" class="text-white bg-purple-600 hover:bg-purple-800  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Crear</button>
		
			<!-- Botón para volver al index del admin -->
			<a href="/admin/index" class="text-white bg-purple-600 hover:bg-purple-800  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Volver</a>
		</form>
	</div>
</main>