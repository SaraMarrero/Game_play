<main class="bg-gray-200 h-screen w-4/5">
	<h1 class="text-center p-6 font-bold text-2xl">Consolas</h1>

	<div class="relative overflow-x-auto w-4/5 mx-auto">
		<table class="w-full text-sm text-left text-gray-500 my-4">
			<thead class="text-xs text-gray-700 uppercase bg-gray-100">
				<tr>
					<th scope="col" class="px-6 py-3 text-center">Id_consola</th>
					<th scope="col" class="px-6 py-3 text-center">Nombre</th>
					<th scope="col" class="px-6 py-3 text-center">Acciones</th>
				</tr>
			</thead>
			<tbody>

			<?php 
				// Valida que haya consolas
				if(count($datosConsolas) !== 0){
					foreach($datosConsolas as $consola){ 
			?>								
					<!-- Imprime los datos de cada consola -->
					<tr class="bg-white dark:bg-gray-800">
						<td class="px-6 py-4 text-center"> <?php echo $consola['id_consola']; ?> </td>
						<td class="px-6 py-4 text-center"> <?php echo $consola['nombreConsola']; ?> </td>
						<td class="px-6 py-4 text-center">
							<form method="POST" action="/admin/consolas/borrarConsolas" enctype="multipart/form-data">
                                <input type="hidden" name="id_consola" value="<?php echo $consola['id_consola']; ?>">
                                <input type="submit" class="bg-red-300 p-2 rounded-lg m-2 border-2 border-red-500 md:inline-block w-full md:w-auto sm:inline-block w-full sm:w-auto" id="buttonBorrar" value="Eliminar" onclick="return confirm('¿Está seguro de que quiere eliminar <?php echo $consola['nombreConsola']; ?>? Esta acción no se puede deshacer.');">
                            </form>
						</td>
					</tr>
				</tbody>		
			<?php
					}
				} 
			?>
		</table>
	</div>

	<!-- Botón para volver al index del admin -->
	<div class=" w-4/5 mx-auto mt-5">
		<a href="/admin/index" class="bg-purple-600 p-3 text-white rounded-lg border-2 border-pruple-900 hover:bg-purple-800" id="buttonUsuario">Volver</a>
	</div>

</main>