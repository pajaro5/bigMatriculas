<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Notificacion</title>
</head>
<body>
<ul>
    <li>Carrera: {{ $notificacion->carrera}}</li>
    <li>Resumen: {{ $notificacion->body}}</li>
    <li>Usuario: {{ $notificacion->user}}</li>
</ul>
</body>
</html>
