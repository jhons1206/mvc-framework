<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container mx-auto mt-5">
        <h1 class="text-2xl font-bold mb-5">Listado de Contactos</h1>

        <form action="/contacts" class="flex mb-5">
            <input name="search" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Ingrese el contacto a buscar">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ml-1 rounded">Buscar</button>
        </form>

        <a class="text-orange-700" href="/contacts/create">Crear contacto</a>

        <ul class="list-disc list-inside mt-2">
            <?php foreach ($contacts['data'] as $contact) : ?>
                <li>
                    <a class="text-sky-700" href="/contacts/<?= $contact['id'] ?>">
                        <?= $contact['name'] ?>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>

        <?php
        $paginate = 'contacts';

        require_once "../resources/views/assets/pagination.php";
        ?>
    </div>

</body>

</html>