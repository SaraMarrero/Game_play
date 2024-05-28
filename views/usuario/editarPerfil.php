<?php
	$inicio = false;
	$ps5 = false;
	$xbox = false;
	$nintendo = false;
	$pc = false;
	$footer = true;

	
?>

<main class='h-screen'>
    <h1 class="text-center my-5 font-bold text-xl">Editar Perfil</h1>
    
	<div class="mx-auto w-1/2">
	
		<form action="/usuario/editarPerfil" method="POST">
			<!-- Muestra los datos del usuario en el formulario -->
			<?php foreach($usuarioActual as $usuario){ ?>
				<div class="mb-6">
					<label for="dniUsuario" class="block mb-2 text-sm font-medium text-gray-900">DNI</label>
					<input type="text" id="dniUsuario" name="dniUsuario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo $usuario['dniUsuario']; ?>" readonly>
				</div>

				<div class="mb-6">
					<label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
					<input type="text" id="nombreUsuario" name="nombreUsuario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo $usuario['nombreUsuario']; ?>">

					<p class="text-red-500"><?php echo isset($errores['nombre']) ? mostrarErrores($errores, 'nombre') : ''; ?></p>
				</div>

				<div class="mb-6">
					<label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900">Apellidos</label>
					<input type="text" id="apellidosUsuario" name="apellidosUsuario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo $usuario['apellidosUsuario']; ?>">
					<p class="text-red-500"><?php echo isset($errores['apellidos']) ? mostrarErrores($errores, 'apellidos') : ''; ?></p>
				</div>

				<div class="mb-6">
					<label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
					<input type="text" id="emailUsuario" name="emailUsuario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo $usuario['emailUsuario']; ?>">
					<p class="text-red-500"><?php echo isset($errores['email']) ? mostrarErrores($errores, 'email') : ''; ?></p>
				</div>

				<input type="hidden" id="passwordUsuario" name="passwordUsuario" value="<?php echo $usuario['passwordUsuario']; ?>">
			<?php } ?>

			<!-- Actualiza el perfil -->
			<button type="submit" class="text-white bg-purple-600 hover:bg-purple-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Actualizar</button>
		
			<!-- Botón para volver al perfil -->
			<a href="/usuario/perfil" class="text-white bg-purple-600 hover:bg-purple-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Volver</a>
		</form>
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