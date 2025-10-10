<?php
session_start(); // Iniciar o continuar la sesión

// Si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["nombre"] = $_POST["nombre"];
    $_SESSION["email"] = $_POST["email"];
    $amigo = $_POST["amigo"];
    $mensaje = $_POST["mensaje"];

    $destinatario = $amigo;
    $asunto = "¡Tu amigo te recomienda este sitio web!";
    
    // Cuerpo del correo en formato HTML
    $cuerpo = "
    <html>
    <head><title>Recomendación de un amigo</title></head>
    <body>
        <h2>Hola!</h2>
        <p>Tu amigo <strong>{$_SESSION['nombre']}</strong> (<em>{$_SESSION['email']}</em>) te recomienda visitar nuestro sitio web.</p>
        <p>Mensaje personal:</p>
        <blockquote>{$mensaje}</blockquote>
        <p><a href='https://www.tu-sitio.com'>Visita el sitio aquí</a></p>
    </body>
    </html>
    ";

    // Encabezados
    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: {$_SESSION['nombre']} <{$_SESSION['email']}>" . "\r\n";

    // Envío del correo
    if (mail($destinatario, $asunto, $cuerpo, $headers)) {
        echo "<p style='color:green;'>El mensaje fue enviado correctamente a tu amigo.</p>";
    } else {
        echo "<p style='color:red;'>Hubo un error al enviar el mensaje.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recomendar este sitio</title>
</head>
<body>
    <h1>Recomendá este sitio a un amigo</h1>
    <form method="post" action="">
        <label>Tu nombre:</label><br>
        <input type="text" name="nombre" required value="<?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : ''; ?>"><br><br>

        <label>Tu email:</label><br>
        <input type="email" name="email" required value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>"><br><br>

        <label>Email de tu amigo:</label><br>
        <input type="email" name="amigo" required><br><br>

        <label>Mensaje personal:</label><br>
        <textarea name="mensaje" rows="4" cols="40" placeholder="¡Te recomiendo esta página!"></textarea><br><br>

        <input type="submit" value="Enviar recomendación">
    </form>
</body>
</html>