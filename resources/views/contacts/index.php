<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos</title>
</head>
<body>
    <h1>Listado de Contactos</h1>

    <a href="/contacts/create">Crear contacto</a>

    <ul>
        <?php foreach($contacts as $contact): ?>
            <li>
                <a href="/contacts/<?= $contact['id'] ?>">
                    <?= $contact['name'] ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</body>
</html>