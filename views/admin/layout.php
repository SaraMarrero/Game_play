<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../build/css/headerUser.css">
    <title>Index</title>
</head>
<body class="light-mode flex justify-between">
    <nav class="relative px-5 py-5 gradientFooter w-1/5">
        <a class="text-3xl font-bold leading-none text-white" href="/index">Game Play</a>

        <ul class="py-2 text-sm text-white" aria-labelledby="dropdownInformationButton">
            <li>
                <img src="/build/img/admin.jpg" class="w-1/2 pt-5 m-auto">
            </li>

            <li>
                <p class="font-bold text-2xl text-center pt-5">Admin</p>
            </li>

            <hr class="m-4">

            <li>
                <a href="/admin/usuario/perfil" class="block px-4 pt-3 text-2xl">Perfil</a>
            </li>

            <li>
                <a href="/admin/porcentaje/porcentajeJuegos" class="block px-4 pt-3 text-2xl">Porcentajes</a>
            </li>
        </ul>

        <div class="py-2">
            <a href="/usuario/signOut" class="block px-4 py-2 text-2xl text-white">Sign out</a>
        </div>
    </nav>

    <?php echo $contenido; ?>

</body>
</html>