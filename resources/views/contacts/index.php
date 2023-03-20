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
    <h1 class="text-2xl font-bold mb-2">Listado de Contactos</h1>

    <form action="" class="flex">
        <input type="text">
    </form>

    <a href="/contacts/create">Crear contacto</a>

    <ul class="list-disc list-inside">
        <?php foreach ($contacts['data'] as $contact) : ?>
            <li>
                <a href="/contacts/<?= $contact['id'] ?>">
                    <?= $contact['name'] ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>

    <?php
        $paginate = 'contacts';

        require_once "../resources/views/assets/pagination.php";
    ?>

</body>

</html>