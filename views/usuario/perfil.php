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

<main class="h-screen">
	<h1 class="text-center p-5 font-bold text-xl">Perfil</h1>
    
    <!-- Muestra los datos del usuario logueado -->
    <?php 
		if(isset($usuario)){
			foreach($usuario as $usuarioActual){
	?>
			<div class="relative overflow-x-auto w-4/5 mx-auto">
				<table class="w-full text-sm text-left text-gray-500">
					<thead class="text-xs text-gray-700 uppercase bg-gray-100">
						<tr>
							<th scope="col" class="px-6 py-3">Dni</th>
							<th scope="col" class="px-6 py-3">Nombre</th>
							<th scope="col" class="px-6 py-3">Apellidos</th>
							<th scope="col" class="px-6 py-3">Email</th>
						</tr>
					</thead>
					<tbody>
						<tr class="bg-white dark:bg-gray-800">
							<td class="px-6 py-4"> <?php echo $usuarioActual['dniUsuario']; ?> </td>
							<td class="px-6 py-4"> <?php echo $usuarioActual['nombreUsuario']; ?> </td>
							<td class="px-6 py-4"> <?php echo $usuarioActual['apellidosUsuario']; ?> </td>
							<td class="px-6 py-4"> <?php echo $usuarioActual['emailUsuario']; ?> </td>
						</tr>
					</tbody>
				</table>
			</div>

			<!-- Lo que ve el usuario normal -->
			<div class="text-center my-10">
				<form method="GET" action="/usuario/editarPerfil">
					<input type="hidden" name="dniUsuario" value="<?php echo $usuarioActual['dniUsuario']; ?>">
					<input type="submit" class="bg-blue-300 p-5 rounded-lg m-5 border-2 border-blue-500" id="buttonUsuario" value="Editar Usuario">
				</form>

					<a href="/usuario/borrarUsuario" class="bg-red-300 p-5 rounded-lg m-5 border-2 border-red-500 cursor-pointer hover:bg-pruple-800" id="buttonUsuario" onclick="return confirm('¿Estás seguro de que quieres eliminar la cuenta? Esta acción no se puede deshacer.');">Borrar usuario</a>
			</div>

			<div class=" w-4/5 mx-auto mt-5">
				<a href="/index" class="bg-purple-600 p-3 text-white rounded-lg border-2 border-pruple-900" id="buttonUsuario">Volver</a>
			</div>	
		<?php } } ?>
</main>

<?php 
	$inicio2 = false;
	$ps52 = false;
	$xbox2 = false;
	$nintendo2 = false;
	$pc2 = false;
	$footer2 = true;
?>