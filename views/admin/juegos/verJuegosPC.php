<main class="bg-gray-200 w-4/5">
	<h1 class="text-center p-6 font-bold text-2xl">Juegos para PC</h1>

	<!-- Botón para volver al índice del admin -->
	<div class="w-full sm:w-4/5 mx-auto text-right">
		<a href="/admin/index" class="bg-purple-600 p-2 text-white rounded-lg border-2 border-purple-900 inline-block hover:bg-purple-800" id="buttonUsuario">Volver</a>
	</div>

	<div class="relative overflow-x-auto md:w-4/5 sm:w-full mx-auto">
		<table class="w-full text-sm text-left text-gray-500 my-4">
			<thead class="text-xs text-gray-700 uppercase bg-gray-100">
				<tr>
					<th scope="col" class="px-1 text-center">Id_juego</th>
					<th scope="col" class="px-3 sm:px-6 py-3 text-center">Foto</th>
					<th scope="col" class="px-3 sm:px-6 py-3 text-center">Nombre</th>
					<th scope="col" class="px-3 sm:px-6 py-3 text-center">Precio</th>
					<th scope="col" class="text-center">Id_consola</th>
					<th scope="col" class="px-3 sm:px-6 py-3 text-center">Acciones</th>
				</tr>
			</thead>
			<tbody>

			<?php 
				// Valida que haya juegos registrados
				if(count($datosJuegos) !== 0){
					foreach($datosJuegos as $juego){
						if ($juego['id_consola'] == 4) {
			?>
							<!-- Imprime los datos de cada juego -->
							<tr class="bg-white">
								<td class="px-3 sm:px-6 py-4 text-center"><?php echo $juego['id_juego']; ?></td>
								<td class="px-3 sm:px-6 py-4 text-center w-40">
									<img src="/build/img/<?php echo $juego['fotoJuego']; ?>" alt="<?php echo $juego['fotoJuego']; ?>" class="w-full">
								</td>
								<td class="px-3 sm:px-6 py-4 text-center"><?php echo $juego['nombreJuego'];  ?></td>
								<td class="px-3 sm:px-6 py-4 text-center"><?php echo $juego['precioJuego'];  ?>€</td>
								<td class="px-3 sm:px-6 py-4 text-center"><?php echo $juego['id_consola']; ?></td>
								<td class="px-3 sm:px-6 py-4 text-center">
									<!-- Pasa el id del juego por la URL -->
									<form method="POST" action="/admin/juegos/borrarJuegos" enctype="multipart/form-data">
										<input type="hidden" name="id_juego" value="<?php echo $juego['id_juego']; ?>">
										<input type="submit" class="bg-red-300 p-2 rounded-lg m-2 border-2 border-red-500 md:inline-block w-full md:w-auto sm:inline-block w-full sm:w-auto" id="buttonBorrar" value="Eliminar" onclick="return confirm('¿Está seguro de que quiere eliminar <?php echo $consola['nombreConsola']; ?>? Esta acción no se puede deshacer.');">
									</form>

									<form method="GET" action="/admin/juegos/editarJuegos" enctype="multipart/form-data">
										<input type="hidden" name="id_juego" value="<?php echo $juego['id_juego']; ?>">
										<input type="submit" class="bg-blue-300 p-2 rounded-lg m-2 border-2 border-blue-500 inline-block w-full sm:w-auto" id="buttonEditar" value="Editar">
									</form>
								</td>
							</tr>
			<?php 
						}
					}
				} 
			?>
			</tbody>
		</table>
	</div>
</main>