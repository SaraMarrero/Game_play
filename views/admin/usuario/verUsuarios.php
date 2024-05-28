<main class="bg-gray-200 h-screen w-4/5">
	<h1 class="text-center p-6 font-bold text-2xl">Usuarios</h1>

	<?php
		// Valida que haya usuarios registradas
		if(count($datosUsuarios) >= 2){
	?>

		<div class="relative overflow-x-auto w-4/5 mx-auto">
			<table class="w-full text-sm text-left text-gray-500 my-4">
				<thead class="text-xs text-gray-700 uppercase bg-gray-100">
					<tr>
						<th scope="col" class="px-6 py-3 text-center">Dni</th>
						<th scope="col" class="px-6 py-3 text-center">Nombre</th>
						<th scope="col" class="px-6 py-3 text-center">Apellidos</th>
						<th scope="col" class="px-6 py-3 text-center">Email</th>
					</tr>
				</thead>

				<tbody>
				<?php 
					// Recorre las las usuarios para leer sus datos
						foreach($datosUsuarios as $usuario){
						// Valida que solo se muestren los usuarios normales
						if($usuario['administrador'] == 0){
				?>								
						<!-- Imprime los datos de cada usuarios -->
						<tr class="bg-white">
							<td class="px-6 py-4 text-center"> <?php echo $usuario['dniUsuario']; ?> </td>
							<td class="px-6 py-4 text-center"> <?php echo $usuario['nombreUsuario']; ?> </td>
							<td class="px-6 py-4 text-center"> <?php echo $usuario['apellidosUsuario'];  ?> </td>
							<td class="px-6 py-4 text-center"> <?php echo $usuario['emailUsuario'];  ?> </td>
						</tr>
					</tbody>		
				<?php
						}
					}
				?>
			</table>
		</div>

	<?php
		} else{
			echo '<p class="text-center bg-red-300 p-5 w-60 m-auto rounded-lg border-2 border-red-600">No hay usuarios registrados</p>';
		}
	?>	

    <!-- Botón para volver al index del admin -->
	<div class=" w-4/5 mx-auto mt-8 mb-8">
		<a href="/admin/index" class="bg-purple-600 p-3 text-white rounded-lg border-2 border-purple-900 hover:bg-purple-800" id="buttonUsuario">Volver</a>
	</div>

</main>