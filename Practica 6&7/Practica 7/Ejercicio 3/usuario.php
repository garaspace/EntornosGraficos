<?php
// Si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    // Crear cookie con duración de 30 días
    setcookie("usuario", $usuario, time() + 3600 * 24 * 30);
    $mensaje = "¡Hola, $usuario! Tu nombre ha sido guardado en una cookie.";
}

// Si existe la cookie, mostrar el último usuario
if (isset($_COOKIE["usuario"])) {
    $ultimoUsuario = $_COOKIE["usuario"];
} else {
    $ultimoUsuario = "";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3 - Cookie de Usuario</title>
</head>
<body>
    <h1>Registro de Usuario con Cookie</h1>

    <?php if (isset($mensaje)) echo "<p>$mensaje</p>"; ?>

    <form method="post" action="">
        <label for="usuario">Nombre de usuario:</label><br>
        <input type="text" name="usuario" id="usuario" 
               value="<?php echo htmlspecialchars($ultimoUsuario); ?>"><br><br>
        <input type="submit" value="Guardar nombre">
    </form>

    <?php
    if (!empty($ultimoUsuario)) {
        echo "<p>Último usuario ingresado: <strong>$ultimoUsuario</strong></p>";
    }
    ?>
</body>
</html>
