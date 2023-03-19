<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear contacto</title>
</head>
<body>
    <h1>Crear contacto</h1>

    <form action="/contacts" method="post">
        <div>
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="name">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" id="phone">
        </div>
        <button type="submit">Crear</button>
    </form>

</body>
</html>