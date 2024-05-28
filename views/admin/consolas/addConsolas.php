<main class="bg-gray-200 h-screen w-4/5">
    <h1 class="text-center p-5 font-bold text-2xl">Añadir Consolas</h1>
    
	<div class="mx-auto w-1/2">
		<form action="/admin/consolas/addConsolas" method="POST">

			<div class="mb-6">
				<label for="nombreConsola" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
				<input type="text" id="nombreConsola" name="nombreConsola" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="">
				<?php echo isset($errores['nombreConsola']) ? $errores['nombreConsola'] : ''; ?>
			</div>

			<button type="submit " id="crearConsola" name="crearConsola" class="text-white bg-purple-600 hover:bg-purple-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Crear</button>

			<a href="/admin/index" class="text-white bg-purple-600 hover:bg-purple-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Volver</a>
		</form>
	</div>
</main>