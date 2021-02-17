<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Email desde INTL</title>
</head>
<body>
    <p>Este correo ha sido enviado desde la pagina de producto en internationalparts.mx</p>
    <p>Estos son los datos que usuario ha enviado:</p>
    <ul>
        <li>Nombre: {{ $data['nombre'] }}</li>
        <li>Email: {{ $data['email'] }}</li>
        <li>Teléfono: {{ $data['telefono'] }}</li>
        <li>Fabricante: {{ $data['fabricante'] }}</li>
        <li>Nro de parte: {{ $data['n_parte'] }}</li>
        <li>Cantidad: {{ $data['cantidad'] }}</li>
    </ul>
</body>
</html>