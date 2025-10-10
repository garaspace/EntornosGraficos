<?php
// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    // Dirección del webmaster (a quien llega el mensaje)
    $destinatario = "webmaster@tu-dominio.com";
    $asuntoCorreo = "Consulta desde la web: " . $asunto;

    // Cuerpo del mensaje en formato HTML
    $cuerpo = "
    <html>
    <head>
    <title>Consulta desde la página de contacto</title>
    </head>
    <body>
        <h2>Nuevo mensaje de contacto</h2>
        <p><strong>Nombre:</strong> {$nombre}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Asunto:</strong> {$asunto}</p>
        <p><strong>Mensaje:</strong><br>{$mensaje}</p>
    </body>
    </html>
    ";

    // Encabezados
    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: {$nombre} <{$email}>" . "\r\n";

    // Envío del correo
    if (mail($destinatario, $asuntoCorreo, $cuerpo, $headers)) {
        echo "<p style='color:green;'>Tu mensaje fue enviado correctamente. ¡Gracias por contactarnos!</p>";
    } else {
        echo "<p style='color:red;'>Hubo un error al enviar el mensaje. Intenta nuevamente.</p>";
    }
}
?>

<!-- Formulario HTML -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto</title>
</head>
<body>
    <h1>Contacto</h1>
    <form method="post" action="">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Asunto:</label><br>
        <input type="text" name="asunto" required><br><br>

        <label>Mensaje:</label><br>
        <textarea name="mensaje" rows="5" cols="40" required></textarea><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
