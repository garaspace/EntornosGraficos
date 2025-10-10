<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $destinatario = "destinatario@ejemplo.com";
    $asunto = "Correo con formato HTML";

    // Contenido del mensaje en formato HTML
    $mensaje = "
    <html>
    <head>
    <title>Correo de prueba HTML</title>
    </head>
    <body>
    <h1 style='color:blue;'>¡Hola!</h1>
    <p>Este es un <strong>correo de prueba</strong> enviado desde un script PHP.</p>
    <p>Incluye <span style='color:red;'>formato HTML</span> y estilos.</p>
    </body>
    </html>
    ";

    // Encabezados para indicar que el contenido es HTML
    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

    // Encabezado opcional: de quién proviene el mensaje
    $headers .= "From: Remitente <remitente@tu-dominio.com>" . "\r\n";

    // Envío del correo
    if (mail($destinatario, $asunto, $mensaje, $headers)) {
        echo "Correo enviado correctamente.";
    } else {
        echo "Error al enviar el correo.";
    }
    ?>
</body>
</html>