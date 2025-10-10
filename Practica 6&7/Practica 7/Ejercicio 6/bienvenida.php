<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bienvenida</title>
</head>
<body>
    <?php
    if (isset($_SESSION['nombre'])) {
        echo "<h2>Bienvenido, " . htmlspecialchars($_SESSION['nombre']) . "!</h2>";
    } else {
        echo "<p>No puede visitar esta página porque no ha iniciado sesión correctamente.</p>";
    }
    ?>
    <br>
    <a href="buscar_mail.php">Volver al formulario</a>
</body>
</html>
