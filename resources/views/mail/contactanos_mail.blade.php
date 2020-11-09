<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>International Parts - Contáctanos</title>
</head>
<body>
    <p>Envío de mail desde contactanos.</p>
    <ul>
        <li>Nombre: {{ $contactanosCall['nombre'] }}</li>
        <li>Teléfono: {{ $contactanosCall['telefono'] }}</li>
        <li>Email: {{ $contactanosCall['email'] }}</li>
        <li>Asunto: {{ $contactanosCall['asunto'] }}</li>
    </ul>
    <p>Mensaje:</p>
    <ul>
        <li>Mensaje: {{ $contactanosCall['mensaje'] }}</li>
    </ul>
</body>
</html>