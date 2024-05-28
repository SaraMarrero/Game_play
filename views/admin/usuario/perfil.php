<?php
	// Recoge los datos del usuario logueado
	if(isset($_SESSION['usuario'])){
        $usuario = unserialize($_SESSION['usuario']);
    }

	// Muestra el header adaptado dependiendo si es admin o usuario normal
    $inicio = false;
    $ps4 = false;
    $xbox = false;
    $nintendo = false;
    $pc = false;
    $footer = true;
?>

<main class="h-screen <?php

	// Adapta el main dependiendo si es admin o usuario normal
	if(isset($_SESSION['usuario'])){
		foreach($usuario as $datosUsuario){
			if($datosUsuario['administrador'] == 1){
				echo 'w-4/5';
			}
		}
	}
	?>">
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

			<div class=" w-4/5 mx-auto mt-5 p-1">
				<a href="/admin/index" class="bg-purple-600 p-3 text-white rounded-lg border-2 border-pruple-900" id="buttonUsuario">Volver</a>
			</div>
        <?php } } ?>
</main>

<?php 
	$inicio2 = false;
    $ps42 = false;
    $xbox2 = false;
    $nintendo2 = false;
    $pc2 = false;
    $footer2 = true
?>